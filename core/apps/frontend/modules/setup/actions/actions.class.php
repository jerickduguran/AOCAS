<?php

/**
 * setup actions.
 *
 * @package    Zafire Accounting System
 * @subpackage setup
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class setupActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
	
  }
  
  public function executeNextstep(sfWebRequest $request)
  {
	$step 	 	= "intro";
	$options 	= array();
	if($next = $request->getParameter("step_number",1))
	{
		switch($next)
		{
			case '1':
				$step = "intro";
				break;		
			case '2':
				$step 	  = "companyconfiguration";
				if($org  = Doctrine_Core::getTable("Organization")->getDetails()){ 
					$form     = new OrganizationForm($org);
						//$form->setupWizard();
				}else{
					$form     = new OrganizationForm(); 
					//$form->setupWizard();
				}
				$options  = array('organization_form' => $form);
				break;		
			case '3':
				$step = "financial";
				if($fin_settings  = Doctrine_Core::getTable("FinancialSetting")->getDetails()){ 
					$form     = new FinancialSettingForm($fin_settings); 
				}else{
					$form     = new FinancialSettingForm(); 
				}
				$options  = array('form' => $form);
				break;			
			case '4':
				$step = "invoice";
				break;		
			case '5':
				$step 		= "currency"; 
				$form     	= new CurrencyForm();  
				$currencies = Doctrine_Core::getTable("Currency")->getAllExceptBase(); 
				$options  = array('form' => $form,'currencies'=>$currencies);
				break;		
			case '6':
				$step 		= "taxrate";
				$form     	= new TaxClassForm();  
				$rates		= Doctrine_Core::getTable("TaxClass")->findAll(); 
				$options 	= array('form' => $form,'rates'=>$rates);
				break;		
			case '7':
				$step = "chartofaccount";
				$form     	= new ChartOfAccountForm();  
				$coa		= Doctrine_Core::getTable("ChartOfAccount")->findAll(); 
				$options 	= array('form' => $form,'coa'=>$coa);
				break;		
			case '8':
				$step 		= "accountbalance"; 
				$form     	= new GeneralLedgerBeginningBalanceForm();  
				$form->configureSetup();
				$balances	= Doctrine_Core::getTable("GeneralLedgerBeginningBalance")->findAll(); 
				$options 	= array('form' => $form,'balances' => $balances);
				break;		
			default:
				$step = "intro";
				
				break;
		}
	}  
	
	return $this->renderPartial("setup/$step",$options);
  }
  
  public function executeSave(sfWebRequest $request)
  {
		$response_data = array('success' => false);
		if($step = $request->getParameter("step",1)){
			switch($step)
			{
				case '2':  //comnpany configuration
					if($data  = Doctrine_Core::getTable("Organization")->getDetails()){ 
						$form     = new OrganizationForm($data); 
						//$form->setupWizard();
					}else{
						$form     = new OrganizationForm(); 
						//$form->setupWizard();
					}
					$form->bind($request->getParameter($form->getName()),$request->getFiles($form->getName()));
					if($form->isValid()){
						$form->save();
						$response_data['success'] = true; 
					}else{
						$response_data['errors'] = array();
						foreach($form->getErrorSchema()->getErrors() as $field=>$error){
							$response_data['errors'][$field] = $error; 
						}
					}
					break;
				case '3':  //Financial Settings
					if($data  = Doctrine_Core::getTable("FinancialSetting")->getDetails()){ 
						$form     = new FinancialSettingForm($data); 
					}else{
						$form     = new FinancialSettingForm(); 
					}
					$form->bind($request->getParameter($form->getName()),$request->getFiles($form->getName()));
					if($form->isValid()){
						$form->save();
						$response_data['success'] = true; 
					}else{
						$response_data['errors'] = array();
						foreach($form->getErrorSchema()->getErrors() as $field=>$error){
							$response_data['errors'][$field] = $error; 
						}
					}
					break;
				case '4':  //Invoice
					if($data  = Doctrine_Core::getTable("FinancialSetting")->getDetails()){ 
						$form     = new FinancialSettingForm($data); 
					}else{
						$form     = new FinancialSettingForm(); 
					}
					$form->bind($request->getParameter($form->getName()),$request->getFiles($form->getName()));
					if($form->isValid()){
						$form->save();
						$response_data['success'] = true; 
					}else{
						$response_data['errors'] = array();
						foreach($form->getErrorSchema()->getErrors() as $field=>$error){
							$response_data['errors'][$field] = $error; 
						}
					}
					break;
				case '5':  //Currency Settings
					$form = new CurrencyForm();
					$form->bind($request->getParameter($form->getName()),$request->getFiles($form->getName()));
					if($form->isValid()){
						$form->save();
						$response_data['success'] = true; 
					}else{
						$response_data['errors'] = array();
						foreach($form->getErrorSchema()->getErrors() as $field=>$error){
							$response_data['errors'][$field] = $error; 
						}
					}
					break;
				case '6':  //Tax Rates Settings
					$form = new TaxClassForm();
					$form->bind($request->getParameter($form->getName()),$request->getFiles($form->getName()));
					if($form->isValid()){
						$form->save();
						$response_data['success'] = true; 
					}else{
						$response_data['errors'] = array();
						foreach($form->getErrorSchema()->getErrors() as $field=>$error){
							$response_data['errors'][$field] = $error; 
						}
					}
					break;
				case '7':  //Char of Account Settings
					$form = new ChartOfAccountForm();
					$form->bind($request->getParameter($form->getName()),$request->getFiles($form->getName()));
					if($form->isValid()){
						$form->save();
						$response_data['success'] = true; 
					}else{
						$response_data['errors'] = array();
						foreach($form->getErrorSchema()->getErrors() as $field=>$error){
							$response_data['errors'][$field] = $error; 
						}
					}
					break;
				case '7':  //Beginning Balance Settings
					$form = new GeneralLedgerBeginningBalanceForm();
					$form->configureSetup();
					$form->bind($request->getParameter($form->getName()),$request->getFiles($form->getName()));
					if($form->isValid()){
						$form->save();
						$response_data['success'] = true; 
					}else{
						$response_data['errors'] = array();
						foreach($form->getErrorSchema()->getErrors() as $field=>$error){
							$response_data['errors'][$field] = $error; 
						}
					}
					break;
				default: 
					break;
			}
		}
		return $this->renderText(json_encode($response_data));
  }
   
  /**
   * Execute Presave Photo action
   * Presaves image upload  
   */
  public function executePresavephoto(sfWebRequest $request)
  {
	$user_obj 		= $this->getUser(); 
	$file 			= $request->getFiles();
    
	sfConfig::set('sf_web_debug',false);
	//VALIDATE FILE TYPE
    if(!in_array($file['logo']['type'], sfConfig::get('app_upload_phototype'))){
      $response_data = array('status'  => false, 
							 'message' => 'Please select valid image file type');
      return $this->renderText(json_encode($response_data));
    }    
    $image_default_size = str_replace('MB', '', sfConfig::get('app_upload_limit'));
    
	//VALIDATE FILE SIZE
    $size = ($file['logo']['size']/1024)/1024;
    if($size > $image_default_size){
      $response_data = array('status' 	=> false, 
							 'message' 	=> 'Maximum of '.$image_default_size.' MB allowed.');
      return $this->renderText(json_encode($response_data));
    }
	
    //INITIALIZE UPLOAD TO TEMPORARY DIRECTORY
    Resize::$imageDir 	= sfConfig::get('app_upload_tempuploaddir');    
    $fileUpload 		= Resize::uploadFile($file['logo']);
    
    $arrayReturn = array('status' => false);
    
	if($fileUpload){  
		Resize::setImage($fileUpload);
		Resize::resizeImage(sfConfig::get("app_upload_companylogowidth"),sfConfig::get("app_upload_companylogoheight"),'crop');
		$new_image = Resize::saveImage($fileUpload);						
        $arrayReturn = array('status' => true, 'logo' => $new_image);
	  
	  //set current image for validation
	  $this->removeAttribute("UPLOADED_PHOTO");
	  $user_obj->setAttribute("UPLOADED_PHOTO",$new_image);
    }    
    return $this->renderText(json_encode($arrayReturn));
  } 
  
	/*
	* @ Removes User Attribute
	*/
	protected function removeAttribute($attribute = '')
	{
		$user_obj   =   $this->getUser();
		if($user_obj->hasAttribute($attribute)){
			$user_obj->getAttributeHolder()->remove($attribute);
		}
	} 
  
}
