<?php

/**
 * BaseAccountsPayableVoucherAccountEntry
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int $accounts_payable_voucher_id
 * @property int $chart_of_account_id
 * @property int $general_library_id
 * @property string $dn_reference
 * @property decimal $debit
 * @property decimal $credit
 * @property AccountsPayableVoucher $AccountsPayableVoucher
 * @property ChartOfAccount $ChartOfAccount
 * @property GeneralLibrary $GeneralLibrary
 * 
 * @method int                                getAccountsPayableVoucherId()    Returns the current record's "accounts_payable_voucher_id" value
 * @method int                                getChartOfAccountId()            Returns the current record's "chart_of_account_id" value
 * @method int                                getGeneralLibraryId()            Returns the current record's "general_library_id" value
 * @method string                             getDnReference()                 Returns the current record's "dn_reference" value
 * @method decimal                            getDebit()                       Returns the current record's "debit" value
 * @method decimal                            getCredit()                      Returns the current record's "credit" value
 * @method AccountsPayableVoucher             getAccountsPayableVoucher()      Returns the current record's "AccountsPayableVoucher" value
 * @method ChartOfAccount                     getChartOfAccount()              Returns the current record's "ChartOfAccount" value
 * @method GeneralLibrary                     getGeneralLibrary()              Returns the current record's "GeneralLibrary" value
 * @method AccountsPayableVoucherAccountEntry setAccountsPayableVoucherId()    Sets the current record's "accounts_payable_voucher_id" value
 * @method AccountsPayableVoucherAccountEntry setChartOfAccountId()            Sets the current record's "chart_of_account_id" value
 * @method AccountsPayableVoucherAccountEntry setGeneralLibraryId()            Sets the current record's "general_library_id" value
 * @method AccountsPayableVoucherAccountEntry setDnReference()                 Sets the current record's "dn_reference" value
 * @method AccountsPayableVoucherAccountEntry setDebit()                       Sets the current record's "debit" value
 * @method AccountsPayableVoucherAccountEntry setCredit()                      Sets the current record's "credit" value
 * @method AccountsPayableVoucherAccountEntry setAccountsPayableVoucher()      Sets the current record's "AccountsPayableVoucher" value
 * @method AccountsPayableVoucherAccountEntry setChartOfAccount()              Sets the current record's "ChartOfAccount" value
 * @method AccountsPayableVoucherAccountEntry setGeneralLibrary()              Sets the current record's "GeneralLibrary" value
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAccountsPayableVoucherAccountEntry extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('accounts_payable_voucher_account_entry');
        $this->hasColumn('accounts_payable_voucher_id', 'int', 11, array(
             'type' => 'int',
             'notnull' => true,
             'length' => 11,
             ));
        $this->hasColumn('chart_of_account_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('general_library_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('dn_reference', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('debit', 'decimal', 12, array(
             'type' => 'decimal',
             'scale' => 2,
             'default' => 0,
             'notnull' => true,
             'length' => 12,
             ));
        $this->hasColumn('credit', 'decimal', 12, array(
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
        $this->hasOne('AccountsPayableVoucher', array(
             'local' => 'accounts_payable_voucher_id',
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

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}