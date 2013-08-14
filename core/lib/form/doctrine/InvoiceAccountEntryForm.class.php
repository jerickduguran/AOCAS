<?php

/**
 * InvoiceAccountEntry form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InvoiceAccountEntryForm extends BaseInvoiceAccountEntryForm
{
  public function configure()
  {
	 $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      //'invoice_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Invoice'), 'add_empty' => false)),
      'chart_of_account_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'project_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => true)),
      'department_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'general_library_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'dn_reference'        => new sfWidgetFormInputText(),
      'debit'               => new sfWidgetFormInputText(),
      'credit'              => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
    //  'invoice_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Invoice'))),
      'chart_of_account_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'project_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'required' => false)),
      'general_library_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'department_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'required' => false)),
      'dn_reference'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'debit'               => new sfValidatorNumber(array('required' => false)),
      'credit'              => new sfValidatorNumber(array('required' => false))
    ));

    $this->widgetSchema->setNameFormat('invoice_account_entry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
