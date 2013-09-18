<?php

/**
 * AccountsPayableVoucherAccountEntry filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAccountsPayableVoucherAccountEntryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'accounts_payable_voucher_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AccountsPayableVoucher'), 'add_empty' => true)),
      'chart_of_account_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'general_library_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'dn_reference'                => new sfWidgetFormFilterInput(),
      'debit'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'credit'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'accounts_payable_voucher_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AccountsPayableVoucher'), 'column' => 'id')),
      'chart_of_account_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ChartOfAccount'), 'column' => 'id')),
      'general_library_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GeneralLibrary'), 'column' => 'id')),
      'dn_reference'                => new sfValidatorPass(array('required' => false)),
      'debit'                       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'credit'                      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('accounts_payable_voucher_account_entry_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AccountsPayableVoucherAccountEntry';
  }

  public function getFields()
  {
    return array(
      'id'                          => 'Number',
      'accounts_payable_voucher_id' => 'ForeignKey',
      'chart_of_account_id'         => 'ForeignKey',
      'general_library_id'          => 'ForeignKey',
      'dn_reference'                => 'Text',
      'debit'                       => 'Number',
      'credit'                      => 'Number',
      'created_at'                  => 'Date',
      'updated_at'                  => 'Date',
    );
  }
}
