<?php

/**
 * GeneralLibrary form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GeneralLibraryForm extends BaseGeneralLibraryForm
{
  public function configure()
  {
	
   $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'client_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ClientType'), 'add_empty' => true)),
      'status_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ClientStatus'), 'add_empty' => true)),
      'category_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibraryCategory'), 'add_empty' => true)),
      'code'           => new sfWidgetFormInputText(),
      'name'           => new sfWidgetFormInputText(),
      'building_no'    => new sfWidgetFormInputText(),
      'street_1'       => new sfWidgetFormInputText(),
      'street_2'       => new sfWidgetFormInputText(),
      'city'           => new sfWidgetFormInputText(),
      'postal_code'    => new sfWidgetFormInputText(),
      'province'       => new sfWidgetFormInputText(),
      'country_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'attention'      => new sfWidgetFormInputText(),
      'position'       => new sfWidgetFormInputText(),
      'telephone_no'   => new sfWidgetFormInputText(),
      'fax_no'         => new sfWidgetFormInputText(),
      'mobile_no'      => new sfWidgetFormInputText(),
      'email'          => new sfWidgetFormInputText(),
      'website'        => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'client_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ClientType'), 'required' => false)),
      'status_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ClientStatus'), 'required' => false)),
      'category_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibraryCategory'), 'required' => false)),
      'code'           => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'name'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'building_no'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'street_1'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'street_2'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'city'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'postal_code'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'province'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'country_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'required' => false)),
      'attention'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'position'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'telephone_no'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fax_no'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mobile_no'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'website'        => new sfValidatorString(array('max_length' => 150, 'required' => false))
    ));
    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'GeneralLibrary', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('general_library[%s]');
   if ($this->object->id) {
        $this->embedForm('billing_info',new GeneralLibraryBillingInfoForm(Doctrine::getTable('GeneralLibraryBillingInfo')->findOneByGeneralLibraryId($this->object->id)));
        $this->embedForm('additional_info',new GeneralLibraryAdditionInfoForm(Doctrine::getTable('GeneralLibraryAdditionInfo')->findOneByGeneralLibraryId($this->object->id)));
    } else {
        $this->embedForm('billing_info',new GeneralLibraryBillingInfoForm());
        $this->embedForm('additional_info',new GeneralLibraryAdditionInfoForm());
    }  
  } 
  
	public function saveEmbeddedForms($con = null, $forms = null)
	{ 
	  if (is_null($con))
		{
		  $con = $this->getConnection();
		}
	 
		if (is_null($forms))
		{
		  $forms = $this->embeddedForms;
		}
	 
		foreach ($forms as $form)
		{
		  if ($form instanceof sfFormDoctrine)
		  {
			// The magic start here
			$field_name  = 'general_library_id';
			if($form->getObject()->contains($field_name)) {
			  $method_name = 'set'.sfInflector::camelize($field_name);
			  $form->getObject()->$method_name($this->getObject()->getId());
			}
			// Here it ends
			$form->getObject()->save($con);
			$form->saveEmbeddedForms($con);
		  }
		  else
		  {
			$this->saveEmbeddedForms($con, $form->getEmbeddedForms());
		  }
	   
		}
	}
}
