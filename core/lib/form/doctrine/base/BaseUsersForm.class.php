<?php

/**
 * Users form base class.
 *
 * @method Users getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'code'        => new sfWidgetFormInputText(),
      'first_name'  => new sfWidgetFormInputText(),
      'last_name'   => new sfWidgetFormInputText(),
      'middle_name' => new sfWidgetFormInputText(),
      'username'    => new sfWidgetFormInputText(),
      'password'    => new sfWidgetFormInputText(),
      'email'       => new sfWidgetFormInputText(),
      'picture'     => new sfWidgetFormInputText(),
      'position_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UserPositions'), 'add_empty' => true)),
      'role_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UserRoles'), 'add_empty' => true)),
      'is_active'   => new sfWidgetFormInputText(),
      'status_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UserStatus'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'first_name'  => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'last_name'   => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'middle_name' => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'username'    => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'password'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'picture'     => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'position_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UserPositions'), 'required' => false)),
      'role_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UserRoles'), 'required' => false)),
      'is_active'   => new sfValidatorInteger(array('required' => false)),
      'status_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UserStatus'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Users';
  }

}
