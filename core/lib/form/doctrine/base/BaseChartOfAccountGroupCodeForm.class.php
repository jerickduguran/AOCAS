<?php

/**
 * ChartOfAccountGroupCode form base class.
 *
 * @method ChartOfAccountGroupCode getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseChartOfAccountGroupCodeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'chart_of_account_id' => new sfWidgetFormInputHidden(),
      'group_code_id'       => new sfWidgetFormInputHidden(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'chart_of_account_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('chart_of_account_id')), 'empty_value' => $this->getObject()->get('chart_of_account_id'), 'required' => false)),
      'group_code_id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('group_code_id')), 'empty_value' => $this->getObject()->get('group_code_id'), 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('chart_of_account_group_code[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ChartOfAccountGroupCode';
  }

}
