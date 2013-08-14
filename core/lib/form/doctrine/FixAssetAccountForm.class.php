<?php

/**
 * FixAssetAccount form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FixAssetAccountForm extends BaseFixAssetAccountForm
{
  public function configure()
  { 
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'chart_of_account_id' => new sfWidgetFormSelect(array('choices' => Doctrine_Core::getTable("ChartOfAccount")->getAccountsByType(AccountType::TYPE_ASSET,'optionsarray'))),
      'code'                => new sfWidgetFormInputText(),
      'title'               => new sfWidgetFormInputText(),
      'description'         => new sfWidgetFormTextarea()
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'chart_of_account_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccount'), 'required' => false)),
      'code'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'title'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'description'         => new sfValidatorString(array('required' => false))
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'FixAssetAccount', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('fix_asset_account[%s]');
  }
}
