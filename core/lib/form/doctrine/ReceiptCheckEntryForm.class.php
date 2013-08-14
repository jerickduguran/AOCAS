<?php

/**
 * ReceiptCheckEntry form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReceiptCheckEntryForm extends BaseReceiptCheckEntryForm
{
  public function configure()
  {
	 $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'check_number'        => new sfWidgetFormTextarea(),
      'check_date'          => new sfWidgetFormDate(),
      //'receipt_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Receipt'), 'add_empty' => true)),
      'bank_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bank'), 'add_empty' => true)),
      'general_library_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'chart_of_account_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'is_cleared'          => new sfWidgetFormInputCheckbox(),
      'is_released'         => new sfWidgetFormInputCheckbox(),
      'is_cancelled'        => new sfWidgetFormInputCheckbox(), 
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'check_number'        => new sfValidatorString(array('required' => false)),
      'check_date'          => new sfValidatorDate(array('required' => false)),
     // 'receipt_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Receipt'), 'required' => false)),
      'bank_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bank'), 'required' => false)),
      'general_library_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'chart_of_account_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'is_cleared'          => new sfValidatorBoolean(array('required' => false)),
      'is_released'         => new sfValidatorBoolean(array('required' => false)),
      'is_cancelled'        => new sfValidatorBoolean(array('required' => false)),
      'amount'              => new sfValidatorNumber(array('required' => false)), 
    ));

    $this->widgetSchema->setNameFormat('receipt_check_entry[%s]');
  }
}
