<?php

/**
 * Receipt form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReceiptCheckEntryListForm extends BaseReceiptForm
{
  public function configure()
  { 	 
	 $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
    ));
	
	$this->validatorSchema->setOption('allow_extra_fields', true);
    $this->widgetSchema->setNameFormat('receiptcheckentry[%s]');
	 
	$this->embedRelation("ReceiptCheckEntry");  
  }
    
   
   public function addNewCheckEntry($number = 1)
   {
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new ReceiptCheckEntry();
		$entry->setReceipt($this->getObject());
		$entry_form  = new ReceiptCheckEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('check_entries', $new_entry);
   }
   
   public function bind(array $taintedValues = null, array $taintedFiles = null)
   {  
	//Particular Entries
	if(isset($taintedValues['check_entries'])){
		$new_particular_entries = new BaseForm();
		foreach($taintedValues['check_entries'] as $key => $new_particular_entry){
		  $particular_entry = new ReceiptCheckEntry();
		  $particular_entry->setReceipt($this->getObject());
		  $particular_entry_form = new ReceiptCheckEntryForm($particular_entry);

		  $new_particular_entries->embedForm($key,$particular_entry_form);
		}  
		$this->embedForm('check_entries',$new_particular_entries);  
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
	   
		}
	}
}
