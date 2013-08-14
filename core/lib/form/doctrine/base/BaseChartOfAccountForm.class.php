<?php

/**
 * ChartOfAccount form base class.
 *
 * @method ChartOfAccount getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseChartOfAccountForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'chart_of_account_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccountType'), 'add_empty' => true)),
      'code'                     => new sfWidgetFormInputText(),
      'title'                    => new sfWidgetFormInputText(),
      'description'              => new sfWidgetFormTextarea(),
      'status'                   => new sfWidgetFormChoice(array('choices' => array('ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'))),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'group_code_list'          => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'GroupCode')),
      'validation_list'          => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Validation')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'chart_of_account_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccountType'), 'required' => false)),
      'code'                     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'title'                    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'description'              => new sfValidatorString(array('required' => false)),
      'status'                   => new sfValidatorChoice(array('choices' => array(0 => 'ACTIVE', 1 => 'INACTIVE'), 'required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
      'group_code_list'          => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'GroupCode', 'required' => false)),
      'validation_list'          => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Validation', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ChartOfAccount', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('chart_of_account[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ChartOfAccount';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['group_code_list']))
    {
      $this->setDefault('group_code_list', $this->object->GroupCode->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['validation_list']))
    {
      $this->setDefault('validation_list', $this->object->Validation->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveGroupCodeList($con);
    $this->saveValidationList($con);

    parent::doSave($con);
  }

  public function saveGroupCodeList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['group_code_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->GroupCode->getPrimaryKeys();
    $values = $this->getValue('group_code_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('GroupCode', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('GroupCode', array_values($link));
    }
  }

  public function saveValidationList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['validation_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Validation->getPrimaryKeys();
    $values = $this->getValue('validation_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Validation', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Validation', array_values($link));
    }
  }

}
