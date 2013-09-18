<?php

/**
 * CheckVoucherEntry form base class.
 *
 * @method CheckVoucherEntry getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCheckVoucherEntryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'check_number'        => new sfWidgetFormInputText(),
      'check_date'          => new sfWidgetFormDate(),
      'check_voucher_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CheckVoucher'), 'add_empty' => true)),
      'bank_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bank'), 'add_empty' => true)),
      'general_library_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'chart_of_account_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'add_empty' => true)),
      'is_cleared'          => new sfWidgetFormInputCheckbox(),
      'is_cleared_date'     => new sfWidgetFormDate(),
      'is_cancelled'        => new sfWidgetFormInputCheckbox(),
      'is_cancelled_date'   => new sfWidgetFormDate(),
      'is_released'         => new sfWidgetFormInputCheckbox(),
      'is_released_date'    => new sfWidgetFormDate(),
      'amount'              => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'check_number'        => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'check_date'          => new sfValidatorDate(array('required' => false)),
      'check_voucher_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CheckVoucher'), 'required' => false)),
      'bank_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bank'), 'required' => false)),
      'general_library_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'required' => false)),
      'chart_of_account_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'is_cleared'          => new sfValidatorBoolean(array('required' => false)),
      'is_cleared_date'     => new sfValidatorDate(array('required' => false)),
      'is_cancelled'        => new sfValidatorBoolean(array('required' => false)),
      'is_cancelled_date'   => new sfValidatorDate(array('required' => false)),
      'is_released'         => new sfValidatorBoolean(array('required' => false)),
      'is_released_date'    => new sfValidatorDate(array('required' => false)),
      'amount'              => new sfValidatorNumber(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('check_voucher_entry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CheckVoucherEntry';
  }

}
