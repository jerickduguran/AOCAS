<?php

/**
 * JournalVoucherAccountEntryOutputVatEntry filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseJournalVoucherAccountEntryOutputVatEntryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'journal_voucher_account_entry_output_vat_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('JournalVoucherAccountEntryOutputVat'), 'add_empty' => true)),
      'tax_rate_id'                                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxRate'), 'add_empty' => true)),
      'gross_purchased'                             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vat_received'                                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'net_sales'                                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'journal_voucher_account_entry_output_vat_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('JournalVoucherAccountEntryOutputVat'), 'column' => 'id')),
      'tax_rate_id'                                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TaxRate'), 'column' => 'id')),
      'gross_purchased'                             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'vat_received'                                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'net_sales'                                   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'                                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('journal_voucher_account_entry_output_vat_entry_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JournalVoucherAccountEntryOutputVatEntry';
  }

  public function getFields()
  {
    return array(
      'id'                                          => 'Number',
      'journal_voucher_account_entry_output_vat_id' => 'ForeignKey',
      'tax_rate_id'                                 => 'ForeignKey',
      'gross_purchased'                             => 'Number',
      'vat_received'                                => 'Number',
      'net_sales'                                   => 'Number',
      'created_at'                                  => 'Date',
      'updated_at'                                  => 'Date',
    );
  }
}
