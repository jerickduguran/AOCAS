<?php

/**
 * GeneralLibraryBillingInfo filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGeneralLibraryBillingInfoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'general_library_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'drawing_no'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'specs_no'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bill_to'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'building_no'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'street_1'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'street_2'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'postal_code'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'province'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'attention'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'general_library_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GeneralLibrary'), 'column' => 'id')),
      'drawing_no'         => new sfValidatorPass(array('required' => false)),
      'specs_no'           => new sfValidatorPass(array('required' => false)),
      'bill_to'            => new sfValidatorPass(array('required' => false)),
      'building_no'        => new sfValidatorPass(array('required' => false)),
      'street_1'           => new sfValidatorPass(array('required' => false)),
      'street_2'           => new sfValidatorPass(array('required' => false)),
      'city'               => new sfValidatorPass(array('required' => false)),
      'postal_code'        => new sfValidatorPass(array('required' => false)),
      'province'           => new sfValidatorPass(array('required' => false)),
      'country_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Country'), 'column' => 'id')),
      'attention'          => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('general_library_billing_info_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GeneralLibraryBillingInfo';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'general_library_id' => 'ForeignKey',
      'drawing_no'         => 'Text',
      'specs_no'           => 'Text',
      'bill_to'            => 'Text',
      'building_no'        => 'Text',
      'street_1'           => 'Text',
      'street_2'           => 'Text',
      'city'               => 'Text',
      'postal_code'        => 'Text',
      'province'           => 'Text',
      'country_id'         => 'ForeignKey',
      'attention'          => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
