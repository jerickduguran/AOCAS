<?php

/**
 * AccountsPayableVoucherAccountEntry form base class.
 *
 * @method AccountsPayableVoucherAccountEntry getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAccountsPayableVoucherAccountEntryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'accounts_payable_voucher_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AccountsPayableVoucher'), 'add_empty' => false)),
      'chart_of_account_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'general_library_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'dn_reference'                => new sfWidgetFormInputText(),
      'debit'                       => new sfWidgetFormInputText(),
      'credit'                      => new sfWidgetFormInputText(),
      'created_at'                  => new sfWidgetFormDateTime(),
      'updated_at'                  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'accounts_payable_voucher_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AccountsPayableVoucher'))),
      'chart_of_account_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'general_library_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'dn_reference'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'debit'                       => new sfValidatorNumber(array('required' => false)),
      'credit'                      => new sfValidatorNumber(array('required' => false)),
      'created_at'                  => new sfValidatorDateTime(),
      'updated_at'                  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('accounts_payable_voucher_account_entry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AccountsPayableVoucherAccountEntry';
  }

}
