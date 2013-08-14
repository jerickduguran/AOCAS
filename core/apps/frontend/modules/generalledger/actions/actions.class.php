<?php

/**
 * generalledger actions.
 *
 * @package    Gcross Accounting System
 * @subpackage generalledger
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class generalledgerActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
     
  }
  
  
  public function executeShow(sfWebRequest $request)
  {
    $this->project = Doctrine_Core::getTable('GeneralLedgerBeginningBalance')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->generalledger);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new GeneralLedgerBeginningBalanceForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new GeneralLedgerBeginningBalanceForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($generalledger = Doctrine_Core::getTable('GeneralLedgerBeginningBalance')->find(array($request->getParameter('id'))), sprintf('Object generalledger does not exist (%s).', $request->getParameter('id')));
    $this->form = new GeneralLedgerBeginningBalanceForm($generalledger);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($generalledger = Doctrine_Core::getTable('GeneralLedgerBeginningBalance')->find(array($request->getParameter('id'))), sprintf('Object generalledger does not exist (%s).', $request->getParameter('id')));
    $this->form = new GeneralLedgerBeginningBalanceForm($generalledger);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($generalledger = Doctrine_Core::getTable('GeneralLedgerBeginningBalance')->find(array($request->getParameter('id'))), sprintf('Object generalledger does not exist (%s).', $request->getParameter('id')));
    $generalledger->delete();

    $this->redirect('generalledger/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$data = $request->getParameter($form->getName());
	
	if($data['entry_type'] == GeneralLedgerBeginningBalance::ENTRY_TYPE_DEBIT){
		$data['debit'] = $data['entry_value'];
	}else{
		$data['credit'] = $data['entry_value'];
	}
	
    $form->bind($data, $request->getFiles($form->getName()));
	
    if ($form->isValid())
    {
      $generalledger = $form->save();

      $this->redirect('generalledger/edit?id='.$generalledger->getId());
    }
  } 
  
  /* Save new Account Balance */ 
  public function  executeSavebalance(sfWebRequest $request)
  {
	$return_array = array("success"=>false);
	$form = new GeneralLedgerBeginningBalanceForm();
	$form->configureSetup();
	$form->bind($request->getParameter($form->getName()),$request->getFiles($form->getName()));
	if($form->isValid()){
		$rate = $form->save();
		$balances				 = Doctrine_Core::getTable("GeneralLedgerBeginningBalance")->findAll(); 
		$options 				 = array('balances'=>$balances);
		$return_array['success'] = true; 
		$return_array['list']    = $this->getPartial("setup/accountbalancelist",$options);
	}else{
		$return_array['errors'] = array();
		foreach($form->getErrorSchema()->getErrors() as $field=>$error){
			$return_array['errors'][$field] = $error; 
		}
	}
	return $this->renderText(json_encode($return_array));
  } 
  
  public function executeLists(sfWebRequest $request)
  {
	$page 		   = $request->getParameter('page',0); 			 // get the requested page
	$limit 		   = $request->getParameter('rows',1); 			 // get how many rows we want to have into the grid
	$sort_field    = $request->getParameter('sidx','id'); 		 // get index row - i.e. user click to sort
	$sort_order    = $request->getParameter('sord','ASC'); 		 // get the direction
	 
	$where 		   = "1 = 1";
	$having		   = "1 = 1";
	$inline_search = false;
	$searchOn 	   = $request->getParameter('_search');	
	
	if($searchOn=='true'){	
		$ranges 	= array(); 
		$ranges_ctr = 0; 
		
		// CHECK IF THERE IS A RANGE IN FILTER
		if(($range = $request->getParameter('range',false)) !== false){
			while($ranges_ctr < $range){ 			 
				if($range_field			= $request->getParameter('rangefield_'.$ranges_ctr,false)){
					$range_field_2		= $request->getParameter($range_field."_2",''); 
					$range_field_value	= $request->getParameter($range_field,'');	
					
					$ranges[$range_field]['from'] = $range_field_value;
					$ranges[$range_field]['to']   = $range_field_2;
				}
				$ranges_ctr++; 
			}   
		}   
		//ALL FIELDS USED IN THE GRID
		$search_fields = array('id','account_type','account','debit','credit','created_at','updated_at'); 
		
		// SET FIELDS IN DATE DATATYPE IN GRID
		$date_fields   = array('created_at','updated_at');		
		
		// SET FIELDS IN DATETIME DATATYPE IN GRID
		$datetime_fields    = array(); 
		
		foreach($search_fields as $key=>$field)
		{ 
			//check if field is in range Fields
			if(array_key_exists($field,$ranges))
			{				
				//FILTER FOR DATE FIELDS
				if(in_array($field,$date_fields)){
					$from = ($ranges[$field]['from'] !="") ? formatDate($ranges[$field]['from']." 00:00:00",'datetime') : '';
					$to   = ($ranges[$field]['to'] !="")   ? formatDate($ranges[$field]['to']." 23:59:59",'datetime') : '';
				}elseif(in_array($field,$datetime_fields)){
					$from = ($ranges[$field]['from'] !="") ? formatDate($ranges[$field]['from'],'datetime'): '';
					$to   = ($ranges[$field]['to'] !="")   ? formatDate($ranges[$field]['to'],'datetime'): '';
				}else{
					$from = $ranges[$field]['from'];
					$to   = $ranges[$field]['to'];
				}
				//IF both 'from' and 'to' parameters are not empty, apply filter
				if(!empty($from) && !empty($to)){
					$where .= " AND  ( $field >= '$from' AND $field <= '$to' ) ";
				}
				elseif(!empty($from)){
					$where .= " AND  $field >= '$from' ";
				}
				else{
					$where .= " AND  $field   <= '$to'  ";
				}
			}
				
			//do normal filters
			elseif(($field_filter = $request->getParameter($field,false)) !== false){
				if($field == 'name'){
					$where .=" AND gl.name LIKE '%".$field_filter."%'";
				}elseif($field == 'description'){
					$where .=" AND gl.description LIKE '%".$field_filter."%'";
				}elseif($field == 'account_type_id'){
					$where .=" AND CONCAT_WS('',a.type,' - ',a.name) like '%".$field_filter."%' ";
				}else{
					$where .=" AND $field LIKE '%".$field_filter."%'";
				}
			}
			else{
				//do nothing.....
			}
		}
	}   
	$users = Doctrine_Core::getTable('GeneralLedgerBeginningBalance')
				  ->createQuery('g')
				  ->select("COUNT(1) as total_records") 
                  ->leftJoin("g.ChartOfAccount c")							
                  ->leftJoin("c.AccountType at")	
				  ->where($where)
				  ->execute()->getFirst();   
				   
	$count = $users->total_records;

	if($count >0 ) {
		$total_pages = ceil($count/$limit);
	} else {
		$total_pages = 0;
	}
	
	if ($page > $total_pages)
	{
		$page	=	$total_pages;
	}
	$start = $limit*$page - $limit; // do not put $limit*($page - 1)
	if ($start<0){
		$start = 0;
	}
	 
	$data_collection = Doctrine_Core::getTable('GeneralLedgerBeginningBalance')
				  ->createQuery('g') 
				  ->select("g.id,
							g.chart_of_account_id,
							g.generalledger_id,
							g.department_id,
							g.debit, 
							g.credit, 
							g.created_at,
							g.updated_at,
							c.title,
							c.code as account_code,
							at.name as account_type")
                  ->leftJoin("g.ChartOfAccount c")							
                  ->leftJoin("c.AccountType at")							
				  ->where($where)
				  ->having($having)
				  ->orderby($sort_field.' '.$sort_order)
				  ->limit($limit)
				  ->offset($start)				  
				  ->execute(); 
	
	$response = array(); 
	$response['page']    = $page;
	$response['total']   = $total_pages;
	$response['records'] = $count;
	$i=0; 
	foreach($data_collection as $data){
		$response['rows'][$i]['id']	  =	$data->getId();
		$response['rows'][$i]['cell'] = array($data->getId(), 
											  $data->account_type, 
											  $data->getChartOfAccount()->getTitle(), 
											  $data->getDebit(), 
											  $data->getCredit(), 
											  date('m/d/Y H:i:s',strtotime($data->getCreatedAt())),
											  date('m/d/Y H:i:s',strtotime($data->getUpdatedAt())));
		$i++;
	} 
	echo json_encode($response);
	die();
  }
  
  public function executeExport(sfWebRequest $request)
  {
	ini_set('memory_limit','256M');
	ini_set("max_execution_time", "0");	
	set_time_limit(0);
  
	$page 		   = $request->getParameter('page',0); 			 // get the requested page
	$limit 		   = $request->getParameter('rows',1); 			 // get how many rows we want to have into the grid
	$sort_field    = $request->getParameter('sidx','code'); 		 // get index row - i.e. user click to sort
	$sort_order    = $request->getParameter('sord','ASC'); 		 // get the direction
	 
	$where 		   = "1 = 1";
	$having		   = "1 = 1";
	$inline_search = false;
	$searchOn 	   = $request->getParameter('_search');	
	
	if($searchOn=='true'){	
		$ranges 	= array(); 
		$ranges_ctr = 0; 
		
		// CHECK IF THERE IS A RANGE IN FILTER
		if(($range = $request->getParameter('range',false)) !== false){
			while($ranges_ctr < $range){ 			 
				if($range_field			= $request->getParameter('rangefield_'.$ranges_ctr,false)){
					$range_field_2		= $request->getParameter($range_field."_2",''); 
					$range_field_value	= $request->getParameter($range_field,'');	
					
					$ranges[$range_field]['from'] = $range_field_value;
					$ranges[$range_field]['to']   = $range_field_2;
				}
				$ranges_ctr++; 
			}   
		}   
		//ALL FIELDS USED IN THE GRID
		$search_fields = array('id','account_type','account','debit','credit','created_at','updated_at'); 
		
		// SET FIELDS IN DATE DATATYPE IN GRID
		$date_fields   = array('created_at','updated_at');		
		
		// SET FIELDS IN DATETIME DATATYPE IN GRID
		$datetime_fields    = array(); 
		
		foreach($search_fields as $key=>$field)
		{ 
			//check if field is in range Fields
			if(array_key_exists($field,$ranges))
			{				
				//FILTER FOR DATE FIELDS
				if(in_array($field,$date_fields)){
					$from = ($ranges[$field]['from'] !="") ? formatDate($ranges[$field]['from']." 00:00:00",'datetime') : '';
					$to   = ($ranges[$field]['to'] !="")   ? formatDate($ranges[$field]['to']." 23:59:59",'datetime') : '';
				}elseif(in_array($field,$datetime_fields)){
					$from = ($ranges[$field]['from'] !="") ? formatDate($ranges[$field]['from'],'datetime'): '';
					$to   = ($ranges[$field]['to'] !="")   ? formatDate($ranges[$field]['to'],'datetime'): '';
				}else{
					$from = $ranges[$field]['from'];
					$to   = $ranges[$field]['to'];
				}
				//IF both 'from' and 'to' parameters are not empty, apply filter
				if(!empty($from) && !empty($to)){
					$where .= " AND  ( $field >= '$from' AND $field <= '$to' ) ";
				}
				elseif(!empty($from)){
					$where .= " AND  $field >= '$from' ";
				}
				else{
					$where .= " AND  $field   <= '$to'  ";
				}
			}
				
			//do normal filters
			elseif(($field_filter = $request->getParameter($field,false)) !== false){
				if($field == 'name'){
					$where .=" AND gl.name LIKE '%".$field_filter."%'";
				}elseif($field == 'description'){
					$where .=" AND gl.description LIKE '%".$field_filter."%'";
				}elseif($field == 'account_type_id'){
					$where .=" AND CONCAT_WS('',a.type,' - ',a.name) like '%".$field_filter."%' ";
				}else{
					$where .=" AND $field LIKE '%".$field_filter."%'";
				}
			}
			else{
				//do nothing.....
			}
		}
	}   
	 
	$report_data = Doctrine_Core::getTable('GeneralLedgerBeginningBalance')
				  ->createQuery('p') 
				  ->select("id")  
				  ->where($where) 
				  ->orderby($sort_field.' '.$sort_order) 			  
				  ->execute(); 
  
	$filename = "GCROSS - PROJECT CODE -" . date('Ymd') . ".xls"; 	
	header("Content-Disposition: attachment; filename=\"$filename\""); 
	header("Content-Type: application/vnd.ms-excel"); 

	echo "CODE \t TITLE \t DESCRIPTION \t CREATED AT \t UPDATED AT \r\n";
	if(count($report_data) > 0 ){ 	
		$conn = Doctrine_Manager::connection();	 
		foreach($report_data as $result){
			$query = "SELECT p.id,
							 p.code, 
							 p.title, 
							 p.description, 
							 p.created_at,
							 p.updated_at
						FROM generalledger p 
						WHERE p.id={$result['id']}
						LIMIT 1";
		
			if($entry_data = $conn->fetchAssoc($query)){	
				foreach($entry_data as $data){
				    $data = array_map("utf8_decode", $data);
					echo $data['code']." \t "; 
					echo $data['title']." \t ";  
					echo escapeData($data['description'])." \t ";
					echo date('m/d/Y H:i:s',strtotime($data['created_at']))." \t ";			
					echo date('m/d/Y H:i:s',strtotime($data['updated_at']))." \t \r\n";		
				}
			}
		}
	} 
	die();	
  }
  
  public function executeValidateaccounttype(sfWebRequest $request)
  {
	$is_valid	       = 'true';
	$account_entry     = "DEBIT";
	$account_type      = $request->getParameter("account_type",false);
	$entry_type        = $request->getParameter("entry_type",false);
	$validation_type   = $request->getParameter("val_type",false);
	
	if($account = Doctrine_Core::getTable("ChartOfAccount")->findOneById($account_type))
	{ 
		if($account->getAccountType()->getType() == AccountType::TYPE_LIABILITY ||
		   $account->getAccountType()->getType() == AccountType::TYPE_EXPENSE){
		   $account_entry = 'CREDIT';
		} 
		
		if($validation_type == "account_entry"){
			if($entry_type && $entry_type != $account_entry){
				$is_valid = "false";
			}	
		}else{
			if($entry_type != $account_entry ){
				$is_valid = "false";
			}	
		}
			
	}
	return $this->renderText($is_valid);
  }
  
}
