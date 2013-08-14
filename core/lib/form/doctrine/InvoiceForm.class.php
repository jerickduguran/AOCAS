<?php

/**
 * Invoice form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InvoiceForm extends BaseInvoiceForm
{
  public function configure()
  {
	
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'book_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => false)),
      'status'                => new sfWidgetFormChoice(array('choices' => array('UNPAID' => 'UNPAID', 'PAID' => 'PAID', 'DUE' => 'DUE', 'OVERDUE' => 'OVERDUE'))),
      'invoice_number'        => new sfWidgetFormInputText(),
      'general_library_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'currency_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'add_empty' => true)),
      'purchase_order_number' => new sfWidgetFormInputText(),
      'date_receive'          => new sfWidgetFormInputText(),
      'period'                => new sfWidgetFormInputText(),
      'terms_of_payment_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TermsOfPayment'), 'add_empty' => true)),
      'due_date'              => new sfWidgetFormInputText(),
      'header_message'        => new sfWidgetFormTextarea(),
      'footer_message'        => new sfWidgetFormTextarea(),
      'total_amount'          => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'book_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'required' => false)),
      'status'                => new sfValidatorChoice(array('choices' => array(0 => 'UNPAID', 1 => 'PAID', 2 => 'DUE', 3 => 'OVERDUE'), 'required' => false)),
      'invoice_number'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'general_library_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'currency_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'required' => false)),
      'purchase_order_number' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'date_receive'          => new sfValidatorDate(array('required' => false)),
      'period'                => new sfValidatorDate(array('required' => false)),
      'terms_of_payment_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TermsOfPayment'), 'required' => false)),
      'due_date'              => new sfValidatorDate(array('required' => false)),
      'header_message'        => new sfValidatorString(array('required' => false)),
      'footer_message'        => new sfValidatorString(array('required' => false)),
      'total_amount'          => new sfValidatorNumber(array('required' => false))
    ));
	 
	
	$this->setWidget("particular_template", new sfWidgetFormSelect(array('choices' => Doctrine_Core::getTable('ParticularTemplate')->getAllAsChoices())));
	$this->setValidator("particular_template",new sfValidatorString(array('required' => false)));
	
	$this->setWidget("book_template", new sfWidgetFormSelect(array('choices' => Doctrine_Core::getTable('JournalBookTemplate')->getAllAsChoices())));
	$this->setValidator("book_template",new sfValidatorString(array('required' => false)));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Invoice', 'column' => array('invoice_number')))
    );

	$this->validatorSchema->setOption('allow_extra_fields', true);
    $this->widgetSchema->setNameFormat('invoice[%s]');
	
	//$this->addNewParticularEntry();
	//$this->addNewAccountEntry(); 
	
	$this->embedRelation("InvoiceParticularEntry");
	$this->embedRelation("InvoiceAccountEntry");
	
  } 
   public function addNewParticularEntry($number = 1)
   {
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new InvoiceParticularEntry();
		$entry->setInvoice($this->getObject());
		$entry_form  = new InvoiceParticularEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('particular_entries', $new_entry);
   }
   
   public function addNewAccountEntry($number = 1)
   {
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new InvoiceAccountEntry();
		$entry->setInvoice($this->getObject());
		$entry_form  = new InvoiceAccountEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('account_entries', $new_entry);
   }
   
   public function bind(array $taintedValues = null, array $taintedFiles = null)
   {  
	//Particular Entries
	if(isset($taintedValues['particular_entries'])){
		$new_particular_entries = new BaseForm();
		foreach($taintedValues['particular_entries'] as $key => $new_particular_entry){
		  $particular_entry = new InvoiceParticularEntry();
		  $particular_entry->setInvoice($this->getObject());
		  $particular_entry_form = new InvoiceParticularEntryForm($particular_entry);

		  $new_particular_entries->embedForm($key,$particular_entry_form);
		}  
		$this->embedForm('particular_entries',$new_particular_entries); 
	}
	 
	//Account Entries
	if(isset($taintedValues['account_entries'])){
		$new_account_entries = new BaseForm();
		foreach($taintedValues['account_entries'] as $key => $new_account_entry){
		  $account_entry = new InvoiceAccountEntry();
		  $account_entry->setInvoice($this->getObject());
		  $account_entry_form = new InvoiceAccountEntryForm($account_entry);

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
			$field_name  = 'invoice_id';
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
