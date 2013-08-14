<?php

/**
 * GroupCode filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGroupCodeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'           => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'chart_of_account_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ChartOfAccount')),
    ));

    $this->setValidators(array(
      'code'                  => new sfValidatorPass(array('required' => false)),
      'title'                 => new sfValidatorPass(array('required' => false)),
      'description'           => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'chart_of_account_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ChartOfAccount', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('group_code_filters[%s]');

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
      ->leftJoin($query->getRootAlias().'.ChartOfAccountGroupCode ChartOfAccountGroupCode')
      ->andWhereIn('ChartOfAccountGroupCode.chart_of_account_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'GroupCode';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'code'                  => 'Text',
      'title'                 => 'Text',
      'description'           => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'chart_of_account_list' => 'ManyKey',
    );
  }
}
