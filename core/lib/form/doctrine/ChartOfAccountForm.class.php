<?php

/**
 * ChartOfAccount form.
 *
 * @package    Zafire Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ChartOfAccountForm extends BaseChartOfAccountForm
{
  public function configure()
  {
	
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'chart_of_account_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccountType'), 'add_empty' => true)),
      'code'                     => new sfWidgetFormInputText(),
      'title'                    => new sfWidgetFormInputText(),
      'description'              => new sfWidgetFormTextarea(),
      'status'                   => new sfWidgetFormChoice(array('choices' => array('ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'))),
      'group_code_list'          => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'GroupCode')),
      'validation_list'          => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'expanded'=> true, 'model' => 'Validation')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'chart_of_account_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ChartOfAccountType'), 'required' => false)),
      'code'                     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'title'                    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'description'              => new sfValidatorString(array('required' => false)),
      'status'                   => new sfValidatorChoice(array('choices' => array(0 => 'ACTIVE', 1 => 'INACTIVE'), 'required' => false)),
      'group_code_list'          => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'GroupCode', 'required' => false)),
      'validation_list'          => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Validation', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ChartOfAccount', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('chart_of_account[%s]');

  }
}
