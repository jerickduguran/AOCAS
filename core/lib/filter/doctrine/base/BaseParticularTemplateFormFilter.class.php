<?php

/**
 * ParticularTemplate filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseParticularTemplateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'              => new sfWidgetFormFilterInput(),
      'particulars'       => new sfWidgetFormFilterInput(),
      'header_message'    => new sfWidgetFormFilterInput(),
      'footer_message'    => new sfWidgetFormFilterInput(),
      'project_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => true)),
      'department_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'journal_book_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'JournalBook')),
    ));

    $this->setValidators(array(
      'code'              => new sfValidatorPass(array('required' => false)),
      'name'              => new sfValidatorPass(array('required' => false)),
      'particulars'       => new sfValidatorPass(array('required' => false)),
      'header_message'    => new sfValidatorPass(array('required' => false)),
      'footer_message'    => new sfValidatorPass(array('required' => false)),
      'project_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Project'), 'column' => 'id')),
      'department_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Department'), 'column' => 'id')),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'journal_book_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'JournalBook', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('particular_template_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addJournalBookListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('JournalBookParticularTemplate.journal_book_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'ParticularTemplate';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'code'              => 'Text',
      'name'              => 'Text',
      'particulars'       => 'Text',
      'header_message'    => 'Text',
      'footer_message'    => 'Text',
      'project_id'        => 'ForeignKey',
      'department_id'     => 'ForeignKey',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'journal_book_list' => 'ManyKey',
    );
  }
}
