<?php

/**
 * PrepaymentAccount form base class.
 *
 * @method PrepaymentAccount getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePrepaymentAccountForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'chart_of_account_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'code'                => new sfWidgetFormInputText(),
      'title'               => new sfWidgetFormInputText(),
      'description'         => new sfWidgetFormTextarea(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'chart_of_account_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'code'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'title'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'description'         => new sfValidatorString(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'PrepaymentAccount', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('prepayment_account[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PrepaymentAccount';
  }

}
