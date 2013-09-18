<?php

/**
 * AccountsPayableVoucher form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AccountsPayableVoucherForm extends BaseAccountsPayableVoucherForm
{
  public function configure()
  {
	  $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'book_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => false)),
      'voucher_number'        => new sfWidgetFormInputText(),
      'general_library_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'currency_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'add_empty' => true)),
      'si_dr_number'          => new sfWidgetFormInputText(),
      'purchase_order_number' => new sfWidgetFormInputText(),
      'date_received'         => new sfWidgetFormInputText(),
      'period'                => new sfWidgetFormInputText(),
      'due_date'              => new sfWidgetFormInputText(),
      'terms_of_payment_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TermsOfPayment'), 'add_empty' => true)),
      'header_message'        => new sfWidgetFormTextarea(),
      'footer_message'        => new sfWidgetFormTextarea(),
      'total_amount'          => new sfWidgetFormInputText(),
      'status'                => new sfWidgetFormChoice(array('choices' => array('FULL' => 'FULL', 'PARTIAL' => 'PARTIAL'))), 
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'book_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'required' => false)),
      'voucher_number'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'general_library_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'currency_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'required' => false)),
      'si_dr_number'          => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'purchase_order_number' => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'date_received'         => new sfValidatorString(array('required' => false)),
      'period'                => new sfValidatorDate(array('required' => false)),
      'due_date'              => new sfValidatorDate(array('required' => false)),
      'terms_of_payment_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TermsOfPayment'), 'required' => false)),
      'header_message'        => new sfValidatorString(array('required' => false)),
      'footer_message'        => new sfValidatorString(array('required' => false)),
      'total_amount'          => new sfValidatorNumber(array('required' => false)),
      'status'                => new sfValidatorChoice(array('choices' => array(0 => 'FULL', 1 => 'PARTIAL'), 'required' => false)),
    ));


    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'AccountsPayableVoucher', 'column' => array('voucher_number')))
    );

    $this->widgetSchema->setNameFormat('accounts_payable_voucher[%s]');
	
	
		
	$this->setWidget("particular_template", new sfWidgetFormSelect(array('choices' => Doctrine_Core::getTable('ParticularTemplate')->getAllAsChoices())));
	$this->setValidator("particular_template",new sfValidatorString(array('required' => false)));
	
	$this->setWidget("book_template", new sfWidgetFormSelect(array('choices' => Doctrine_Core::getTable('JournalBookTemplate')->getAllAsChoices())));
	$this->setValidator("book_template",new sfValidatorString(array('required' => false)));
 

 
    $this->widgetSchema->setNameFormat('ap_voucher[%s]');
	$this->embedRelation("AccountsPayableVoucherParticularEntry");
	$this->embedRelation("AccountsPayableVoucherAccountEntry");  
 
  }
  
  
  public function addNewParticularEntry($number = 1)
   {
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new AccountsPayableVoucherParticularEntry();
		$entry->setAccountsPayableVoucher($this->getObject());
		$entry_form  = new AccountsPayableVoucherParticularEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('particular_entries', $new_entry);
   }
   
   public function addNewAccountEntry($number = 1)
   {
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new AccountsPayableVoucherAccountEntry();
		$entry->setAccountsPayableVoucher($this->getObject());
		$entry_form  = new AccountsPayableVoucherAccountEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('account_entries', $new_entry);
   }
   
   public function bind(array $taintedValues = null, array $taintedFiles = null)
   {  
	//Particular Entries
	if(isset($taintedValues['particular_entries'])){
		$new_particular_entries = new BaseForm();
		foreach($taintedValues['particular_entries'] as $key => $new_particular_entry){
		  $particular_entry = new AccountsPayableVoucherParticularEntry();
		  $particular_entry->setAccountsPayableVoucher($this->getObject());
		  $particular_entry_form = new AccountsPayableVoucherParticularEntryForm($particular_entry);

		  $new_particular_entries->embedForm($key,$particular_entry_form);
		}  
		$this->embedForm('particular_entries',$new_particular_entries); 
	}
	 
	//Account Entries
	if(isset($taintedValues['account_entries'])){
		$new_account_entries = new BaseForm();
		foreach($taintedValues['account_entries'] as $key => $new_account_entry){
		  $account_entry = new AccountsPayableVoucherAccountEntry();
		  $account_entry->setAccountsPayableVoucher($this->getObject());
		  $account_entry_form = new AccountsPayableVoucherAccountEntryForm($account_entry);

		  $new_account_entries->embedForm($key,$account_entry_form);
		}
		$this->embedForm('account_entries',$new_account_entries);
	} 
    parent::bind($taintedValues, $taintedFiles);
  } 
  
    public function saveEmbeddedForms($con = null, $forms = null)
	{ 
	  if (is_null($con))
		{
		  $con = $this->getConnection();
		}
	 
		if (is_null($forms))
		{
		  $forms = $this->embeddedForms;
		}
	 
		foreach ($forms as $form)
		{
		  if ($form instanceof sfFormDoctrine)
		  { 
			$field_name  = 'accounts_payable_voucher_id';
			if($form->getObject()->contains($field_name)) {
			  $method_name = 'set'.sfInflector::camelize($field_name);
			  $form->getObject()->$method_name($this->getObject()->getId());
			} 
			$form->getObject()->save($con);
			$form->saveEmbeddedForms($con);
		  }
		  else
		  {
			$this->saveEmbeddedForms($con, $form->getEmbeddedForms());
		  } 
		}
	}
}
