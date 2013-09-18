<?php

/**
 * chartofaccount actions.
 *
 * @package    Gcross Accounting System
 * @subpackage chartofaccount
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class chartofaccountActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  { 
  
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->chart_of_account = Doctrine_Core::getTable('ChartOfAccount')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->chart_of_account);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ChartOfAccountForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ChartOfAccountForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($chart_of_account = Doctrine_Core::getTable('ChartOfAccount')->find(array($request->getParameter('id'))), sprintf('Object chart_of_account does not exist (%s).', $request->getParameter('id')));
    	
	$this->form = new ChartOfAccountForm($chart_of_account);
	
	$this->validations = array();
	
	if($class_id =  $this->form->getObject()->getChartOfAccountTypeId()){
		$this->validations = Doctrine::getTable('Validation')->getValidationListByAccountType($class_id); 
	}
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($chart_of_account = Doctrine_Core::getTable('ChartOfAccount')->find(array($request->getParameter('id'))), sprintf('Object chart_of_account does not exist (%s).', $request->getParameter('id')));
    $this->form = new ChartOfAccountForm($chart_of_account);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($chart_of_account = Doctrine_Core::getTable('ChartOfAccount')->find(array($request->getParameter('id'))), sprintf('Object chart_of_account does not exist (%s).', $request->getParameter('id')));
    $chart_of_account->delete();

    $this->redirect('chartofaccount/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$user_obj = $this->getUser();
	
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $chart_of_account = $form->save();
	  $user_obj->setFlash('success',"Record Successfully saved.");
      $this->redirect('chartofaccount/edit?id='.$chart_of_account->getId());
    }
	$user_obj->setFlash('error',"Error while saving the form."); 
  }
  
  public function  executeSave(sfWebRequest $request)
  {
	$return_array = array("success"=>false);
	$form = new ChartOfAccountForm();
	$form->bind($request->getParameter($form->getName()),$request->getFiles($form->getName()));
	if($form->isValid()){
		$rate = $form->save();
		$coa					 = Doctrine_Core::getTable("ChartOfAccount")->findAll(); 
		$options 				 = array('coa'=>$coa);
		$return_array['success'] = true; 
		$return_array['list']    = $this->getPartial("setup/chartofaccountlist",$options);
	}else{
		$return_array['errors'] = array();
		foreach($form->getErrorSchema()->getErrors() as $field=>$error){
			$return_array['errors'][$field] = $error; 
		}
	}
	return $this->renderText(json_encode($return_array));
  }
  
  public function executeFetchoptions(sfWebRequest $request)
  { 
		$response_data['options']   = "";
		$options  				    = "<option value=''></option>";
		$response_data['options']   = $options;
		
		if($chart_of_accounts = Doctrine_Core::getTable('ChartOfAccount')->findAll()){
			foreach($chart_of_accounts as $account)
			{
				$options .= "<option value=\"".$account->getId()."\">".$account->getTitle()."</option>";
			}
			$response_data['options'] = $response_data['options'].$options;
		}
		 
		return $this->renderText(json_encode($response_data));
		
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
		$search_fields = array('id','code','title','status','created_at','updated_at'); 
		
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
	$users = Doctrine_Core::getTable('ChartOfAccount')
				  ->createQuery('ca')
				  ->select("COUNT(1) as total_records") 
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
	
	if($sort_field == "account_type_id"){
		$sort_field = "CONCAT_WS('',a.type,' - ',a.name) ";
	}
	$data_collection = Doctrine_Core::getTable('ChartOfAccount')
				  ->createQuery('ca') 
				  ->select("ca.id,
							ca.code, 
							ca.title,
							ca.status,  
							ca.created_at,
							ca.updated_at,
							cat.id ")  
				  ->where($where)
				  ->leftJoin("ca.ChartOfAccountType cat")
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
		$response['rows'][$i]['cell'] = array($data->getCode(), 
											  $data->getChartOfAccountType()->getTitle(),
											  $data->getTitle(),
											  $data->getStatus(), 
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
		$search_fields = array('id','code','title','status','created_at','updated_at'); 
		
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
	
	$report_data = Doctrine_Core::getTable('ChartOfAccount')
				  ->createQuery('ca') 
				  ->select("id")  
				  ->where($where) 
				  ->orderby($sort_field.' '.$sort_order) 			  
				  ->execute(); 
  
	$filename = "GCROSS - CHART OF ACCOUNT -" . date('Ymd') . ".xls"; 	
	header("Content-Disposition: attachment; filename=\"$filename\""); 
	header("Content-Type: application/vnd.ms-excel"); 

	echo "CODE \t ACCOUNT TYPE \t TITLE \t DESCRIPTION \t STATUS \t CREATED AT \t UPDATED AT \r\n";
	if(count($report_data) > 0 ){ 	
		$conn = Doctrine_Manager::connection();	 
		foreach($report_data as $result){
			$query = "SELECT ca.id,
							 ca.code,
							 cat.id,
							 ca.title,
							 ca.status, 
							 ca.description, 
							 ca.created_at,
							 ca.updated_at,
							 cat.title as account_type
						FROM chart_of_account ca  
						LEFT JOIN chart_of_account_type cat
							ON cat.id=ca.chart_of_account_type_id
						WHERE ca.id={$result['id']}
						LIMIT 1";
		
			if($entry_data = $conn->fetchAssoc($query)){	
				foreach($entry_data as $data){
				    $data = array_map("utf8_decode", $data);
					echo $data['code']." \t "; 
					echo $data['account_type']." \t "; 
					echo $data['title']." \t "; 
					echo $data['description']." \t "; 
					echo $data['status']." \t "; 	
					echo date('m/d/Y H:i:s',strtotime($data['created_at']))." \t ";			
					echo date('m/d/Y H:i:s',strtotime($data['updated_at']))." \t \r\n";		
				}
			}
		}
	} 
	die();	
  }
  
  public function executeCheckcode(sfWebRequest $request)
  {		
		$code_not_inuse = 'true';
		if($coa = Doctrine_Core::getTable("ChartOfAccount")->findOneByCode($request->getParameter("code",0)))
		{ 
			if($request->getParameter("orig_code",0)  != $coa->getCode()){
				$code_not_inuse = 'false';
			}
		}
		return $this->renderText($code_not_inuse);
  }
  
  
	public function executeValidationlists(sfWebRequest $request)
	{ 
		if($type_id =  $request->getParameter('type',false)){
			
			$this->validations = Doctrine::getTable('Validation')->getValidationListByAccountType($type_id);
			
			$this->form = new ChartOfAccountForm();
			
			//CHECK IF ON EDIT PAGE
			$chart_class_validations	  = array();  
			$class_id = $request->getParameter('chart_account_id',false); 
			if($chart_account_data = Doctrine::getTable('ChartOfAccount')->findOneById($class_id)){
				if($type_id == $chart_account_data->getChartOfAccountTypeId()){
					$chart_class_validations_data = $chart_account_data->getChartOfAccountValidation();
					if($chart_class_validations_data->count()>0){
						$chart_of_account_ids = array();
						foreach($chart_class_validations_data as $chart_class_validation){
							$chart_of_account_ids[$chart_class_validation->getValidationId()]  = $chart_class_validation->getValidationId(); 
						}  
						if($chart_of_account_ids){
							if($type_account_validations = Doctrine_Core::getTable("ChartOfAccountTypeValidation")
																->createQuery('av')
																->select("validation_id")
																->where("chart_of_account_type_id = ?",$type_id)
																->andWhereIn("validation_id",$chart_of_account_ids)
																->execute()){ 
								foreach($type_account_validations as $type_account_validation){
									$chart_class_validations[$type_account_validation->getValidationId()] = $type_account_validation->getValidationId();
								} 
							}
							 
						}
						
					}
				}
			}	 
			$this->chart_class_validations = $chart_class_validations; 
			
			$this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
			$data = array();
			$data['details'] 			= $this->getPartial('validations');
			$data['total_count']   = $this->validations->count();
			echo json_encode($data);
		}
		return sfView::NONE; 

	}  

  
}
