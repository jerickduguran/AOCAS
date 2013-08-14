<?php

/**
 * JournalBook filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseJournalBookFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'                => new sfWidgetFormFilterInput(),
      'sanumber_label'             => new sfWidgetFormFilterInput(),
      'label'                      => new sfWidgetFormFilterInput(),
      'person_label'               => new sfWidgetFormFilterInput(),
      'date_enabled'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'ref_doc'                    => new sfWidgetFormFilterInput(),
      'date'                       => new sfWidgetFormFilterInput(),
      'configurations'             => new sfWidgetFormFilterInput(),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'particular_template_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ParticularTemplate')),
      'journal_book_template_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'JournalBookTemplate')),
    ));

    $this->setValidators(array(
      'code'                       => new sfValidatorPass(array('required' => false)),
      'name'                       => new sfValidatorPass(array('required' => false)),
      'description'                => new sfValidatorPass(array('required' => false)),
      'sanumber_label'             => new sfValidatorPass(array('required' => false)),
      'label'                      => new sfValidatorPass(array('required' => false)),
      'person_label'               => new sfValidatorPass(array('required' => false)),
      'date_enabled'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'ref_doc'                    => new sfValidatorPass(array('required' => false)),
      'date'                       => new sfValidatorPass(array('required' => false)),
      'configurations'             => new sfValidatorPass(array('required' => false)),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'particular_template_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ParticularTemplate', 'required' => false)),
      'journal_book_template_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'JournalBookTemplate', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('journal_book_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addParticularTemplateListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.JournalBookParticularTemplate JournalBookParticularTemplate')
      ->andWhereIn('JournalBookParticularTemplate.particular_template_id', $values)
    ;
  }

  public function addJournalBookTemplateListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.JournalBookBookTemplate JournalBookBookTemplate')
      ->andWhereIn('JournalBookBookTemplate.journal_book_template_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'JournalBook';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'code'                       => 'Text',
      'name'                       => 'Text',
      'description'                => 'Text',
      'sanumber_label'             => 'Text',
      'label'                      => 'Text',
      'person_label'               => 'Text',
      'date_enabled'               => 'Boolean',
      'ref_doc'                    => 'Text',
      'date'                       => 'Text',
      'configurations'             => 'Text',
      'created_at'                 => 'Date',
      'updated_at'                 => 'Date',
      'particular_template_list'   => 'ManyKey',
      'journal_book_template_list' => 'ManyKey',
    );
  }
}
