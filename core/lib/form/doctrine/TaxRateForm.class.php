<?php

/**
 * TaxRate form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TaxRateForm extends BaseTaxRateForm
{
  public function configure()
  { 
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'rate'             => new sfWidgetFormInputText(),
      'effectivity_date' => new sfWidgetFormInputText(),
      'type'             => new sfWidgetFormChoice(array('choices' => array('INPUT' => 'INPUT', 'OUTPUT' => 'OUTPUT')))
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'rate'             => new sfValidatorNumber(array('required' => false)),
      'effectivity_date' => new sfValidatorDate(array('required' => false)),
      'type'             => new sfValidatorChoice(array('choices' => array(0 => 'INPUT', 1 => 'OUTPUT'), 'required' => false))
    ));

    $this->widgetSchema->setNameFormat('tax_rate[%s]');

  }
}
