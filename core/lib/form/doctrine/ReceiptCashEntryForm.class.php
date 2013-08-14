<?php

/**
 * ReceiptCashEntry form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReceiptCashEntryForm extends BaseReceiptCashEntryForm
{
  public function configure()
  {
	 $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
     // 'receipt_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Receipt'), 'add_empty' => true)),
      'general_library_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'chart_of_account_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'date'                => new sfWidgetFormDate(),
      'amount'              => new sfWidgetFormInputText(), 
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
    //  'receipt_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Receipt'), 'required' => false)),
      'general_library_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'chart_of_account_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'date'                => new sfValidatorDate(array('required' => false)),
      'amount'              => new sfValidatorNumber(array('required' => false)), 
    ));

    $this->widgetSchema->setNameFormat('receipt_cash_entry[%s]');
  }
}
