<?php

/**
 * InvoiceAccountEntryOutputVatEntry form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InvoiceAccountEntryOutputVatEntryForm extends BaseInvoiceAccountEntryOutputVatEntryForm
{
  public function configure()
  {
	$this->setWidgets(array(
      'id'                                  => new sfWidgetFormInputHidden(),
     // 'invoice_account_entry_output_vat_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvoiceAccountEntryOutputVat'), 'add_empty' => true)),
      'tax_rate_id'                         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxRate'), 'add_empty' => true)),
      'gross_purchased'                     => new sfWidgetFormInputText(),
      'vat_received'                        => new sfWidgetFormInputText(),
      'net_sales'                           => new sfWidgetFormInputText(), 
    ));

    $this->setValidators(array(
      'id'                                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      //'invoice_account_entry_output_vat_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('InvoiceAccountEntryOutputVat'), 'required' => false)),
      'tax_rate_id'                         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TaxRate'), 'required' => false)),
      'gross_purchased'                     => new sfValidatorNumber(array('required' => false)),
      'vat_received'                        => new sfValidatorNumber(array('required' => false)),
      'net_sales'                           => new sfValidatorNumber(array('required' => false)), 
    ));

    $this->widgetSchema->setNameFormat('invoice_account_entry_output_vat_entry[%s]');

  }
}
