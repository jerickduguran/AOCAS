<?php

/**
 * CashVoucherEntry filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCashVoucherEntryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'check_voucher_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CheckVoucher'), 'add_empty' => true)),
      'general_library_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'chart_of_account_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'amount'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'check_voucher_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CheckVoucher'), 'column' => 'id')),
      'general_library_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GeneralLibrary'), 'column' => 'id')),
      'chart_of_account_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ChartOfAccount'), 'column' => 'id')),
      'amount'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'date'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('cash_voucher_entry_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CashVoucherEntry';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'check_voucher_id'    => 'ForeignKey',
      'general_library_id'  => 'ForeignKey',
      'chart_of_account_id' => 'ForeignKey',
      'amount'              => 'Number',
      'date'                => 'Date',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
