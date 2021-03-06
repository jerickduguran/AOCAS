<?php

/**
 * BaseJournalBook
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $sanumber_label
 * @property string $label
 * @property string $person_label
 * @property boolean $date_enabled
 * @property string $ref_doc
 * @property string $date
 * @property string $configurations
 * @property Doctrine_Collection $ParticularTemplate
 * @property Doctrine_Collection $JournalBookTemplate
 * @property Doctrine_Collection $JournalBookBookTemplate
 * @property Doctrine_Collection $JournalBookParticularTemplate
 * 
 * @method string              getCode()                          Returns the current record's "code" value
 * @method string              getName()                          Returns the current record's "name" value
 * @method string              getDescription()                   Returns the current record's "description" value
 * @method string              getSanumberLabel()                 Returns the current record's "sanumber_label" value
 * @method string              getLabel()                         Returns the current record's "label" value
 * @method string              getPersonLabel()                   Returns the current record's "person_label" value
 * @method boolean             getDateEnabled()                   Returns the current record's "date_enabled" value
 * @method string              getRefDoc()                        Returns the current record's "ref_doc" value
 * @method string              getDate()                          Returns the current record's "date" value
 * @method string              getConfigurations()                Returns the current record's "configurations" value
 * @method Doctrine_Collection getParticularTemplate()            Returns the current record's "ParticularTemplate" collection
 * @method Doctrine_Collection getJournalBookTemplate()           Returns the current record's "JournalBookTemplate" collection
 * @method Doctrine_Collection getJournalBookBookTemplate()       Returns the current record's "JournalBookBookTemplate" collection
 * @method Doctrine_Collection getJournalBookParticularTemplate() Returns the current record's "JournalBookParticularTemplate" collection
 * @method JournalBook         setCode()                          Sets the current record's "code" value
 * @method JournalBook         setName()                          Sets the current record's "name" value
 * @method JournalBook         setDescription()                   Sets the current record's "description" value
 * @method JournalBook         setSanumberLabel()                 Sets the current record's "sanumber_label" value
 * @method JournalBook         setLabel()                         Sets the current record's "label" value
 * @method JournalBook         setPersonLabel()                   Sets the current record's "person_label" value
 * @method JournalBook         setDateEnabled()                   Sets the current record's "date_enabled" value
 * @method JournalBook         setRefDoc()                        Sets the current record's "ref_doc" value
 * @method JournalBook         setDate()                          Sets the current record's "date" value
 * @method JournalBook         setConfigurations()                Sets the current record's "configurations" value
 * @method JournalBook         setParticularTemplate()            Sets the current record's "ParticularTemplate" collection
 * @method JournalBook         setJournalBookTemplate()           Sets the current record's "JournalBookTemplate" collection
 * @method JournalBook         setJournalBookBookTemplate()       Sets the current record's "JournalBookBookTemplate" collection
 * @method JournalBook         setJournalBookParticularTemplate() Sets the current record's "JournalBookParticularTemplate" collection
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseJournalBook extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('journal_book');
        $this->hasColumn('code', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'unique' => true,
             'length' => 50,
             ));
        $this->hasColumn('name', 'string', 60, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'length' => 60,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('sanumber_label', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('label', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('person_label', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('date_enabled', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('ref_doc', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('date', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('configurations', 'string', null, array(
             'type' => 'string',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('ParticularTemplate', array(
             'refClass' => 'JournalBookParticularTemplate',
             'local' => 'journal_book_id',
             'foreign' => 'particular_template_id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('JournalBookTemplate', array(
             'refClass' => 'JournalBookBookTemplate',
             'local' => 'journal_book_id',
             'foreign' => 'journal_book_template_id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('JournalBookBookTemplate', array(
             'local' => 'id',
             'foreign' => 'journal_book_id'));

        $this->hasMany('JournalBookParticularTemplate', array(
             'local' => 'id',
             'foreign' => 'journal_book_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}