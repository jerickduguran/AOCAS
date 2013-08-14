<?php

/**
 * JournalBook form base class.
 *
 * @method JournalBook getObject() Returns the current form's model object
 *
 * @package    Gcross Accounting System
 * @subpackage form
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseJournalBookForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'code'                       => new sfWidgetFormInputText(),
      'name'                       => new sfWidgetFormInputText(),
      'description'                => new sfWidgetFormTextarea(),
      'sanumber_label'             => new sfWidgetFormTextarea(),
      'label'                      => new sfWidgetFormTextarea(),
      'person_label'               => new sfWidgetFormTextarea(),
      'date_enabled'               => new sfWidgetFormInputCheckbox(),
      'ref_doc'                    => new sfWidgetFormTextarea(),
      'date'                       => new sfWidgetFormTextarea(),
      'configurations'             => new sfWidgetFormTextarea(),
      'created_at'                 => new sfWidgetFormDateTime(),
      'updated_at'                 => new sfWidgetFormDateTime(),
      'particular_template_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'ParticularTemplate')),
      'journal_book_template_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'JournalBookTemplate')),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'code'                       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'name'                       => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'description'                => new sfValidatorString(array('required' => false)),
      'sanumber_label'             => new sfValidatorString(array('required' => false)),
      'label'                      => new sfValidatorString(array('required' => false)),
      'person_label'               => new sfValidatorString(array('required' => false)),
      'date_enabled'               => new sfValidatorBoolean(array('required' => false)),
      'ref_doc'                    => new sfValidatorString(array('required' => false)),
      'date'                       => new sfValidatorString(array('required' => false)),
      'configurations'             => new sfValidatorString(array('required' => false)),
      'created_at'                 => new sfValidatorDateTime(),
      'updated_at'                 => new sfValidatorDateTime(),
      'particular_template_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ParticularTemplate', 'required' => false)),
      'journal_book_template_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'JournalBookTemplate', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'JournalBook', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('journal_book[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'JournalBook';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['particular_template_list']))
    {
      $this->setDefault('particular_template_list', $this->object->ParticularTemplate->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['journal_book_template_list']))
    {
      $this->setDefault('journal_book_template_list', $this->object->JournalBookTemplate->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveParticularTemplateList($con);
    $this->saveJournalBookTemplateList($con);

    parent::doSave($con);
  }

  public function saveParticularTemplateList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['particular_template_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->ParticularTemplate->getPrimaryKeys();
    $values = $this->getValue('particular_template_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ParticularTemplate', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ParticularTemplate', array_values($link));
    }
  }

  public function saveJournalBookTemplateList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['journal_book_template_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->JournalBookTemplate->getPrimaryKeys();
    $values = $this->getValue('journal_book_template_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('JournalBookTemplate', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('JournalBookTemplate', array_values($link));
    }
  }

}
