<?php

/**
 * BaseDepartment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $code
 * @property string $title
 * @property string $description
 * @property Doctrine_Collection $AccountsReceivableBeginningBalance
 * @property Doctrine_Collection $AccountsPayableBeginningBalance
 * @property Doctrine_Collection $GeneralLedgerBeginningBalance
 * @property Doctrine_Collection $JournalBookTemplate
 * @property Doctrine_Collection $ParticularTemplate
 * @property Doctrine_Collection $InvoiceAccountEntry
 * 
 * @method string              getCode()                               Returns the current record's "code" value
 * @method string              getTitle()                              Returns the current record's "title" value
 * @method string              getDescription()                        Returns the current record's "description" value
 * @method Doctrine_Collection getAccountsReceivableBeginningBalance() Returns the current record's "AccountsReceivableBeginningBalance" collection
 * @method Doctrine_Collection getAccountsPayableBeginningBalance()    Returns the current record's "AccountsPayableBeginningBalance" collection
 * @method Doctrine_Collection getGeneralLedgerBeginningBalance()      Returns the current record's "GeneralLedgerBeginningBalance" collection
 * @method Doctrine_Collection getJournalBookTemplate()                Returns the current record's "JournalBookTemplate" collection
 * @method Doctrine_Collection getParticularTemplate()                 Returns the current record's "ParticularTemplate" collection
 * @method Doctrine_Collection getInvoiceAccountEntry()                Returns the current record's "InvoiceAccountEntry" collection
 * @method Department          setCode()                               Sets the current record's "code" value
 * @method Department          setTitle()                              Sets the current record's "title" value
 * @method Department          setDescription()                        Sets the current record's "description" value
 * @method Department          setAccountsReceivableBeginningBalance() Sets the current record's "AccountsReceivableBeginningBalance" collection
 * @method Department          setAccountsPayableBeginningBalance()    Sets the current record's "AccountsPayableBeginningBalance" collection
 * @method Department          setGeneralLedgerBeginningBalance()      Sets the current record's "GeneralLedgerBeginningBalance" collection
 * @method Department          setJournalBookTemplate()                Sets the current record's "JournalBookTemplate" collection
 * @method Department          setParticularTemplate()                 Sets the current record's "ParticularTemplate" collection
 * @method Department          setInvoiceAccountEntry()                Sets the current record's "InvoiceAccountEntry" collection
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDepartment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('department');
        $this->hasColumn('code', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'unique' => true,
             'length' => 50,
             ));
        $this->hasColumn('title', 'string', 60, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'length' => 60,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('AccountsReceivableBeginningBalance', array(
             'local' => 'id',
             'foreign' => 'department_id'));

        $this->hasMany('AccountsPayableBeginningBalance', array(
             'local' => 'id',
             'foreign' => 'department_id'));

        $this->hasMany('GeneralLedgerBeginningBalance', array(
             'local' => 'id',
             'foreign' => 'department_id'));

        $this->hasMany('JournalBookTemplate', array(
             'local' => 'id',
             'foreign' => 'department_id'));

        $this->hasMany('ParticularTemplate', array(
             'local' => 'id',
             'foreign' => 'department_id'));

        $this->hasMany('InvoiceAccountEntry', array(
             'local' => 'id',
             'foreign' => 'department_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}