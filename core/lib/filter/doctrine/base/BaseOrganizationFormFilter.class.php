<?php

/**
 * Organization filter form base class.
 *
 * @package    Gcross Accounting System
 * @subpackage filter
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOrganizationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'display_name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'legal_name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'organization_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrganizationType'), 'add_empty' => true)),
      'rdo_code'             => new sfWidgetFormFilterInput(),
      'branch_code'          => new sfWidgetFormFilterInput(),
      'tin'                  => new sfWidgetFormFilterInput(),
      'logo'                 => new sfWidgetFormFilterInput(),
      'street'               => new sfWidgetFormFilterInput(),
      'city'                 => new sfWidgetFormFilterInput(),
      'code'                 => new sfWidgetFormFilterInput(),
      'country_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'telephone_number'     => new sfWidgetFormFilterInput(),
      'fax'                  => new sfWidgetFormFilterInput(),
      'mobile_number'        => new sfWidgetFormFilterInput(),
      'email'                => new sfWidgetFormFilterInput(),
      'facebook_url'         => new sfWidgetFormFilterInput(),
      'twitter_url'          => new sfWidgetFormFilterInput(),
      'linkedln_url'         => new sfWidgetFormFilterInput(),
      'googleplus_url'       => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'display_name'         => new sfValidatorPass(array('required' => false)),
      'legal_name'           => new sfValidatorPass(array('required' => false)),
      'organization_type_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('OrganizationType'), 'column' => 'id')),
      'rdo_code'             => new sfValidatorPass(array('required' => false)),
      'branch_code'          => new sfValidatorPass(array('required' => false)),
      'tin'                  => new sfValidatorPass(array('required' => false)),
      'logo'                 => new sfValidatorPass(array('required' => false)),
      'street'               => new sfValidatorPass(array('required' => false)),
      'city'                 => new sfValidatorPass(array('required' => false)),
      'code'                 => new sfValidatorPass(array('required' => false)),
      'country_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Country'), 'column' => 'id')),
      'telephone_number'     => new sfValidatorPass(array('required' => false)),
      'fax'                  => new sfValidatorPass(array('required' => false)),
      'mobile_number'        => new sfValidatorPass(array('required' => false)),
      'email'                => new sfValidatorPass(array('required' => false)),
      'facebook_url'         => new sfValidatorPass(array('required' => false)),
      'twitter_url'          => new sfValidatorPass(array('required' => false)),
      'linkedln_url'         => new sfValidatorPass(array('required' => false)),
      'googleplus_url'       => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('organization_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Organization';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'display_name'         => 'Text',
      'legal_name'           => 'Text',
      'organization_type_id' => 'ForeignKey',
      'rdo_code'             => 'Text',
      'branch_code'          => 'Text',
      'tin'                  => 'Text',
      'logo'                 => 'Text',
      'street'               => 'Text',
      'city'                 => 'Text',
      'code'                 => 'Text',
      'country_id'           => 'ForeignKey',
      'telephone_number'     => 'Text',
      'fax'                  => 'Text',
      'mobile_number'        => 'Text',
      'email'                => 'Text',
      'facebook_url'         => 'Text',
      'twitter_url'          => 'Text',
      'linkedln_url'         => 'Text',
      'googleplus_url'       => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}
