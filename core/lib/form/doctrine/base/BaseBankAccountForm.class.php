<?php

/**
 * BankAccount form base class.
 *
 * @method BankAccount getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBankAccountForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'code'           => new sfWidgetFormInputText(),
      'bank_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bank'), 'add_empty' => true)),
      'account_name'   => new sfWidgetFormInputText(),
      'account_number' => new sfWidgetFormInputText(),
      'currency_id'    => new sfWidgetFormInputText(),
      'status'         => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'           => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'bank_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bank'), 'required' => false)),
      'account_name'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'account_number' => new sfValidatorString(array('max_length' => 60)),
      'currency_id'    => new sfValidatorPass(array('required' => false)),
      'status'         => new sfValidatorBoolean(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('bank_account[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BankAccount';
  }

}
