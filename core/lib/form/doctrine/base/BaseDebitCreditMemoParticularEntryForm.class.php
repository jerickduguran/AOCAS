<?php

/**
 * DebitCreditMemoParticularEntry form base class.
 *
 * @method DebitCreditMemoParticularEntry getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDebitCreditMemoParticularEntryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'debit_credit_memo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DebitCreditMemo'), 'add_empty' => false)),
      'title'                    => new sfWidgetFormInputText(),
      'amount'                   => new sfWidgetFormInputText(),
      'vat_application'          => new sfWidgetFormChoice(array('choices' => array('VAT_EXEMPT' => 'VAT_EXEMPT', 'VAT_ZERO_PERCENT' => 'VAT_ZERO_PERCENT', 'VAT_INCLUSIVE' => 'VAT_INCLUSIVE', 'VAT_EXCLUSIVE' => 'VAT_EXCLUSIVE'))),
      'tax_expanded_withheld_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxExpandedWithheld'), 'add_empty' => true)),
      'tax_final_withheld_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxFinalWithheld'), 'add_empty' => true)),
      'total'                    => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'debit_credit_memo_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('DebitCreditMemo'))),
      'title'                    => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'amount'                   => new sfValidatorNumber(array('required' => false)),
      'vat_application'          => new sfValidatorChoice(array('choices' => array(0 => 'VAT_EXEMPT', 1 => 'VAT_ZERO_PERCENT', 2 => 'VAT_INCLUSIVE', 3 => 'VAT_EXCLUSIVE'), 'required' => false)),
      'tax_expanded_withheld_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TaxExpandedWithheld'), 'required' => false)),
      'tax_final_withheld_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TaxFinalWithheld'), 'required' => false)),
      'total'                    => new sfValidatorNumber(array('required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('debit_credit_memo_particular_entry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DebitCreditMemoParticularEntry';
  }

}
