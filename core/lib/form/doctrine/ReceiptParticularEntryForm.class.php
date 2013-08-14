<?php

/**
 * ReceiptParticularEntry form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReceiptParticularEntryForm extends BaseReceiptParticularEntryForm
{
  public function configure()
  {
	 $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
     // 'receipt_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Receipt'), 'add_empty' => false)),
      'title'                    => new sfWidgetFormInputText(),
      'amount'                   => new sfWidgetFormInputText(),
      'vat_application'          => new sfWidgetFormChoice(array('choices' => array('VAT_EXEMPT' => 'VAT_EXEMPT', 'VAT_ZERO_PERCENT' => 'VAT_ZERO_PERCENT', 'VAT_INCLUSIVE' => 'VAT_INCLUSIVE', 'VAT_EXCLUSIVE' => 'VAT_EXCLUSIVE'))),
      'tax_expanded_withheld_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxExpandedWithheld'), 'add_empty' => true)),
      'tax_final_withheld_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxFinalWithheld'), 'add_empty' => true)),
      'total'                    => new sfWidgetFormInputText(), 
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      //'receipt_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Receipt'))),
      'title'                    => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'amount'                   => new sfValidatorNumber(array('required' => false)),
      'vat_application'          => new sfValidatorChoice(array('choices' => array(0 => 'VAT_EXEMPT', 1 => 'VAT_ZERO_PERCENT', 2 => 'VAT_INCLUSIVE', 3 => 'VAT_EXCLUSIVE'), 'required' => false)),
      'tax_expanded_withheld_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TaxExpandedWithheld'), 'required' => false)),
      'tax_final_withheld_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TaxFinalWithheld'), 'required' => false)),
      'total'                    => new sfValidatorNumber(array('required' => false)), 
    ));

    $this->widgetSchema->setNameFormat('receipt_particular_entry[%s]');
  }
}
