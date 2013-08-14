<?php

/**
 * GroupCode form base class.
 *
 * @method GroupCode getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGroupCodeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'code'                  => new sfWidgetFormInputText(),
      'title'                 => new sfWidgetFormInputText(),
      'description'           => new sfWidgetFormTextarea(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'chart_of_account_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ChartOfAccount')),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'                  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'title'                 => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'description'           => new sfValidatorString(array('required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
      'chart_of_account_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ChartOfAccount', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'GroupCode', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('group_code[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GroupCode';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['chart_of_account_list']))
    {
      $this->setDefault('chart_of_account_list', $this->object->ChartOfAccount->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveChartOfAccountList($con);

    parent::doSave($con);
  }

  public function saveChartOfAccountList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['chart_of_account_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->ChartOfAccount->getPrimaryKeys();
    $values = $this->getValue('chart_of_account_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ChartOfAccount', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ChartOfAccount', array_values($link));
    }
  }

}
