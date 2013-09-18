<?php

/**
 * apvoucher actions.
 *
 * @package    Gcross Accounting System
 * @subpackage apvoucher
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class apvoucherActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
     
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->accounts_payable_voucher = Doctrine_Core::getTable('AccountsPayableVoucher')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->accounts_payable_voucher);
  }

  public function executeNew(sfWebRequest $request)
  { 
	if(!$apvoucher = Doctrine_Core::getTable("AccountsPayableVoucher")->find(array($request->getParameter('cv_id')))){
		$this->redirect("apvoucher/index");
	}
    $this->form = new AccountsPayableVoucherForm($apvoucher);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AccountsPayableVoucherForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($accounts_payable_voucher = Doctrine_Core::getTable('AccountsPayableVoucher')->find(array($request->getParameter('id'))), sprintf('Object accounts_payable_voucher does not exist (%s).', $request->getParameter('id')));
    $this->form = new AccountsPayableVoucherForm($accounts_payable_voucher);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($accounts_payable_voucher = Doctrine_Core::getTable('AccountsPayableVoucher')->find(array($request->getParameter('id'))), sprintf('Object accounts_payable_voucher does not exist (%s).', $request->getParameter('id')));
    $this->form = new AccountsPayableVoucherForm($accounts_payable_voucher);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($accounts_payable_voucher = Doctrine_Core::getTable('AccountsPayableVoucher')->find(array($request->getParameter('id'))), sprintf('Object accounts_payable_voucher does not exist (%s).', $request->getParameter('id')));
    $accounts_payable_voucher->delete();

    $this->redirect('apvoucher/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $accounts_payable_voucher = $form->save();

      $this->redirect('apvoucher/edit?id='.$accounts_payable_voucher->getId());
    }
  }
  
  public function executeInitCreateapvoucher(sfWebRequest $request)
  {
	  $this->forward404unless($request->isXmlHttpRequest() || $request->isMethod(sfRequest::POST));	 
      $number = intval($request->getParameter("num",1));

      $this->form = new AccountsPayableVoucherInitForm(); 
	  
	  $response_data 	     = array('has_data' => true); 
	  $response_data['data'] = $this->getPartial('precreateapvoucher',array('form' => $this->form)); 
	   
	  return $this->renderText(json_encode($response_data)); 
  }
  
  public function executePresaveapvoucher(sfWebRequest $request)
  {
	 $form = new AccountsPayableVoucherInitForm(); 
	 
	 $data 			  = $request->getParameter($form->getName());
	 $data['period']  = date("Y/m/d",strtotime($data['period']));
	 $form->bind($data, $request->getFiles($form->getName()));
     if ($form->isValid())
     {
       $cv = $form->save();
     
       $this->redirect('apvoucher/new?cv_id='.$cv->getId());
     }else{
		print '<pre>';
		foreach($form->getErrorSchema()->getErrors() as $field=>$error){
			echo $field." _ ".$error."<br/>";
		}
		die('x');
	 }
  }
  public function executeJournalvouchernumber(sfWebRequest $request)
  {		
		$code_not_inuse = 'true';
		if($data = Doctrine_Core::getTable("AccountsPayableVoucher")->findOneByVoucherNumber($request->getParameter("voucher_number",0)))
		{ 
			if($request->getParameter("orig_voucher_number",0)  != $data->getVoucherNumber()){
				$code_not_inuse = 'false';
			}
		}
		return $this->renderText($code_not_inuse);
  }
  
   public function executeCheckentries(sfWebRequest $request)
  { 
	$this->forward404unless($request->isXmlHttpRequest() || $request->isMethod(sfRequest::POST));	
	$response		 	= array('is_valid'=>false);
	$journal_voucher 		= Doctrine_Core::getTable('AccountsPayableVoucher')->findOneById($request->getParameter("cv_id",0)); 
	
	$response['is_valid'] = true;
	$form				  = new AccountsPayableVoucherCheckEntryListForm($journal_voucher);  
	$response['content']  = $this->getPartial("checkentry",array("form"=>$form,'journal_voucher'=>$journal_voucher)); 
	
	return $this->renderText(json_encode($response));
  }
  
  
	public function executeAddParticularEntry(sfWebRequest $request)
	{
      $this->forward404unless($request->isXmlHttpRequest());
      $number = intval($request->getParameter("num",1));

      $this->form = new AccountsPayableVoucherForm(); 
      $this->form->addNewParticularEntry($number);
	  
	  $response_data 	    = array('added' => true); 
	  $response_data['new'] = $this->getPartial('newparticularentry',array('form' => $this->form, 'number' => $number)); 
	   
	  return $this->renderText(json_encode($response_data)); 
    }
	
	public function executeAddAccountEntry(sfWebRequest $request)
	{
      $this->forward404unless($request->isXmlHttpRequest());
      $number = intval($request->getParameter("num",1));

      $this->form = new AccountsPayableVoucherForm(); 
      $this->form->addNewAccountEntry($number);
	  
	  $response_data 	    = array('added' => true); 
	  $response_data['new'] = $this->getPartial('newaccountentry',array('form' => $this->form, 'number' => $number)); 
	   
	  return $this->renderText(json_encode($response_data)); 
    }
	
	 public function executeCheckAccountType(sfWebRequest $request)
  {
	$this->forward404unless($request->isXmlHttpRequest() || $request->isMethod(sfRequest::POST));	
    $account_id 				= $request->getParameter("account_id",0);
    $client_id 			     	= $request->getParameter("client",0);
	$response_data 				= array();
	$response_data['has_data']	= false;
	if($account = Doctrine_Core::getTable("ChartOfAccount")->findOneById($account_id)){
		if($account->isOutputVat()){
			$response_data['has_data']	= true;
			$form						= new AccountsPayableVoucherAccountEntryOutputVatForm();
			$form->setDefault('general_library_id',$client_id);
			//$account_outputvat_entries	= $account->getAllOutputVatEntries();
			$account_outputvat_entries	= '';
			$data 						= array();
			$data['voucher_number']     = $request->getParameter("voucher_number",0);
			$data['general_library'] 	= false;
			$data['account'] 			= $account;
			
			if($general_library = Doctrine_Core::getTable("GeneralLibrary")->findOneById($client_id)){
				$data['general_library'] = $general_library;
			}
			
			$response_data['data'] 		= $this->getPartial("outputvatentries",array('data' => $data,"account_outputvat_entries" => $account_outputvat_entries,'form'=>$form));
		}
	} 
	return $this->renderText(json_encode($response_data)); 
  }
  
  public function executeCalcTotalPartEntry(sfWebRequest $request)
  { 
	$this->forward404unless($request->isXmlHttpRequest() || $request->isMethod(sfRequest::POST));
	$amount 		 = $request->getParameter("amount",0);
	$vat_application = $request->getParameter("vatapp",0);
	$ewt 			 = $request->getParameter("ewt",0);
	$atc 			 = $request->getParameter("atc",0);
	$total			 = 0;
	
	$response_data = array("hasTotal" => false);
	if($total = $this->calculateTotalParticularEntry($amount,$vat_application,$ewt,$atc)){
		$response_data['hasTotal'] 	   = true;
		$response_data['total_amount'] = $total;
	}
	
	return $this->renderText(json_encode($response_data)); 
  } 
  
  protected function calculateTotalParticularEntry($amount,$vat_application,$ewt,$atc)
  { 
	$total_amount    	  = 0;
	$total_vat_app_value  = 0; 
	$total_ewt_value  	  = 0; 
	$total_atc_value      = 0; 
	
	if(!in_array($vat_application,ReceiptParticularEntryTable::getInstance()->getVatApplicationInArray())){
		return false;
	}
	
	if($ewt_obj = Doctrine_Core::getTable("TaxExpandedWithheld")->findOneById($ewt)){
		$total_ewt_value = $ewt_obj->getTaxRatePercent();
	}
	
	if($atc_obj = Doctrine_Core::getTable("TaxFinalWithheld")->findOneById($atc)){
		$total_atc_value = $atc_obj->getTaxRatePercent();
	}
	
	$current_vat = Doctrine_Core::getTable("TaxRate")->getCurrenttaxRate();
	
	
	if($vat_application == ReceiptParticularEntry::VAT_EXEMPT || $vat_application == ReceiptParticularEntry::VAT_ZERO_PERCENT){
		$total_vat_app_value = 0;
	}
	elseif($vat_application == ReceiptParticularEntry::VAT_INCLUSIVE){
		//$total_vat_app_value = ($amount / $current_vat);
		$total_vat_app_value = 0;
	}else{
		$total_vat_app_value = ($amount / $current_vat);
	}
	
	$total_ewt_value = ($amount * ($total_atc_value/100));
	$total_atc_value = ($amount * ($total_atc_value/100));
	$total_amount 	 = $amount + $total_vat_app_value + $total_ewt_value + $total_atc_value;
	
	return $total_amount;
  } 
  
  public function executeCheckvouchernumber(sfWebRequest $request)
  {		
		$code_not_inuse = 'true';
		if($data = Doctrine_Core::getTable("AccountsPayableVoucher")->findOneByVoucherNumber($request->getParameter("voucher_number",0)))
		{ 
			if($request->getParameter("orig_voucher_number",0)  != $data->getVoucherNumber()){
				$code_not_inuse = 'false';
			}
		}
		return $this->renderText($code_not_inuse);
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
		$search_fields = array('id','book_id','period','voucher_number','total_amount','currency_id','created_at','updated_at'); 
		
		// SET FIELDS IN DATE DATATYPE IN GRID
		$date_fields   = array('period');		
		
		// SET FIELDS IN DATETIME DATATYPE IN GRID
		$datetime_fields    = array('created_at','updated_at',); 
		
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
	$users = Doctrine_Core::getTable('AccountsPayableVoucher')
				  ->createQuery('i')
				  ->select("COUNT(1) as total_records") 
				  ->leftJoin("i.Currency c")
				  ->leftJoin("i.Book b") 
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
	 
	$data_collection = Doctrine_Core::getTable('AccountsPayableVoucher')
				  ->createQuery('i') 
				  ->select("i.id,
							i.voucher_number,	 
							i.total_amount,  
							i.period,  
							i.created_at,
							i.updated_at,
							b.name,
							c.title")  
				  ->leftJoin("i.Currency c")
				  ->leftJoin("i.Book b") 
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
		$response['rows'][$i]['cell'] = array(
											  $data->getId(),
											  $data->getBook()->getName(), 
											  date('m/d/Y ',strtotime($data->getPeriod())),
											  $data->getVoucherNumber(), 
											  $data->getTotalAmount(), 
											  $data->getCurrency()->getTitle(), 
											  $data->getStatus(), 
											  date('m/d/Y H:i:s',strtotime($data->getCreatedAt())));
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
	 
	$report_data = Doctrine_Core::getTable('Department')
				  ->createQuery('d') 
				  ->select("id")  
				  ->where($where) 
				  ->orderby($sort_field.' '.$sort_order) 			  
				  ->execute(); 
  
	$filename = "GCROSS - DEPARTMENT CODE -" . date('Ymd') . ".xls"; 	
	header("Content-Disposition: attachment; filename=\"$filename\""); 
	header("Content-Type: application/vnd.ms-excel"); 

	echo "CODE \t TITLE \t DESCRIPTION \t CREATED AT \t UPDATED AT \r\n";
	if(count($report_data) > 0 ){ 	
		$conn = Doctrine_Manager::connection();	 
		foreach($report_data as $result){
			$query = "SELECT d.id,
							 d.code, 
							 d.title, 
							 d.description, 
							 d.created_at,
							 d.updated_at
						FROM Department d
						WHERE d.id={$result['id']}
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
}
