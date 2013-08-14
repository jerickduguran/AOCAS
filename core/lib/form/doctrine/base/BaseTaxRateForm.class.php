<?php

/**
 * TaxRate form base class.
 *
 * @method TaxRate getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTaxRateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'rate'             => new sfWidgetFormInputText(),
      'effectivity_date' => new sfWidgetFormDate(),
      'type'             => new sfWidgetFormChoice(array('choices' => array('INPUT' => 'INPUT', 'OUTPUT' => 'OUTPUT'))),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'rate'             => new sfValidatorNumber(array('required' => false)),
      'effectivity_date' => new sfValidatorDate(array('required' => false)),
      'type'             => new sfValidatorChoice(array('choices' => array(0 => 'INPUT', 1 => 'OUTPUT'), 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('tax_rate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaxRate';
  }

}
