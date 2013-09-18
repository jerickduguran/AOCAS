<?php

/**
 * JournalVoucherAccountEntryOutputVat form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class JournalVoucherAccountEntryOutputVatForm extends BaseJournalVoucherAccountEntryOutputVatForm
{
  public function configure()
  {
	 $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'journal_voucher_number' => new sfWidgetFormInputText(),
      'chart_of_account_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'general_library_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'tin_number'             => new sfWidgetFormInputText(), 
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'journal_voucher_number' => new sfValidatorPass(array('required' => false)),
      'chart_of_account_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'general_library_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'tin_number'             => new sfValidatorString(array('max_length' => 60, 'required' => false)), 
    ));

    $this->widgetSchema->setNameFormat('journal_voucher_account_entry_output_vat[%s]');
	
	$this->embedRelation("JournalVoucherAccountEntryOutputVatEntry");

  }	
  
  public function addNewEntry($number = 1)
	{
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new JournalVoucherAccountEntryOutputVatEntry();
		$entry->setJournalVoucherAccountEntryOutputVat($this->getObject());
		$entry_form  = new JournalVoucherAccountEntryOutputVatEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('outputvat_entries', $new_entry);
	}
}
