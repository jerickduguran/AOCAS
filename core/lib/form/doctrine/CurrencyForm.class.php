<?php

/**
 * Currency form.
 *
 * @package    Zafire Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CurrencyForm extends BaseCurrencyForm
{
  public function configure()
  { 
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'symbol'        => new sfWidgetFormInputText(),
      'title'         => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormInputText(),
      'is_base'       => new sfWidgetFormInputCheckbox(),
      'unit_per_base' => new sfWidgetFormInputText(),
      'date'          => new sfWidgetFormDate(),
      'notes'         => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'symbol'        => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'is_base'       => new sfValidatorBoolean(array('required' => false)),
      'unit_per_base' => new sfValidatorNumber(array('required' => false)),
      'date'          => new sfValidatorDate(array('required' => false)),
      'notes'         => new sfValidatorString(array('max_length' => 100, 'required' => false))
    ));
	

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Currency', 'column' => array('symbol')))
    );

    $this->widgetSchema->setNameFormat('currency[%s]');
  }
}
