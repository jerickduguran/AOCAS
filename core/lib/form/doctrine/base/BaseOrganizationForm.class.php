<?php

/**
 * Organization form base class.
 *
 * @method Organization getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOrganizationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'display_name'         => new sfWidgetFormInputText(),
      'legal_name'           => new sfWidgetFormInputText(),
      'organization_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrganizationType'), 'add_empty' => true)),
      'rdo_code'             => new sfWidgetFormInputText(),
      'branch_code'          => new sfWidgetFormInputText(),
      'tin'                  => new sfWidgetFormInputText(),
      'logo'                 => new sfWidgetFormInputText(),
      'street'               => new sfWidgetFormTextarea(),
      'city'                 => new sfWidgetFormInputText(),
      'code'                 => new sfWidgetFormInputText(),
      'country_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'telephone_number'     => new sfWidgetFormInputText(),
      'fax'                  => new sfWidgetFormInputText(),
      'mobile_number'        => new sfWidgetFormInputText(),
      'email'                => new sfWidgetFormInputText(),
      'facebook_url'         => new sfWidgetFormInputText(),
      'twitter_url'          => new sfWidgetFormInputText(),
      'linkedln_url'         => new sfWidgetFormInputText(),
      'googleplus_url'       => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'display_name'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'legal_name'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'organization_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('OrganizationType'), 'required' => false)),
      'rdo_code'             => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'branch_code'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'tin'                  => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'logo'                 => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'street'               => new sfValidatorString(array('required' => false)),
      'city'                 => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'code'                 => new sfValidatorPass(array('required' => false)),
      'country_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'required' => false)),
      'telephone_number'     => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'fax'                  => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'mobile_number'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email'                => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'facebook_url'         => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'twitter_url'          => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'linkedln_url'         => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'googleplus_url'       => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('organization[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Organization';
  }

}
