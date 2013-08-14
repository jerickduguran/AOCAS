<?php

/**
 * JournalBookParticularTemplate form base class.
 *
 * @method JournalBookParticularTemplate getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseJournalBookParticularTemplateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'journal_book_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('JournalBook'), 'add_empty' => false)),
      'particular_template_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ParticularTemplate'), 'add_empty' => false)),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'journal_book_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('JournalBook'), 'required' => false)),
      'particular_template_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ParticularTemplate'), 'required' => false)),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('journal_book_particular_template[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JournalBookParticularTemplate';
  }

}
