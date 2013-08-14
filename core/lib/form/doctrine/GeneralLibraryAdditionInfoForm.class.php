<?php

/**
 * GeneralLibraryAdditionInfo form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GeneralLibraryAdditionInfoForm extends BaseGeneralLibraryAdditionInfoForm
{
  public function configure()
  {
	   $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      //'general_library_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'industry_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Industry'), 'add_empty' => true)),
      'term_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibraryTerms'), 'add_empty' => true)),
      'no_days'             => new sfWidgetFormInputText(),
      'percent_discount'    => new sfWidgetFormInputText(),
      'credit_limit_amount' => new sfWidgetFormInputText(),
      'restricted'          => new sfWidgetFormInputCheckbox(),
      'remarks'             => new sfWidgetFormInputText(),
      'vat_no'              => new sfWidgetFormInputText(),
      'tin'                 => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
    //  'general_library_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'industry_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Industry'), 'required' => false)),
      'term_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibraryTerms'), 'required' => false)),
      'no_days'             => new sfValidatorPass(array('required' => false)),
      'percent_discount'    => new sfValidatorNumber(array('required' => false)),
      'credit_limit_amount' => new sfValidatorNumber(array('required' => false)),
      'restricted'          => new sfValidatorBoolean(array('required' => false)),
      'remarks'             => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'vat_no'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'tin'                 => new sfValidatorString(array('max_length' => 50, 'required' => false))
    ));
    $this->widgetSchema->setNameFormat('general_library_addition_info[%s]');
  }
}
