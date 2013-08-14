<?php

/**
 * GeneralLibraryBillingInfo form base class.
 *
 * @method GeneralLibraryBillingInfo getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGeneralLibraryBillingInfoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'general_library_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'drawing_no'         => new sfWidgetFormInputText(),
      'specs_no'           => new sfWidgetFormInputText(),
      'bill_to'            => new sfWidgetFormInputText(),
      'building_no'        => new sfWidgetFormInputText(),
      'street_1'           => new sfWidgetFormInputText(),
      'street_2'           => new sfWidgetFormInputText(),
      'city'               => new sfWidgetFormInputText(),
      'postal_code'        => new sfWidgetFormInputText(),
      'province'           => new sfWidgetFormInputText(),
      'country_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'attention'          => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'general_library_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'drawing_no'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'specs_no'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'bill_to'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'building_no'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'street_1'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'street_2'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'city'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'postal_code'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'province'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'country_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'required' => false)),
      'attention'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('general_library_billing_info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GeneralLibraryBillingInfo';
  }

}
