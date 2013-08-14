<?php

/**
 * JournalBookBookTemplate filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseJournalBookBookTemplateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'journal_book_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('JournalBook'), 'add_empty' => true)),
      'journal_book_template_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('JournalBookTemplate'), 'add_empty' => true)),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'journal_book_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('JournalBook'), 'column' => 'id')),
      'journal_book_template_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('JournalBookTemplate'), 'column' => 'id')),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('journal_book_book_template_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JournalBookBookTemplate';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'journal_book_id'          => 'ForeignKey',
      'journal_book_template_id' => 'ForeignKey',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
    );
  }
}
