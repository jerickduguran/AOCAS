<?php

/**
 * TaxFinalWithheld form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TaxFinalWithheldForm extends BaseTaxFinalWithheldForm
{
  public function configure()
  {
	
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'code'                  => new sfWidgetFormInputText(),
      'nature_income_payment' => new sfWidgetFormTextarea(),
      'tax_rate_percent'      => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'                  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'nature_income_payment' => new sfValidatorString(array('required' => false)),
      'tax_rate_percent'      => new sfValidatorNumber(array('required' => false))
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TaxFinalWithheld', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('tax_final_withheld[%s]');
  }
}
