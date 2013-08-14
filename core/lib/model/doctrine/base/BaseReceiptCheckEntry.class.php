<?php

/**
 * BaseReceiptCheckEntry
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $check_number
 * @property date $check_date
 * @property int $receipt_id
 * @property int $bank_id
 * @property int $general_library_id
 * @property int $chart_of_account_id
 * @property boolean $is_cleared
 * @property boolean $is_released
 * @property boolean $is_cancelled
 * @property decimal $amount
 * @property Receipt $Receipt
 * @property ChartOfAccount $ChartOfAccount
 * @property GeneralLibrary $GeneralLibrary
 * @property Bank $Bank
 * 
 * @method string            getCheckNumber()         Returns the current record's "check_number" value
 * @method date              getCheckDate()           Returns the current record's "check_date" value
 * @method int               getReceiptId()           Returns the current record's "receipt_id" value
 * @method int               getBankId()              Returns the current record's "bank_id" value
 * @method int               getGeneralLibraryId()    Returns the current record's "general_library_id" value
 * @method int               getChartOfAccountId()    Returns the current record's "chart_of_account_id" value
 * @method boolean           getIsCleared()           Returns the current record's "is_cleared" value
 * @method boolean           getIsReleased()          Returns the current record's "is_released" value
 * @method boolean           getIsCancelled()         Returns the current record's "is_cancelled" value
 * @method decimal           getAmount()              Returns the current record's "amount" value
 * @method Receipt           getReceipt()             Returns the current record's "Receipt" value
 * @method ChartOfAccount    getChartOfAccount()      Returns the current record's "ChartOfAccount" value
 * @method GeneralLibrary    getGeneralLibrary()      Returns the current record's "GeneralLibrary" value
 * @method Bank              getBank()                Returns the current record's "Bank" value
 * @method ReceiptCheckEntry setCheckNumber()         Sets the current record's "check_number" value
 * @method ReceiptCheckEntry setCheckDate()           Sets the current record's "check_date" value
 * @method ReceiptCheckEntry setReceiptId()           Sets the current record's "receipt_id" value
 * @method ReceiptCheckEntry setBankId()              Sets the current record's "bank_id" value
 * @method ReceiptCheckEntry setGeneralLibraryId()    Sets the current record's "general_library_id" value
 * @method ReceiptCheckEntry setChartOfAccountId()    Sets the current record's "chart_of_account_id" value
 * @method ReceiptCheckEntry setIsCleared()           Sets the current record's "is_cleared" value
 * @method ReceiptCheckEntry setIsReleased()          Sets the current record's "is_released" value
 * @method ReceiptCheckEntry setIsCancelled()         Sets the current record's "is_cancelled" value
 * @method ReceiptCheckEntry setAmount()              Sets the current record's "amount" value
 * @method ReceiptCheckEntry setReceipt()             Sets the current record's "Receipt" value
 * @method ReceiptCheckEntry setChartOfAccount()      Sets the current record's "ChartOfAccount" value
 * @method ReceiptCheckEntry setGeneralLibrary()      Sets the current record's "GeneralLibrary" value
 * @method ReceiptCheckEntry setBank()                Sets the current record's "Bank" value
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseReceiptCheckEntry extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('receipt_check_entry');
        $this->hasColumn('check_number', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('check_date', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('receipt_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('bank_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('general_library_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('chart_of_account_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('is_cleared', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('is_released', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('is_cancelled', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('amount', 'decimal', 12, array(
             'type' => 'decimal',
             'scale' => 2,
             'default' => 0,
             'notnull' => true,
             'length' => 12,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Receipt', array(
             'local' => 'receipt_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('ChartOfAccount', array(
             'local' => 'chart_of_account_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('GeneralLibrary', array(
             'local' => 'general_library_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('Bank', array(
             'local' => 'bank_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}