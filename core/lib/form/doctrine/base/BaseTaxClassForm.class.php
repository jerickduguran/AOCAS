<?php

/**
 * TaxClass form base class.
 *
 * @method TaxClass getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTaxClassForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'code'             => new sfWidgetFormInputText(),
      'title'            => new sfWidgetFormInputText(),
      'description'      => new sfWidgetFormTextarea(),
      'tax_rate_percent' => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'             => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'title'            => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'description'      => new sfValidatorString(array('required' => false)),
      'tax_rate_percent' => new sfValidatorNumber(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TaxClass', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('tax_class[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaxClass';
  }

}
