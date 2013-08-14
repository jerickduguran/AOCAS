<?php

/**
 * ChartOfAccountType filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseChartOfAccountTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'           => new sfWidgetFormFilterInput(),
      'description'     => new sfWidgetFormFilterInput(),
      'status'          => new sfWidgetFormChoice(array('choices' => array('' => '', 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'))),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'validation_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Validation')),
    ));

    $this->setValidators(array(
      'code'            => new sfValidatorPass(array('required' => false)),
      'title'           => new sfValidatorPass(array('required' => false)),
      'description'     => new sfValidatorPass(array('required' => false)),
      'status'          => new sfValidatorChoice(array('required' => false, 'choices' => array('ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'validation_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Validation', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('chart_of_account_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
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
      ->leftJoin($query->getRootAlias().'.ChartOfAccountTypeValidation ChartOfAccountTypeValidation')
      ->andWhereIn('ChartOfAccountTypeValidation.validation_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'ChartOfAccountType';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'code'            => 'Text',
      'title'           => 'Text',
      'description'     => 'Text',
      'status'          => 'Enum',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'validation_list' => 'ManyKey',
    );
  }
}
