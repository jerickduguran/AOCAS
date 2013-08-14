<?php

/**
 * GeneralLibrary filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGeneralLibraryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'client_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ClientType'), 'add_empty' => true)),
      'status_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ClientStatus'), 'add_empty' => true)),
      'category_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GeneralLibraryCategory'), 'add_empty' => true)),
      'code'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'building_no'    => new sfWidgetFormFilterInput(),
      'street_1'       => new sfWidgetFormFilterInput(),
      'street_2'       => new sfWidgetFormFilterInput(),
      'city'           => new sfWidgetFormFilterInput(),
      'postal_code'    => new sfWidgetFormFilterInput(),
      'province'       => new sfWidgetFormFilterInput(),
      'country_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'attention'      => new sfWidgetFormFilterInput(),
      'position'       => new sfWidgetFormFilterInput(),
      'telephone_no'   => new sfWidgetFormFilterInput(),
      'fax_no'         => new sfWidgetFormFilterInput(),
      'mobile_no'      => new sfWidgetFormFilterInput(),
      'email'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'website'        => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'client_type_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ClientType'), 'column' => 'id')),
      'status_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ClientStatus'), 'column' => 'id')),
      'category_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GeneralLibraryCategory'), 'column' => 'id')),
      'code'           => new sfValidatorPass(array('required' => false)),
      'name'           => new sfValidatorPass(array('required' => false)),
      'building_no'    => new sfValidatorPass(array('required' => false)),
      'street_1'       => new sfValidatorPass(array('required' => false)),
      'street_2'       => new sfValidatorPass(array('required' => false)),
      'city'           => new sfValidatorPass(array('required' => false)),
      'postal_code'    => new sfValidatorPass(array('required' => false)),
      'province'       => new sfValidatorPass(array('required' => false)),
      'country_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Country'), 'column' => 'id')),
      'attention'      => new sfValidatorPass(array('required' => false)),
      'position'       => new sfValidatorPass(array('required' => false)),
      'telephone_no'   => new sfValidatorPass(array('required' => false)),
      'fax_no'         => new sfValidatorPass(array('required' => false)),
      'mobile_no'      => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'website'        => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('general_library_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GeneralLibrary';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'client_type_id' => 'ForeignKey',
      'status_id'      => 'ForeignKey',
      'category_id'    => 'ForeignKey',
      'code'           => 'Text',
      'name'           => 'Text',
      'building_no'    => 'Text',
      'street_1'       => 'Text',
      'street_2'       => 'Text',
      'city'           => 'Text',
      'postal_code'    => 'Text',
      'province'       => 'Text',
      'country_id'     => 'ForeignKey',
      'attention'      => 'Text',
      'position'       => 'Text',
      'telephone_no'   => 'Text',
      'fax_no'         => 'Text',
      'mobile_no'      => 'Text',
      'email'          => 'Text',
      'website'        => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
