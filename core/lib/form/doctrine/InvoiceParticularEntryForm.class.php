<?php

/**
 * InvoiceParticularEntry form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InvoiceParticularEntryForm extends BaseInvoiceParticularEntryForm
{
  public function configure()
  { 
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
     // 'invoice_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Invoice'), 'add_empty' => true)),
      'title'                    => new sfWidgetFormInputText(),
      'amount'                   => new sfWidgetFormInputText(),
      'vat_application'          => new sfWidgetFormChoice(array('choices' => array(''=>'','VAT_ZERO_PERCENT' => 'Zero Rated VAT', 'VAT_EXEMPT' => 'VAT Exempt', 'VAT_INCLUSIVE' => 'VAT Inclusive', 'VAT_EXCLUSIVE' => 'VAT Exclusive'))),
      'tax_expanded_withheld_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxExpandedWithheld'), 'add_empty' => true)),
      'tax_final_withheld_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxFinalWithheld'), 'add_empty' => true)),
      'total'                    => new sfWidgetFormInputText(), 
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
     // 'invoice_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Invoice'), 'required' => false)),
      'title'                    => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'amount'                   => new sfValidatorNumber(array('required' => false)),
      'vat_application'          => new sfValidatorChoice(array('choices' => array(0 => 'VAT_EXEMPT', 1 => 'VAT_ZERO_PERCENT', 2 => 'VAT_INCLUSIVE', 3 => 'VAT_EXCLUSIVE'), 'required' => false)),
      'tax_expanded_withheld_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TaxExpandedWithheld'), 'required' => false)),
      'tax_final_withheld_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TaxFinalWithheld'), 'required' => false)),
      'total'                    => new sfValidatorNumber(array('required' => false)), 
    ));

    $this->widgetSchema->setNameFormat('invoice_particular_entry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
