<?php

/**
 * CheckVoucher form base class.
 *
 * @method CheckVoucher getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCheckVoucherForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'book_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => false)),
      'status'             => new sfWidgetFormChoice(array('choices' => array('FULL' => 'FULL', 'PARTIAL' => 'PARTIAL'))),
      'voucher_number'     => new sfWidgetFormInputText(),
      'general_library_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'currency_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'add_empty' => true)),
      'date_received'      => new sfWidgetFormDate(),
      'period'             => new sfWidgetFormDate(),
      'due_date'           => new sfWidgetFormDate(),
      'header_message'     => new sfWidgetFormTextarea(),
      'footer_message'     => new sfWidgetFormTextarea(),
      'si_dr_number'       => new sfWidgetFormTextarea(),
      'total_amount'       => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'book_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'required' => false)),
      'status'             => new sfValidatorChoice(array('choices' => array(0 => 'FULL', 1 => 'PARTIAL'), 'required' => false)),
      'voucher_number'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'general_library_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'currency_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Currency'), 'required' => false)),
      'date_received'      => new sfValidatorDate(array('required' => false)),
      'period'             => new sfValidatorDate(array('required' => false)),
      'due_date'           => new sfValidatorDate(array('required' => false)),
      'header_message'     => new sfValidatorString(array('required' => false)),
      'footer_message'     => new sfValidatorString(array('required' => false)),
      'si_dr_number'       => new sfValidatorString(array('required' => false)),
      'total_amount'       => new sfValidatorNumber(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'CheckVoucher', 'column' => array('voucher_number')))
    );

    $this->widgetSchema->setNameFormat('check_voucher[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CheckVoucher';
  }

}
