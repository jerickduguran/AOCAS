<?php

/**
 * Receipt form base class.
 *
 * @method Receipt getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReceiptForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'book_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => false)),
      'status'                => new sfWidgetFormChoice(array('choices' => array('UNPAID' => 'UNPAID', 'PARTIAL_PAID' => 'PARTIAL_PAID', 'FULL PAID' => 'FULL PAID'))),
      'receipt_number'        => new sfWidgetFormInputText(),
      'general_library_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'currency_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'add_empty' => true)),
      'purchase_order_number' => new sfWidgetFormInputText(),
      'date_receive'          => new sfWidgetFormDate(),
      'period'                => new sfWidgetFormDate(),
      'due_date'              => new sfWidgetFormDate(),
      'header_message'        => new sfWidgetFormTextarea(),
      'footer_message'        => new sfWidgetFormTextarea(),
      'total_amount'          => new sfWidgetFormInputText(),
      'mode_payment'          => new sfWidgetFormChoice(array('choices' => array('CASH' => 'CASH', 'CHECK' => 'CHECK'))),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'book_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'required' => false)),
      'status'                => new sfValidatorChoice(array('choices' => array(0 => 'UNPAID', 1 => 'PARTIAL_PAID', 2 => 'FULL PAID'), 'required' => false)),
      'receipt_number'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'general_library_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'currency_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'required' => false)),
      'purchase_order_number' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'date_receive'          => new sfValidatorDate(array('required' => false)),
      'period'                => new sfValidatorDate(array('required' => false)),
      'due_date'              => new sfValidatorDate(array('required' => false)),
      'header_message'        => new sfValidatorString(array('required' => false)),
      'footer_message'        => new sfValidatorString(array('required' => false)),
      'total_amount'          => new sfValidatorNumber(array('required' => false)),
      'mode_payment'          => new sfValidatorChoice(array('choices' => array(0 => 'CASH', 1 => 'CHECK'), 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Receipt', 'column' => array('receipt_number')))
    );

    $this->widgetSchema->setNameFormat('receipt[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Receipt';
  }

}
