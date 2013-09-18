<?php

/**
 * JournalVoucherAccountEntryOutputVatEntry form base class.
 *
 * @method JournalVoucherAccountEntryOutputVatEntry getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseJournalVoucherAccountEntryOutputVatEntryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                          => new sfWidgetFormInputHidden(),
      'journal_voucher_account_entry_output_vat_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('JournalVoucherAccountEntryOutputVat'), 'add_empty' => true)),
      'tax_rate_id'                                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxRate'), 'add_empty' => true)),
      'gross_purchased'                             => new sfWidgetFormInputText(),
      'vat_received'                                => new sfWidgetFormInputText(),
      'net_sales'                                   => new sfWidgetFormInputText(),
      'created_at'                                  => new sfWidgetFormDateTime(),
      'updated_at'                                  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                                          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'journal_voucher_account_entry_output_vat_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('JournalVoucherAccountEntryOutputVat'), 'required' => false)),
      'tax_rate_id'                                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TaxRate'), 'required' => false)),
      'gross_purchased'                             => new sfValidatorNumber(array('required' => false)),
      'vat_received'                                => new sfValidatorNumber(array('required' => false)),
      'net_sales'                                   => new sfValidatorNumber(array('required' => false)),
      'created_at'                                  => new sfValidatorDateTime(),
      'updated_at'                                  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('journal_voucher_account_entry_output_vat_entry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JournalVoucherAccountEntryOutputVatEntry';
  }

}
