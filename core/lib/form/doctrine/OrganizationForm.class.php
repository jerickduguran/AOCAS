<?php

/**
 * Organization form.
 *
 * @package    Zafire Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OrganizationForm extends BaseOrganizationForm
{
  public function configure()
  {
	$this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'display_name'         => new sfWidgetFormInputText(),
      'legal_name'           => new sfWidgetFormInputText(),
      'organization_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrganizationType'), 'add_empty' => true)),
      'rdo_code'             => new sfWidgetFormInputText(),
      'branch_code'          => new sfWidgetFormInputText(),
      'tin'                  => new sfWidgetFormInputText(), 
      'street'               => new sfWidgetFormTextarea(),
      'city'                 => new sfWidgetFormInputText(),
      'code'                 => new sfWidgetFormInputText(),
      'country_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'telephone_number'     => new sfWidgetFormInputText(),
      'fax'                  => new sfWidgetFormInputText(),
      'mobile_number'        => new sfWidgetFormInputText(),
      'email'                => new sfWidgetFormInputText(),
      'facebook_url'         => new sfWidgetFormInputText(),
      'twitter_url'          => new sfWidgetFormInputText(),
      'linkedln_url'         => new sfWidgetFormInputText(),
      'googleplus_url'       => new sfWidgetFormInputText(), 
	  'logo'  	   => new sfWidgetFormInputFileEditable(array(
								'label'     	=> 'Photo',
								'file_src'  	=>  "/".sfConfig::get("app_upload_companylogo").($this->getObject()->getId() ? $this->getObject()->get('logo') : ''),
								'is_image'  	=> true,
								'edit_mode' 	=> $this->getObject()->getId(),
								'delete_label'	=> 'Delete logo?',
								'template'  	=> '%input% '.(($this->getObject()->get('id') ? ($this->getObject()->get('logo') ? '<br/><div class="q_pic"><a href="'."/".sfConfig::get("app_upload_companylogo").($this->getObject()->getId() ? $this->getObject()->getLogo() : '').'">%file%</a></div>' : '') : ''))
							)),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'display_name'         => new sfValidatorString(array('max_length' => 50, 'required' => true)),
      'legal_name'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'organization_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('OrganizationType'), 'required' => false)),
      'rdo_code'             => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'branch_code'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'tin'                  => new sfValidatorString(array('max_length' => 12, 'required' => true)), 
      'street'               => new sfValidatorString(array('required' => false)),
      'city'                 => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'code'                 => new sfValidatorPass(array('required' => false)),
      'country_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'required' => false)),
      'telephone_number'     => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'fax'                  => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'mobile_number'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email'                => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'facebook_url'         => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'twitter_url'          => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'linkedln_url'         => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'googleplus_url'       => new sfValidatorString(array('max_length' => 150, 'required' => false)),	  
      'logo'      			 => new sfValidatorFile(array('required' => false))
    ));

    $this->widgetSchema->setNameFormat('organization[%s]');

  }
  
  public function setupWizard()
  { 
     $this->setWidget('logo',	   new sfWidgetFormInputHidden());
     $this->validatorSchema['logo'] = new sfValidatorString(array('required'=>true));	 
  }	
  public function save($conn = null)
  {     
		$old_image = $this->getObject()->getLogo();
		parent::save();
		
		$post_values = $this->getValues(); 
		if(!empty($post_values['logo']))
		{  
			$image = $post_values['logo'];  
			if(is_object($image)){ 
				if($image->getType() == 'image/jpg' || 
				   $image->getType() == 'image/jpeg'|| 
				   $image->getType() == 'image/png'|| 
				   $image->getType() == 'image/gif'){    
				   
					$upload_dir  	  = sfConfig::get('app_upload_companylogo');   
					ImageTool::$imageDir = $upload_dir; 
					$fileUpload 	  = ImageTool::uploadFile(array('name'=>$image->getOriginalName(),'tmp_name'=>$image->getTempName()));  
				    if($fileUpload){
						ImageTool::setImage($fileUpload);
						ImageTool::resizeImage(sfConfig::get("app_upload_imagewidth"),sfConfig::get("app_upload_imageheight"),'crop');
						$new_image = ImageTool::saveImage($fileUpload);						
						$file      = explode("/",$new_image);
						$photo	   = end($file);   		
						
						//check and delete image
						if(isset($post_values['logo_delete'])){
							@unlink($upload_dir.$this->getObject()->getLogo());
						}				
						
						$this->getObject()->setLogo($photo)->save();		
					} 
				}
			}
		}else{  
			$this->getObject()->setLogo($old_image)->save();
		} 
		return $this->getObject();		
   }
}
