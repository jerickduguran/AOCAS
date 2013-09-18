<?php

/**
 * Receipt form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReceiptForm extends BaseReceiptForm
{
  public function configure()
  {
	 $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'book_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => false)),
      'status'                => new sfWidgetFormChoice(array('choices' => array('UNPAID' => 'UNPAID', 'PARTIAL_PAID' => 'PARTIAL_PAID', 'FULL PAID' => 'FULL PAID'))),
      'receipt_number'        => new sfWidgetFormInputText(),
      'general_library_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'currency_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'add_empty' => true)),
      'purchase_order_number' => new sfWidgetFormInputText(),
      'date_receive'          => new sfWidgetFormInputText(),
      'period'                => new sfWidgetFormInputText(),
      'due_date'              => new sfWidgetFormInputText(),
      'header_message'        => new sfWidgetFormTextarea(),
      'footer_message'        => new sfWidgetFormTextarea(),
      'total_amount'          => new sfWidgetFormInputText(),
      'mode_payment'          => new sfWidgetFormChoice(array('choices' => array('CASH' => 'CASH', 'CHECK' => 'CHECK')))
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'book_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'required' => false)),
      'status'                => new sfValidatorChoice(array('choices' => array(0 => 'UNPAID', 1 => 'PARTIAL_PAID', 2 => 'FULL PAID'), 'required' => false)),
      'receipt_number'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'general_library_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'currency_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'required' => false)),
      'purchase_order_number' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'date_receive'          => new sfValidatorDate(array('required' => false)),
      'period'                => new sfValidatorDate(array('required' => false)),
      'due_date'              => new sfValidatorDate(array('required' => false)),
      'header_message'        => new sfValidatorString(array('required' => false)),
      'footer_message'        => new sfValidatorString(array('required' => false)),
      'total_amount'          => new sfValidatorNumber(array('required' => false)),
      'mode_payment'          => new sfValidatorChoice(array('choices' => array(0 => 'CASH', 1 => 'CHECK'), 'required' => false)),
  
    ));
	$this->setWidget("particular_template", new sfWidgetFormSelect(array('choices' => Doctrine_Core::getTable('ParticularTemplate')->getAllAsChoices())));
	$this->setValidator("particular_template",new sfValidatorString(array('required' => false)));
	
	$this->setWidget("book_template", new sfWidgetFormSelect(array('choices' => Doctrine_Core::getTable('JournalBookTemplate')->getAllAsChoices())));
	$this->setValidator("book_template",new sfValidatorString(array('required' => false)));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Receipt', 'column' => array('receipt_number')))
    );

	$this->validatorSchema->setOption('allow_extra_fields', true);
    $this->widgetSchema->setNameFormat('receipt[%s]');
	  
	$this->embedRelation("ReceiptParticularEntry");
	$this->embedRelation("ReceiptAccountEntry");  
  }
   public function addNewParticularEntry($number = 1)
   {
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new ReceiptParticularEntry();
		$entry->setReceipt($this->getObject());
		$entry_form  = new ReceiptParticularEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('particular_entries', $new_entry);
   }
   
   public function addNewAccountEntry($number = 1)
   {
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new ReceiptAccountEntry();
		$entry->setReceipt($this->getObject());
		$entry_form  = new ReceiptAccountEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('account_entries', $new_entry);
   }
   
   public function addNewCashEntry($number = 1)
   {
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new ReceiptCashEntry();
		$entry->setReceipt($this->getObject());
		$entry_form  = new ReceiptCashEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('cash_entries', $new_entry);
   }
   
   public function addNewCheckEntry($number = 1)
   {
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new ReceiptAccountEntry();
		$entry->setReceipt($this->getObject());
		$entry_form  = new ReceiptAccountEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('check_entries', $new_entry);
   }
   
   public function bind(array $taintedValues = null, array $taintedFiles = null)
   {  
	//Particular Entries
	if(isset($taintedValues['particular_entries'])){
		$new_particular_entries = new BaseForm();
		foreach($taintedValues['particular_entries'] as $key => $new_particular_entry){
		  $particular_entry = new ReceiptParticularEntry();
		  $particular_entry->setReceipt($this->getObject());
		  $particular_entry_form = new ReceiptParticularEntryForm($particular_entry);

		  $new_particular_entries->embedForm($key,$particular_entry_form);
		}  
		$this->embedForm('particular_entries',$new_particular_entries); 
	}
	 
	//Account Entries
	if(isset($taintedValues['account_entries'])){
		$new_account_entries = new BaseForm();
		foreach($taintedValues['account_entries'] as $key => $new_account_entry){
		  $account_entry = new ReceiptAccountEntry();
		  $account_entry->setReceipt($this->getObject());
		  $account_entry_form = new ReceiptAccountEntryForm($account_entry);

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
			$field_name  = 'receipt_id';
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
		   $photos = $this->getValue('newPhotos');
			$forms = $this->embeddedForms;
			foreach ($this->embeddedForms['newPhotos'] as $name => $form)
			{
			  if (!isset($photos[$name]))
			  {
				unset($forms['newPhotos'][$name]);
			  }
			}
	   
		}
	}
}
