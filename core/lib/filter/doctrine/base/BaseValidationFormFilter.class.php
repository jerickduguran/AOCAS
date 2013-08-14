<?php

/**
 * Validation filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseValidationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'                => new sfWidgetFormFilterInput(),
      'status'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'chart_of_account_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ChartOfAccount')),
      'chart_of_account_type_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ChartOfAccountType')),
    ));

    $this->setValidators(array(
      'code'                       => new sfValidatorPass(array('required' => false)),
      'name'                       => new sfValidatorPass(array('required' => false)),
      'description'                => new sfValidatorPass(array('required' => false)),
      'status'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'chart_of_account_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ChartOfAccount', 'required' => false)),
      'chart_of_account_type_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ChartOfAccountType', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('validation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addChartOfAccountListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('ChartOfAccountValidation.chart_of_account_id', $values)
    ;
  }

  public function addChartOfAccountTypeListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.ChartOfAccountTypeValidation ChartOfAccountTypeValidation')
      ->andWhereIn('ChartOfAccountTypeValidation.chart_of_account_type_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Validation';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'code'                       => 'Text',
      'name'                       => 'Text',
      'description'                => 'Text',
      'status'                     => 'Boolean',
      'created_at'                 => 'Date',
      'updated_at'                 => 'Date',
      'chart_of_account_list'      => 'ManyKey',
      'chart_of_account_type_list' => 'ManyKey',
    );
  }
}
