<?php

/**
 * PettyCashVoucherAccountEntry form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PettyCashVoucherAccountEntryForm extends BasePettyCashVoucherAccountEntryForm
{
  public function configure()
  {
	$this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
   //   'petty_cash_voucher_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PettyCashVoucherVoucher'), 'add_empty' => false)),
      'chart_of_account_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'general_library_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'dn_reference'          => new sfWidgetFormInputText(),
      'debit'                 => new sfWidgetFormInputText(),
      'credit'                => new sfWidgetFormInputText(), 
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
   //   'petty_cash_voucher_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PettyCashVoucherVoucher'))),
      'chart_of_account_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'general_library_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'dn_reference'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'debit'                 => new sfValidatorNumber(array('required' => false)),
      'credit'                => new sfValidatorNumber(array('required' => false)), 
    ));

    $this->widgetSchema->setNameFormat('petty_cash_voucher_voucher_account_entry[%s]');

  }
}
