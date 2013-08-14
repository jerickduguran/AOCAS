<?php

/**
 * JournalBookTemplate form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class JournalBookTemplateForm extends BaseJournalBookTemplateForm
{
  public function configure()
  { 
   $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'code'                => new sfWidgetFormInputText(),
      'name'                => new sfWidgetFormInputText(), 
      'project_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => true)),
      'department_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'journal_book_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'JournalBook','expanded'=> true)),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'name'                => new sfValidatorString(array('max_length' => 50, 'required' => false)), 
      'project_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'required' => false)),
      'department_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'required' => false)),
      'journal_book_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'JournalBook', 'required' => false)),
    )); 

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'JournalBookTemplate', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('journal_book_template[%s]');

	$this->embedRelation("JournalBookTemplateEntry");
  }
   public function addNewAccountEntry($number = 1)
   {
		$new_entry = new BaseForm(); 
		
		//ADD one Entry (Can have more than once
		$entry = new JournalBookTemplateEntry();
		$entry->setJournalBookTemplate($this->getObject());
		$entry_form  = new JournalBookTemplateEntryForm($entry);
		$new_entry->embedForm($number,$entry_form); 
		
		$this->embedForm('journaltemplate_entries', $new_entry);
   }
   
   public function bind(array $taintedValues = null, array $taintedFiles = null)
   {
	//Particular Entries
	if(isset($taintedValues['journaltemplate_entries'])){
		$base_form = new BaseForm();
		foreach($taintedValues['journaltemplate_entries'] as $key => $new_entry){
		  $entry = new JournalBookTemplateEntry();
		  $entry->setJournalBookTemplate($this->getObject());
		  $entry_form = new JournalBookTemplateEntryForm($entry);

		  $base_form->embedForm($key,$entry_form);
		}
		$this->embedForm('journaltemplate_entries',$base_form);
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
			$field_name  = 'journal_book_template_id';
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
