<?php

/**
 * JournalBookTemplateEntry form base class.
 *
 * @method JournalBookTemplateEntry getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseJournalBookTemplateEntryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'journal_book_template_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('JournalBookTemplate'), 'add_empty' => false)),
      'chart_of_account_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'general_library_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'debit'                    => new sfWidgetFormInputText(),
      'credit'                   => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'journal_book_template_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('JournalBookTemplate'))),
      'chart_of_account_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'general_library_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'debit'                    => new sfValidatorNumber(array('required' => false)),
      'credit'                   => new sfValidatorNumber(array('required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('journal_book_template_entry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JournalBookTemplateEntry';
  }

}
