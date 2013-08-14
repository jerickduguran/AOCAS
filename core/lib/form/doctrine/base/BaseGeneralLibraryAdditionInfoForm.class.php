<?php

/**
 * GeneralLibraryAdditionInfo form base class.
 *
 * @method GeneralLibraryAdditionInfo getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGeneralLibraryAdditionInfoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'general_library_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'industry_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Industry'), 'add_empty' => true)),
      'term_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibraryTerms'), 'add_empty' => true)),
      'no_days'             => new sfWidgetFormInputText(),
      'percent_discount'    => new sfWidgetFormInputText(),
      'credit_limit_amount' => new sfWidgetFormInputText(),
      'restricted'          => new sfWidgetFormInputCheckbox(),
      'remarks'             => new sfWidgetFormInputText(),
      'vat_no'              => new sfWidgetFormInputText(),
      'tin'                 => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'general_library_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'industry_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Industry'), 'required' => false)),
      'term_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibraryTerms'), 'required' => false)),
      'no_days'             => new sfValidatorPass(array('required' => false)),
      'percent_discount'    => new sfValidatorNumber(array('required' => false)),
      'credit_limit_amount' => new sfValidatorNumber(array('required' => false)),
      'restricted'          => new sfValidatorBoolean(array('required' => false)),
      'remarks'             => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'vat_no'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'tin'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('general_library_addition_info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GeneralLibraryAdditionInfo';
  }

}
