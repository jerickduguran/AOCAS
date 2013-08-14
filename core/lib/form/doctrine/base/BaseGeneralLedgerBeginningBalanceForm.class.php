<?php

/**
 * GeneralLedgerBeginningBalance form base class.
 *
 * @method GeneralLedgerBeginningBalance getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGeneralLedgerBeginningBalanceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'chart_of_account_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'project_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => true)),
      'department_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'debit'               => new sfWidgetFormInputText(),
      'credit'              => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'chart_of_account_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'project_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'required' => false)),
      'department_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'required' => false)),
      'debit'               => new sfValidatorNumber(array('required' => false)),
      'credit'              => new sfValidatorNumber(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('general_ledger_beginning_balance[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GeneralLedgerBeginningBalance';
  }

}
