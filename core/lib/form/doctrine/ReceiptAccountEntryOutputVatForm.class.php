<?php

/**
 * ReceiptAccountEntryOutputVat form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReceiptAccountEntryOutputVatForm extends BaseReceiptAccountEntryOutputVatForm
{
  public function configure()
  {  
	 $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'receipt_number'      => new sfWidgetFormInputHidden(),
      'chart_of_account_id' => new sfWidgetFormInputHidden(),
      'general_library_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'tin_number'          => new sfWidgetFormInputText(), 
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'receipt_number'      => new sfValidatorString(array('max_length' => 60,'required' => false)),
      'chart_of_account_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'general_library_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'tin_number'          => new sfValidatorString(array('max_length' => 60, 'required' => false)), 
    )); 
	
    $this->widgetSchema->setNameFormat('receipt_account_entry_output_vat[%s]');
 
	$this->embedRelation("ReceiptAccountEntryOutputVatEntry");
  }
	public function addNewEntry($number = 1)
	{
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new ReceiptAccountEntryOutputVatEntry();
		$entry->setReceiptAccountEntryOutputVat($this->getObject());
		$entry_form  = new ReceiptAccountEntryOutputVatEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('outputvat_entries', $new_entry);
	}
}
