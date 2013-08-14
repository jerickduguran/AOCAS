<?php

/**
 * Bank form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BankForm extends BaseBankForm
{
  public function configure()
  { 
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'code'        => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'logo'        => new sfWidgetFormInputText(),
      'status'      => new sfWidgetFormInputCheckbox()
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'description' => new sfValidatorString(array('required' => false)),
      'logo'        => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'status'      => new sfValidatorBoolean(array('required' => false))
    ));

    $this->widgetSchema->setNameFormat('bank[%s]');
  }
}
