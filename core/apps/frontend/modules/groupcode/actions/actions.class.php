<?php

/**
 * groupcode actions.
 *
 * @package    Gcross Accounting System
 * @subpackage groupcode
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class groupcodeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->group_codes = Doctrine_Core::getTable('GroupCode')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->group_code = Doctrine_Core::getTable('GroupCode')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->group_code);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new GroupCodeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new GroupCodeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($group_code = Doctrine_Core::getTable('GroupCode')->find(array($request->getParameter('id'))), sprintf('Object group_code does not exist (%s).', $request->getParameter('id')));
    $this->form = new GroupCodeForm($group_code);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($group_code = Doctrine_Core::getTable('GroupCode')->find(array($request->getParameter('id'))), sprintf('Object group_code does not exist (%s).', $request->getParameter('id')));
    $this->form = new GroupCodeForm($group_code);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($group_code = Doctrine_Core::getTable('GroupCode')->find(array($request->getParameter('id'))), sprintf('Object group_code does not exist (%s).', $request->getParameter('id')));
    $group_code->delete();

    $this->redirect('groupcode/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $group_code = $form->save();

      $this->redirect('groupcode/edit?id='.$group_code->getId());
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
		$search_fields = array('id','code','title','created_at','updated_at'); 
		
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
	$users = Doctrine_Core::getTable('GroupCode')
				  ->createQuery('g')
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
	 
	$data_collection = Doctrine_Core::getTable('GroupCode')
				  ->createQuery('g') 
				  ->select("g.id,
							g.code, 
							g.title, 
							g.created_at,
							g.updated_at")  
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
		$response['rows'][$i]['cell'] = array($data->getCode(), 
											  $data->getTitle(), 
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
		$search_fields = array('id','code','title','created_at','updated_at'); 
		
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
	 
	$report_data = Doctrine_Core::getTable('GroupCode')
				  ->createQuery('g') 
				  ->select("id")  
				  ->where($where) 
				  ->orderby($sort_field.' '.$sort_order) 			  
				  ->execute(); 
  
	$filename = "GCROSS - GROUP CODE -" . date('Ymd') . ".xls"; 	
	header("Content-Disposition: attachment; filename=\"$filename\""); 
	header("Content-Type: application/vnd.ms-excel"); 

	echo "CODE \t TITLE \t DESCRIPTION \t CREATED AT \t UPDATED AT \r\n";
	if(count($report_data) > 0 ){ 	
		$conn = Doctrine_Manager::connection();	 
		foreach($report_data as $result){
			$query = "SELECT g.id,
							 g.code, 
							 g.title, 
							 g.description, 
							 g.created_at,
							 g.updated_at
						FROM group_code g 
						WHERE g.id={$result['id']}
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
  
  public function executeCheckcode(sfWebRequest $request)
  {		
		$code_not_inuse = 'true';
		if($coa = Doctrine_Core::getTable("GroupCode")->findOneByCode($request->getParameter("code",0)))
		{ 
			if($request->getParameter("orig_code",0)  != $coa->getCode()){
				$code_not_inuse = 'false';
			}
		}
		return $this->renderText($code_not_inuse);
  }
}
