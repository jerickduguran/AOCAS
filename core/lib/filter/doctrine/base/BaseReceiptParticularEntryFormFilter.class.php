<?php

/**
 * ReceiptParticularEntry filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseReceiptParticularEntryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'receipt_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Receipt'), 'add_empty' => true)),
      'title'                    => new sfWidgetFormFilterInput(),
      'amount'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vat_application'          => new sfWidgetFormChoice(array('choices' => array('' => '', 'VAT_EXEMPT' => 'VAT_EXEMPT', 'VAT_ZERO_PERCENT' => 'VAT_ZERO_PERCENT', 'VAT_INCLUSIVE' => 'VAT_INCLUSIVE', 'VAT_EXCLUSIVE' => 'VAT_EXCLUSIVE'))),
      'tax_expanded_withheld_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxExpandedWithheld'), 'add_empty' => true)),
      'tax_final_withheld_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxFinalWithheld'), 'add_empty' => true)),
      'total'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'receipt_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Receipt'), 'column' => 'id')),
      'title'                    => new sfValidatorPass(array('required' => false)),
      'amount'                   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'vat_application'          => new sfValidatorChoice(array('required' => false, 'choices' => array('VAT_EXEMPT' => 'VAT_EXEMPT', 'VAT_ZERO_PERCENT' => 'VAT_ZERO_PERCENT', 'VAT_INCLUSIVE' => 'VAT_INCLUSIVE', 'VAT_EXCLUSIVE' => 'VAT_EXCLUSIVE'))),
      'tax_expanded_withheld_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TaxExpandedWithheld'), 'column' => 'id')),
      'tax_final_withheld_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TaxFinalWithheld'), 'column' => 'id')),
      'total'                    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('receipt_particular_entry_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReceiptParticularEntry';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'receipt_id'               => 'ForeignKey',
      'title'                    => 'Text',
      'amount'                   => 'Number',
      'vat_application'          => 'Enum',
      'tax_expanded_withheld_id' => 'ForeignKey',
      'tax_final_withheld_id'    => 'ForeignKey',
      'total'                    => 'Number',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
    );
  }
}
