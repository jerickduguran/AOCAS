<?php

/**
 * GeneralLibraryAdditionInfo filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGeneralLibraryAdditionInfoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'general_library_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibrary'), 'add_empty' => true)),
      'industry_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Industry'), 'add_empty' => true)),
      'term_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibraryTerms'), 'add_empty' => true)),
      'no_days'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'percent_discount'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'credit_limit_amount' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'restricted'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'remarks'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vat_no'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tin'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'general_library_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GeneralLibrary'), 'column' => 'id')),
      'industry_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Industry'), 'column' => 'id')),
      'term_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GeneralLibraryTerms'), 'column' => 'id')),
      'no_days'             => new sfValidatorPass(array('required' => false)),
      'percent_discount'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'credit_limit_amount' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'restricted'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'remarks'             => new sfValidatorPass(array('required' => false)),
      'vat_no'              => new sfValidatorPass(array('required' => false)),
      'tin'                 => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('general_library_addition_info_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GeneralLibraryAdditionInfo';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'general_library_id'  => 'ForeignKey',
      'industry_id'         => 'ForeignKey',
      'term_id'             => 'ForeignKey',
      'no_days'             => 'Text',
      'percent_discount'    => 'Number',
      'credit_limit_amount' => 'Number',
      'restricted'          => 'Boolean',
      'remarks'             => 'Text',
      'vat_no'              => 'Text',
      'tin'                 => 'Text',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
