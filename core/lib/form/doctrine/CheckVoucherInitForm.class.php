<?php

/**
 * Receipt form.
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CheckVoucherInitForm extends BaseCheckVoucherForm
{
  public function configure()
  {	
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'book_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => false)),
      'voucher_number'        => new sfWidgetFormInputText(), 
      'period'                => new sfWidgetFormInputText(), 
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'book_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'required' => false)),
      'voucher_number'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'period'                => new sfValidatorDate(array('required' => false)),
    ));
	  
    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'CheckVoucher', 'column' => array('voucher_number')))
    );

	$this->validatorSchema->setOption('allow_extra_fields', true);
    $this->widgetSchema->setNameFormat('init_receipt[%s]');	 
	
  }  
}
