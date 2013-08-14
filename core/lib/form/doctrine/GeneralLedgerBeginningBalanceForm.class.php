<?php

/**
 * GeneralLedgerBeginningBalance form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GeneralLedgerBeginningBalanceForm extends BaseGeneralLedgerBeginningBalanceForm
{
  public function configure()
  {
   $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'chart_of_account_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'project_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => true)),
      'department_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'debit'               => new sfWidgetFormInputText(),
      'credit'              => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'chart_of_account_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'project_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'required' => false)),
      'department_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'required' => false)),
      'debit'               => new sfValidatorNumber(array('required' => false)),
      'credit'              => new sfValidatorNumber(array('required' => false))
    ));


    $this->widgetSchema->setNameFormat('general_ledger_beginning_balance[%s]');
	
	$this->setWidget("entry_type", new sfWidgetFormSelect(array("choices" => array(""=>"","DEBIT"=>"DEBIT","CREDIT"=>"CREDIT"),'default'=> $this->isNew() ? '' : $this->getObject()->getChartOfAccount()->getEntryType())));
	$this->setWidget("entry_value", new sfWidgetFormInputText(array('default'=> $this->isNew() ? '' : $this->getObject()->getValueByEntryType())));
	$this->validatorSchema['entry_type'] = new sfValidatorChoice(array('choices' => array_keys(array("DEBIT"=>"DEBIT","CREDIT"=>"CREDIT"))),array("required"=>true));
	$this->validatorSchema['entry_value'] = new sfValidatorString(array("required"=>false));
  }
  
  public function configureSetup()
  {
	unset($this['entry_type']);
	unset($this['entry_value']);
	//$this->setWidget("entry_type", new sfWidgetFormInputHidden());
	//$this->setWidget("entry_value", new sfWidgetFormInputHidden());
	//$this->validatorSchema['entry_type'] = new sfValidatorString(array("required"=>false));
	//$this->validatorSchema['entry_value'] = new sfValidatorString(array("required"=>false));
  }
}
