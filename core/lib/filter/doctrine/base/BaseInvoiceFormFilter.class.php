<?php

/**
 * Invoice filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseInvoiceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'book_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => true)),
      'invoice_number'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'general_library_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'currency_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'add_empty' => true)),
      'purchase_order_number' => new sfWidgetFormFilterInput(),
      'date_receive'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'period'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'due_date'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'header_message'        => new sfWidgetFormFilterInput(),
      'footer_message'        => new sfWidgetFormFilterInput(),
      'terms_of_payment_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TermsOfPayment'), 'add_empty' => true)),
      'total_amount'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'                => new sfWidgetFormChoice(array('choices' => array('' => '', 'UNPAID' => 'UNPAID', 'PAID' => 'PAID', 'DUE' => 'DUE', 'OVERDUE' => 'OVERDUE'))),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'book_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Book'), 'column' => 'id')),
      'invoice_number'        => new sfValidatorPass(array('required' => false)),
      'general_library_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GeneralLibrary'), 'column' => 'id')),
      'currency_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Currency'), 'column' => 'id')),
      'purchase_order_number' => new sfValidatorPass(array('required' => false)),
      'date_receive'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'period'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'due_date'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'header_message'        => new sfValidatorPass(array('required' => false)),
      'footer_message'        => new sfValidatorPass(array('required' => false)),
      'terms_of_payment_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TermsOfPayment'), 'column' => 'id')),
      'total_amount'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'status'                => new sfValidatorChoice(array('required' => false, 'choices' => array('UNPAID' => 'UNPAID', 'PAID' => 'PAID', 'DUE' => 'DUE', 'OVERDUE' => 'OVERDUE'))),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('invoice_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Invoice';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'book_id'               => 'ForeignKey',
      'invoice_number'        => 'Text',
      'general_library_id'    => 'ForeignKey',
      'currency_id'           => 'ForeignKey',
      'purchase_order_number' => 'Text',
      'date_receive'          => 'Date',
      'period'                => 'Date',
      'due_date'              => 'Date',
      'header_message'        => 'Text',
      'footer_message'        => 'Text',
      'terms_of_payment_id'   => 'ForeignKey',
      'total_amount'          => 'Number',
      'status'                => 'Enum',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
    );
  }
}
