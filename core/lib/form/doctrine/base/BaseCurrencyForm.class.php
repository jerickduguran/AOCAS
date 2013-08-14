<?php

/**
 * Currency form base class.
 *
 * @method Currency getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCurrencyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'symbol'        => new sfWidgetFormInputText(),
      'title'         => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormInputText(),
      'is_base'       => new sfWidgetFormInputCheckbox(),
      'unit_per_base' => new sfWidgetFormInputText(),
      'date'          => new sfWidgetFormDate(),
      'notes'         => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'symbol'        => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'is_base'       => new sfValidatorBoolean(array('required' => false)),
      'unit_per_base' => new sfValidatorNumber(array('required' => false)),
      'date'          => new sfValidatorDate(array('required' => false)),
      'notes'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Currency', 'column' => array('symbol')))
    );

    $this->widgetSchema->setNameFormat('currency[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Currency';
  }

}
