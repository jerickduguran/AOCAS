<?php

/**
 * ParticularTemplate form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ParticularTemplateForm extends BaseParticularTemplateForm
{
  public function configure()
  {
	$this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'code'              => new sfWidgetFormInputText(),
      'name'              => new sfWidgetFormInputText(),
      'particulars'       => new sfWidgetFormTextarea(),
      'header_message'    => new sfWidgetFormTextarea(),
      'footer_message'    => new sfWidgetFormTextarea(),
      'project_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => true)),
      'department_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'journal_book_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'JournalBook','expanded'=>true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'particulars'       => new sfValidatorString(array('required' => false)),
      'header_message'    => new sfValidatorString(array('required' => false)),
      'footer_message'    => new sfValidatorString(array('required' => false)),
      'project_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'required' => false)),
      'department_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'required' => false)),
      'journal_book_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'JournalBook', 'required' => false)),
    )); 
	
    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ParticularTemplate', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('particular_template[%s]');
	
	$this->embedRelation("ParticularTemplateEntry");
  }
   public function addNewParticularTemplateEntry($number = 1)
   {
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new ParticularTemplateEntry();
		$entry->setParticularTemplate($this->getObject());
		$entry_form  = new ParticularTemplateEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('particular_entries', $new_entry);
   }
   
   public function bind(array $taintedValues = null, array $taintedFiles = null)
   {
	//Particular Entries
	if(isset($taintedValues['particular_entries'])){
		$new_particular_entries = new BaseForm();
		foreach($taintedValues['particular_entries'] as $key => $new_particular_entry){
		  $particular_entry = new ParticularTemplateEntry();
		  $particular_entry->setParticularTemplate($this->getObject());
		  $particular_entry_form = new ParticularTemplateEntryForm($particular_entry);

		  $new_particular_entries->embedForm($key,$particular_entry_form);
		}
		$this->embedForm('particular_entries',$new_particular_entries);
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
	   
		}
	}
}
