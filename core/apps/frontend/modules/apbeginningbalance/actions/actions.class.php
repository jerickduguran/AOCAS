<?php

/**
 * apbeginningbalance actions.
 *
 * @package    Gcross Accounting System
 * @subpackage apbeginningbalance
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class apbeginningbalanceActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  { 
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->accounts_payable_beginning_balance = Doctrine_Core::getTable('AccountsPayableBeginningBalance')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->accounts_payable_beginning_balance);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AccountsPayableBeginningBalanceForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AccountsPayableBeginningBalanceForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($accounts_payable_beginning_balance = Doctrine_Core::getTable('AccountsPayableBeginningBalance')->find(array($request->getParameter('id'))), sprintf('Object accounts_payable_beginning_balance does not exist (%s).', $request->getParameter('id')));
    $this->form = new AccountsPayableBeginningBalanceForm($accounts_payable_beginning_balance);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($accounts_payable_beginning_balance = Doctrine_Core::getTable('AccountsPayableBeginningBalance')->find(array($request->getParameter('id'))), sprintf('Object accounts_payable_beginning_balance does not exist (%s).', $request->getParameter('id')));
    $this->form = new AccountsPayableBeginningBalanceForm($accounts_payable_beginning_balance);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($accounts_payable_beginning_balance = Doctrine_Core::getTable('AccountsPayableBeginningBalance')->find(array($request->getParameter('id'))), sprintf('Object accounts_payable_beginning_balance does not exist (%s).', $request->getParameter('id')));
    $accounts_payable_beginning_balance->delete();

    $this->redirect('apbeginningbalance/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $accounts_payable_beginning_balance = $form->save();

      $this->redirect('apbeginningbalance/edit?id='.$accounts_payable_beginning_balance->getId());
    }
  }
  
  public function executeLists(sfWebRequest $request)
  {
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
		$search_fields = array('id','bill_number','general_library_id','amount','currency_id','project_id','department_id','created_at','updated_at'); 
		
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
				if($field == 'general_library_id'){
					$where .=" AND  CONCAT_WS('',gl.code,' - ',gl.name) LIKE '%".$field_filter."%'";
				}elseif($field == 'currency_id'){
					$where .=" AND c.id = '".$field_filter."'";
				}elseif($field == 'project_id'){
					$where .=" AND p.id = '".$field_filter."'";
				}elseif($field == 'department_id'){
					$where .=" AND d.id = '".$field_filter."'";
				}elseif($field == 'amount'){
					$where .=" AND $field = '".$field_filter."'";
				}else{
					$where .=" AND $field LIKE '%".$field_filter."%'";
				}
			}
			else{
				//do nothing.....
			}
		}
	}   
	$users = Doctrine_Core::getTable('AccountsPayableBeginningBalance')
				  ->createQuery('ar')
				  ->select("COUNT(1) as total_records")
				  ->leftJoin("ar.Currency c")
				  ->leftJoin("ar.GeneralLibrary gl")
				  ->leftJoin("ar.Project p")
				  ->leftJoin("ar.Department d")
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
	
	if($sort_field == "currency_id"){
		$sort_field = "c.title";
	}elseif($sort_field == "general_library_id"){
		$sort_field = "CONCAT_WS('',gl.code,' - ',gl.name)";	
	}elseif($sort_field == "project_id"){
		$sort_field = "p.title";
	}elseif($sort_field == "department_id"){
		$sort_field = "d.title";
	}else{
		//use default
	}
	$data_collection = Doctrine_Core::getTable('AccountsPayableBeginningBalance')
				  ->createQuery('ar') 
				  ->select("ar.id,
							ar.bill_number,
							ar.general_library_id,
							ar.currency_id,
							ar.amount,
							c.title, 
							p.title, 
							d.title, 
							gl.code, 
							gl.name, 
							ar.created_at,
							ar.updated_at")  
				  ->leftJoin("ar.Currency c")
				  ->leftJoin("ar.GeneralLibrary gl")
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
											  $data->getBillNumber(),
											  $data->getGeneralLibrary()->getCode()." - ".$data->getGeneralLibrary()->getName(),
											  $data->getCurrency()->getSymbol()." - ".$data->getCurrency()->getTitle(),
											  CurrencyTable::getInstance()->setCurrencyFormat($data->getAmount(),$data->getCurrencyId()),
											  $data->getProject()->getTitle(),
											  $data->getDepartment()->getTitle(),
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
		$search_fields = array('id','code','account_type_id','title','status','created_at','updated_at'); 
		
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
	
	if($sort_field == "account_type_id"){
		$sort_field = "CONCAT_WS('',a.type,' - ',a.name) ";
	}
	$report_data = Doctrine_Core::getTable('ChartOfAccount')
				  ->createQuery('ca') 
				  ->select("id") 
				  ->leftJoin("ca.AccountType a")
				  ->where($where) 
				  ->orderby($sort_field.' '.$sort_order) 			  
				  ->execute(); 
  
	$filename = "GCROSS - CHART OF ACCOUNT -" . date('Ymd') . ".xls"; 	
	header("Content-Disposition: attachment; filename=\"$filename\""); 
	header("Content-Type: application/vnd.ms-excel"); 

	echo "CODE \t ACCOUNT TYPE \t TITLE \t STATUS \t CREATED AT \t UPDATED AT \r\n";
	if(count($report_data) > 0 ){ 	
		$conn = Doctrine_Manager::connection();	 
		foreach($report_data as $result){
			$query = "SELECT ca.id,
							 ca.code,
							 ca.account_type_id,
							 ca.title,
							 ca.status,
							 CONCAT_WS('',a.type,' - ',a.name) as account_type,
							 ca.created_at,
							 ca.updated_at
						FROM chart_of_account ca
						LEFT JOIN account_type a
							ON ca.account_type_id=a.id
						WHERE ca.id={$result['id']}
						LIMIT 1";
		
			if($entry_data = $conn->fetchAssoc($query)){	
				foreach($entry_data as $data){
				    $data = array_map("utf8_decode", $data);
					echo $data['code']." \t ";
					echo $data['account_type']." \t "; 
					echo $data['title']." \t "; 
					echo $data['status']." \t "; 	
					echo date('m/d/Y H:i:s',strtotime($data['created_at']))." \t ";			
					echo date('m/d/Y H:i:s',strtotime($data['updated_at']))." \t \r\n";		
				}
			}
		}
	} 
	die();	
  }
}
