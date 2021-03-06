<?php

/**
 * BaseCurrency
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $symbol
 * @property string $title
 * @property string $description
 * @property boolean $is_base
 * @property decimal $unit_per_base
 * @property date $date
 * @property string $notes
 * @property Doctrine_Collection $CheckVoucher
 * @property Doctrine_Collection $AccountsReceivableBeginningBalance
 * @property Doctrine_Collection $AccountsPayableBeginningBalance
 * @property Doctrine_Collection $FinancialSetting
 * @property Doctrine_Collection $Invoice
 * @property Doctrine_Collection $Receipt
 * 
 * @method string              getSymbol()                             Returns the current record's "symbol" value
 * @method string              getTitle()                              Returns the current record's "title" value
 * @method string              getDescription()                        Returns the current record's "description" value
 * @method boolean             getIsBase()                             Returns the current record's "is_base" value
 * @method decimal             getUnitPerBase()                        Returns the current record's "unit_per_base" value
 * @method date                getDate()                               Returns the current record's "date" value
 * @method string              getNotes()                              Returns the current record's "notes" value
 * @method Doctrine_Collection getCheckVoucher()                       Returns the current record's "CheckVoucher" collection
 * @method Doctrine_Collection getAccountsReceivableBeginningBalance() Returns the current record's "AccountsReceivableBeginningBalance" collection
 * @method Doctrine_Collection getAccountsPayableBeginningBalance()    Returns the current record's "AccountsPayableBeginningBalance" collection
 * @method Doctrine_Collection getFinancialSetting()                   Returns the current record's "FinancialSetting" collection
 * @method Doctrine_Collection getInvoice()                            Returns the current record's "Invoice" collection
 * @method Doctrine_Collection getReceipt()                            Returns the current record's "Receipt" collection
 * @method Currency            setSymbol()                             Sets the current record's "symbol" value
 * @method Currency            setTitle()                              Sets the current record's "title" value
 * @method Currency            setDescription()                        Sets the current record's "description" value
 * @method Currency            setIsBase()                             Sets the current record's "is_base" value
 * @method Currency            setUnitPerBase()                        Sets the current record's "unit_per_base" value
 * @method Currency            setDate()                               Sets the current record's "date" value
 * @method Currency            setNotes()                              Sets the current record's "notes" value
 * @method Currency            setCheckVoucher()                       Sets the current record's "CheckVoucher" collection
 * @method Currency            setAccountsReceivableBeginningBalance() Sets the current record's "AccountsReceivableBeginningBalance" collection
 * @method Currency            setAccountsPayableBeginningBalance()    Sets the current record's "AccountsPayableBeginningBalance" collection
 * @method Currency            setFinancialSetting()                   Sets the current record's "FinancialSetting" collection
 * @method Currency            setInvoice()                            Sets the current record's "Invoice" collection
 * @method Currency            setReceipt()                            Sets the current record's "Receipt" collection
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCurrency extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('currency');
        $this->hasColumn('symbol', 'string', 3, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'default' => '',
             'length' => 3,
             ));
        $this->hasColumn('title', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'length' => 50,
             ));
        $this->hasColumn('description', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('is_base', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('unit_per_base', 'decimal', 12, array(
             'type' => 'decimal',
             'scale' => 2,
             'default' => 0,
             'notnull' => true,
             'length' => 12,
             ));
        $this->hasColumn('date', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('notes', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('CheckVoucher', array(
             'local' => 'id',
             'foreign' => 'currency_id'));

        $this->hasMany('AccountsReceivableBeginningBalance', array(
             'local' => 'id',
             'foreign' => 'currency_id'));

        $this->hasMany('AccountsPayableBeginningBalance', array(
             'local' => 'id',
             'foreign' => 'currency_id'));

        $this->hasMany('FinancialSetting', array(
             'local' => 'id',
             'foreign' => 'currency_id'));

        $this->hasMany('Invoice', array(
             'local' => 'id',
             'foreign' => 'currency_id'));

        $this->hasMany('Receipt', array(
             'local' => 'id',
             'foreign' => 'currency_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}