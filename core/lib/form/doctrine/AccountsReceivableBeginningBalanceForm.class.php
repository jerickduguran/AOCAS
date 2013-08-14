<?php

/**
 * AccountsReceivableBeginningBalance form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AccountsReceivableBeginningBalanceForm extends BaseAccountsReceivableBeginningBalanceForm
{
  public function configure()
  {
	 $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'currency_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'add_empty' => true)),
      'general_library_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'project_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => true)),
      'department_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'start_date'         => new sfWidgetFormInputText(),
      'receive_date'       => new sfWidgetFormInputText(),
      'bill_number'        => new sfWidgetFormInputText(),
      'amount'             => new sfWidgetFormInputText(),
      'particulars'        => new sfWidgetFormTextarea()
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'currency_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'required' => false)),
      'general_library_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'project_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'required' => false)),
      'department_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'required' => false)),
      'start_date'         => new sfValidatorString(array('required' => false)),
      'receive_date'       => new sfValidatorString(array('required' => false)),
      'bill_number'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'amount'             => new sfValidatorNumber(array('required' => false)),
      'particulars'        => new sfValidatorString(array('required' => false))
    ));

    $this->widgetSchema->setNameFormat('accounts_receivable_beginning_balance[%s]');

  }
}
