<?php

/**
 * CheckVoucherParticularEntry form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CheckVoucherParticularEntryForm extends BaseCheckVoucherParticularEntryForm
{
  public function configure()
  {
	$this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
     // 'check_voucher_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CheckVoucher'), 'add_empty' => false)),
      'title'                    => new sfWidgetFormInputText(),
      'amount'                   => new sfWidgetFormInputText(),
      'vat_application'          => new sfWidgetFormChoice(array('choices' => array(''=>'','VAT_ZERO_PERCENT' => 'Zero Rated VAT', 'VAT_EXEMPT' => 'VAT Exempt', 'VAT_INCLUSIVE' => 'VAT Inclusive', 'VAT_EXCLUSIVE' => 'VAT Exclusive'))),
      'tax_expanded_withheld_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxExpandedWithheld'), 'add_empty' => true)),
      'tax_final_withheld_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxFinalWithheld'), 'add_empty' => true)),
      'total'                    => new sfWidgetFormInputText(), 
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
     // 'check_voucher_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CheckVoucher'))),
      'title'                    => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'amount'                   => new sfValidatorNumber(array('required' => false)),
      'vat_application'          => new sfValidatorChoice(array('choices' => array(0 => 'VAT_EXEMPT', 1 => 'VAT_ZERO_PERCENT', 2 => 'VAT_INCLUSIVE', 3 => 'VAT_EXCLUSIVE'), 'required' => false)),
      'tax_expanded_withheld_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TaxExpandedWithheld'), 'required' => false)),
      'tax_final_withheld_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TaxFinalWithheld'), 'required' => false)),
      'total'                    => new sfValidatorNumber(array('required' => false)), 
    ));

    $this->widgetSchema->setNameFormat('check_voucher_particular_entry[%s]'); 
  	 

  }	
  
  public function addNewEntry($number = 1)
	{
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new CheckVoucherAccountEntryOutputVatEntry();
		$entry->setCheckVoucherAccountEntryOutputVat($this->getObject());
		$entry_form  = new CheckVoucherAccountEntryOutputVatEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('outputvat_entries', $new_entry);
	}
}
