<?php

/**
 * TaxClass form.
 *
 * @package    Zafire Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TaxClassForm extends BaseTaxClassForm
{
  public function configure()
  {
	$this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'code'             => new sfWidgetFormInputText(),
      'title'            => new sfWidgetFormInputText(),
      'description'      => new sfWidgetFormTextarea(),
      'tax_rate_percent' => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'             => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'title'            => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'description'      => new sfValidatorString(array('required' => false)),
      'tax_rate_percent' => new sfValidatorNumber(array('required' => false))
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TaxClass', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('tax_class[%s]');
  }
}
