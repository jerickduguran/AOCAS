<?php

/**
 * ParticularTemplate form base class.
 *
 * @method ParticularTemplate getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseParticularTemplateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'code'              => new sfWidgetFormInputText(),
      'name'              => new sfWidgetFormInputText(),
      'particulars'       => new sfWidgetFormTextarea(),
      'header_message'    => new sfWidgetFormTextarea(),
      'footer_message'    => new sfWidgetFormTextarea(),
      'project_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => true)),
      'department_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true)),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'journal_book_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'JournalBook')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'particulars'       => new sfValidatorString(array('required' => false)),
      'header_message'    => new sfValidatorString(array('required' => false)),
      'footer_message'    => new sfValidatorString(array('required' => false)),
      'project_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'required' => false)),
      'department_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'journal_book_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'JournalBook', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ParticularTemplate', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('particular_template[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ParticularTemplate';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['journal_book_list']))
    {
      $this->setDefault('journal_book_list', $this->object->JournalBook->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveJournalBookList($con);

    parent::doSave($con);
  }

  public function saveJournalBookList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['journal_book_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->JournalBook->getPrimaryKeys();
    $values = $this->getValue('journal_book_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('JournalBook', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('JournalBook', array_values($link));
    }
  }

}
