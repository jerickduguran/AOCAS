<?php

/**
 * BaseCheckVoucherEntry
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $check_number
 * @property date $check_date
 * @property int $check_voucher_id
 * @property int $bank_id
 * @property int $general_library_id
 * @property int $chart_of_account_id
 * @property boolean $is_cleared
 * @property date $is_cleared_date
 * @property boolean $is_cancelled
 * @property date $is_cancelled_date
 * @property boolean $is_released
 * @property date $is_released_date
 * @property decimal $amount
 * @property Bank $Bank
 * @property ChartOfAccount $ChartOfAccount
 * @property CheckVoucher $CheckVoucher
 * @property GeneralLibrary $GeneralLibrary
 * 
 * @method string            getCheckNumber()         Returns the current record's "check_number" value
 * @method date              getCheckDate()           Returns the current record's "check_date" value
 * @method int               getCheckVoucherId()      Returns the current record's "check_voucher_id" value
 * @method int               getBankId()              Returns the current record's "bank_id" value
 * @method int               getGeneralLibraryId()    Returns the current record's "general_library_id" value
 * @method int               getChartOfAccountId()    Returns the current record's "chart_of_account_id" value
 * @method boolean           getIsCleared()           Returns the current record's "is_cleared" value
 * @method date              getIsClearedDate()       Returns the current record's "is_cleared_date" value
 * @method boolean           getIsCancelled()         Returns the current record's "is_cancelled" value
 * @method date              getIsCancelledDate()     Returns the current record's "is_cancelled_date" value
 * @method boolean           getIsReleased()          Returns the current record's "is_released" value
 * @method date              getIsReleasedDate()      Returns the current record's "is_released_date" value
 * @method decimal           getAmount()              Returns the current record's "amount" value
 * @method Bank              getBank()                Returns the current record's "Bank" value
 * @method ChartOfAccount    getChartOfAccount()      Returns the current record's "ChartOfAccount" value
 * @method CheckVoucher      getCheckVoucher()        Returns the current record's "CheckVoucher" value
 * @method GeneralLibrary    getGeneralLibrary()      Returns the current record's "GeneralLibrary" value
 * @method CheckVoucherEntry setCheckNumber()         Sets the current record's "check_number" value
 * @method CheckVoucherEntry setCheckDate()           Sets the current record's "check_date" value
 * @method CheckVoucherEntry setCheckVoucherId()      Sets the current record's "check_voucher_id" value
 * @method CheckVoucherEntry setBankId()              Sets the current record's "bank_id" value
 * @method CheckVoucherEntry setGeneralLibraryId()    Sets the current record's "general_library_id" value
 * @method CheckVoucherEntry setChartOfAccountId()    Sets the current record's "chart_of_account_id" value
 * @method CheckVoucherEntry setIsCleared()           Sets the current record's "is_cleared" value
 * @method CheckVoucherEntry setIsClearedDate()       Sets the current record's "is_cleared_date" value
 * @method CheckVoucherEntry setIsCancelled()         Sets the current record's "is_cancelled" value
 * @method CheckVoucherEntry setIsCancelledDate()     Sets the current record's "is_cancelled_date" value
 * @method CheckVoucherEntry setIsReleased()          Sets the current record's "is_released" value
 * @method CheckVoucherEntry setIsReleasedDate()      Sets the current record's "is_released_date" value
 * @method CheckVoucherEntry setAmount()              Sets the current record's "amount" value
 * @method CheckVoucherEntry setBank()                Sets the current record's "Bank" value
 * @method CheckVoucherEntry setChartOfAccount()      Sets the current record's "ChartOfAccount" value
 * @method CheckVoucherEntry setCheckVoucher()        Sets the current record's "CheckVoucher" value
 * @method CheckVoucherEntry setGeneralLibrary()      Sets the current record's "GeneralLibrary" value
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCheckVoucherEntry extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('check_voucher_entry');
        $this->hasColumn('check_number', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('check_date', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('check_voucher_id', 'int', 11, array(
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
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('is_cleared_date', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('is_cancelled', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('is_cancelled_date', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('is_released', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('is_released_date', 'date', null, array(
             'type' => 'date',
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
        $this->hasOne('Bank', array(
             'local' => 'bank_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('ChartOfAccount', array(
             'local' => 'chart_of_account_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('CheckVoucher', array(
             'local' => 'check_voucher_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('GeneralLibrary', array(
             'local' => 'general_library_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}