<?php

/**
 * ChartOfAccount filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseChartOfAccountFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'chart_of_account_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccountType'), 'add_empty' => true)),
      'code'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'                    => new sfWidgetFormFilterInput(),
      'description'              => new sfWidgetFormFilterInput(),
      'status'                   => new sfWidgetFormChoice(array('choices' => array('' => '', 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'))),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'group_code_list'          => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'GroupCode')),
      'validation_list'          => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Validation')),
    ));

    $this->setValidators(array(
      'chart_of_account_type_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ChartOfAccountType'), 'column' => 'id')),
      'code'                     => new sfValidatorPass(array('required' => false)),
      'title'                    => new sfValidatorPass(array('required' => false)),
      'description'              => new sfValidatorPass(array('required' => false)),
      'status'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'))),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'group_code_list'          => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'GroupCode', 'required' => false)),
      'validation_list'          => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Validation', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('chart_of_account_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addGroupCodeListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.ChartOfAccountGroupCode ChartOfAccountGroupCode')
      ->andWhereIn('ChartOfAccountGroupCode.group_code_id', $values)
    ;
  }

  public function addValidationListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.ChartOfAccountValidation ChartOfAccountValidation')
      ->andWhereIn('ChartOfAccountValidation.validation_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'ChartOfAccount';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'chart_of_account_type_id' => 'ForeignKey',
      'code'                     => 'Text',
      'title'                    => 'Text',
      'description'              => 'Text',
      'status'                   => 'Enum',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
      'group_code_list'          => 'ManyKey',
      'validation_list'          => 'ManyKey',
    );
  }
}
