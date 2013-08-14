<?php

/**
 * FinancialSetting form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FinancialSettingForm extends BaseFinancialSettingForm
{
  public function configure()
  {
	$this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'currency_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'add_empty' => true)),
      'financial_yearend_day'   => new sfWidgetFormInputText(),
      'financial_yearend_month' => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'currency_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'required' => false)),
      'financial_yearend_day'   => new sfValidatorString(array('required' => false)),
      'financial_yearend_month' => new sfValidatorString(array('required' => false))
    ));

    $this->widgetSchema->setNameFormat('financial_setting[%s]');
  }
  
  
}
