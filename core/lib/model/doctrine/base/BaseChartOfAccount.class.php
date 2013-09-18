<?php

/**
 * BaseChartOfAccount
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int $chart_of_account_type_id
 * @property string $code
 * @property string $title
 * @property string $description
 * @property enum $status
 * @property ChartOfAccountType $ChartOfAccountType
 * @property Doctrine_Collection $GroupCode
 * @property Doctrine_Collection $ChartOfAccountGroupCode
 * @property Doctrine_Collection $ChartOfAccountValidation
 * @property Doctrine_Collection $Validation
 * @property Doctrine_Collection $CheckVoucherAccountEntry
 * @property Doctrine_Collection $CheckVoucherAccountEntryOutputVat
 * @property Doctrine_Collection $AccountsPayableVoucherAccountEntry
 * @property Doctrine_Collection $AccountsPayableVoucherAccountEntryOutputVat
 * @property Doctrine_Collection $GeneralLedgerBeginningBalance
 * @property Doctrine_Collection $CashVoucherEntry
 * @property Doctrine_Collection $CheckVoucherEntry
 * @property Doctrine_Collection $DebitCreditMemoAccountEntry
 * @property Doctrine_Collection $DebitCreditMemoAccountEntryOutputVat
 * @property Doctrine_Collection $FixAssetAccount
 * @property Doctrine_Collection $JournalBookTemplateEntry
 * @property Doctrine_Collection $PrepaymentAccount
 * @property Doctrine_Collection $ReceiptAccountEntry
 * @property Doctrine_Collection $ReceiptAccountEntryOutputVat
 * @property Doctrine_Collection $ReceiptCashEntry
 * @property Doctrine_Collection $ReceiptCheckEntry
 * @property Doctrine_Collection $InvoiceAccountEntry
 * @property Doctrine_Collection $InvoiceAccountEntryOutputVat
 * @property Doctrine_Collection $JournalVoucherAccountEntry
 * @property Doctrine_Collection $JournalVoucherAccountEntryOutputVat
 * @property Doctrine_Collection $PettyCashVoucherAccountEntry
 * @property Doctrine_Collection $PettyCashVoucherAccountEntryOutputVat
 * 
 * @method int                 getChartOfAccountTypeId()                        Returns the current record's "chart_of_account_type_id" value
 * @method string              getCode()                                        Returns the current record's "code" value
 * @method string              getTitle()                                       Returns the current record's "title" value
 * @method string              getDescription()                                 Returns the current record's "description" value
 * @method enum                getStatus()                                      Returns the current record's "status" value
 * @method ChartOfAccountType  getChartOfAccountType()                          Returns the current record's "ChartOfAccountType" value
 * @method Doctrine_Collection getGroupCode()                                   Returns the current record's "GroupCode" collection
 * @method Doctrine_Collection getChartOfAccountGroupCode()                     Returns the current record's "ChartOfAccountGroupCode" collection
 * @method Doctrine_Collection getChartOfAccountValidation()                    Returns the current record's "ChartOfAccountValidation" collection
 * @method Doctrine_Collection getValidation()                                  Returns the current record's "Validation" collection
 * @method Doctrine_Collection getCheckVoucherAccountEntry()                    Returns the current record's "CheckVoucherAccountEntry" collection
 * @method Doctrine_Collection getCheckVoucherAccountEntryOutputVat()           Returns the current record's "CheckVoucherAccountEntryOutputVat" collection
 * @method Doctrine_Collection getAccountsPayableVoucherAccountEntry()          Returns the current record's "AccountsPayableVoucherAccountEntry" collection
 * @method Doctrine_Collection getAccountsPayableVoucherAccountEntryOutputVat() Returns the current record's "AccountsPayableVoucherAccountEntryOutputVat" collection
 * @method Doctrine_Collection getGeneralLedgerBeginningBalance()               Returns the current record's "GeneralLedgerBeginningBalance" collection
 * @method Doctrine_Collection getCashVoucherEntry()                            Returns the current record's "CashVoucherEntry" collection
 * @method Doctrine_Collection getCheckVoucherEntry()                           Returns the current record's "CheckVoucherEntry" collection
 * @method Doctrine_Collection getDebitCreditMemoAccountEntry()                 Returns the current record's "DebitCreditMemoAccountEntry" collection
 * @method Doctrine_Collection getDebitCreditMemoAccountEntryOutputVat()        Returns the current record's "DebitCreditMemoAccountEntryOutputVat" collection
 * @method Doctrine_Collection getFixAssetAccount()                             Returns the current record's "FixAssetAccount" collection
 * @method Doctrine_Collection getJournalBookTemplateEntry()                    Returns the current record's "JournalBookTemplateEntry" collection
 * @method Doctrine_Collection getPrepaymentAccount()                           Returns the current record's "PrepaymentAccount" collection
 * @method Doctrine_Collection getReceiptAccountEntry()                         Returns the current record's "ReceiptAccountEntry" collection
 * @method Doctrine_Collection getReceiptAccountEntryOutputVat()                Returns the current record's "ReceiptAccountEntryOutputVat" collection
 * @method Doctrine_Collection getReceiptCashEntry()                            Returns the current record's "ReceiptCashEntry" collection
 * @method Doctrine_Collection getReceiptCheckEntry()                           Returns the current record's "ReceiptCheckEntry" collection
 * @method Doctrine_Collection getInvoiceAccountEntry()                         Returns the current record's "InvoiceAccountEntry" collection
 * @method Doctrine_Collection getInvoiceAccountEntryOutputVat()                Returns the current record's "InvoiceAccountEntryOutputVat" collection
 * @method Doctrine_Collection getJournalVoucherAccountEntry()                  Returns the current record's "JournalVoucherAccountEntry" collection
 * @method Doctrine_Collection getJournalVoucherAccountEntryOutputVat()         Returns the current record's "JournalVoucherAccountEntryOutputVat" collection
 * @method Doctrine_Collection getPettyCashVoucherAccountEntry()                Returns the current record's "PettyCashVoucherAccountEntry" collection
 * @method Doctrine_Collection getPettyCashVoucherAccountEntryOutputVat()       Returns the current record's "PettyCashVoucherAccountEntryOutputVat" collection
 * @method ChartOfAccount      setChartOfAccountTypeId()                        Sets the current record's "chart_of_account_type_id" value
 * @method ChartOfAccount      setCode()                                        Sets the current record's "code" value
 * @method ChartOfAccount      setTitle()                                       Sets the current record's "title" value
 * @method ChartOfAccount      setDescription()                                 Sets the current record's "description" value
 * @method ChartOfAccount      setStatus()                                      Sets the current record's "status" value
 * @method ChartOfAccount      setChartOfAccountType()                          Sets the current record's "ChartOfAccountType" value
 * @method ChartOfAccount      setGroupCode()                                   Sets the current record's "GroupCode" collection
 * @method ChartOfAccount      setChartOfAccountGroupCode()                     Sets the current record's "ChartOfAccountGroupCode" collection
 * @method ChartOfAccount      setChartOfAccountValidation()                    Sets the current record's "ChartOfAccountValidation" collection
 * @method ChartOfAccount      setValidation()                                  Sets the current record's "Validation" collection
 * @method ChartOfAccount      setCheckVoucherAccountEntry()                    Sets the current record's "CheckVoucherAccountEntry" collection
 * @method ChartOfAccount      setCheckVoucherAccountEntryOutputVat()           Sets the current record's "CheckVoucherAccountEntryOutputVat" collection
 * @method ChartOfAccount      setAccountsPayableVoucherAccountEntry()          Sets the current record's "AccountsPayableVoucherAccountEntry" collection
 * @method ChartOfAccount      setAccountsPayableVoucherAccountEntryOutputVat() Sets the current record's "AccountsPayableVoucherAccountEntryOutputVat" collection
 * @method ChartOfAccount      setGeneralLedgerBeginningBalance()               Sets the current record's "GeneralLedgerBeginningBalance" collection
 * @method ChartOfAccount      setCashVoucherEntry()                            Sets the current record's "CashVoucherEntry" collection
 * @method ChartOfAccount      setCheckVoucherEntry()                           Sets the current record's "CheckVoucherEntry" collection
 * @method ChartOfAccount      setDebitCreditMemoAccountEntry()                 Sets the current record's "DebitCreditMemoAccountEntry" collection
 * @method ChartOfAccount      setDebitCreditMemoAccountEntryOutputVat()        Sets the current record's "DebitCreditMemoAccountEntryOutputVat" collection
 * @method ChartOfAccount      setFixAssetAccount()                             Sets the current record's "FixAssetAccount" collection
 * @method ChartOfAccount      setJournalBookTemplateEntry()                    Sets the current record's "JournalBookTemplateEntry" collection
 * @method ChartOfAccount      setPrepaymentAccount()                           Sets the current record's "PrepaymentAccount" collection
 * @method ChartOfAccount      setReceiptAccountEntry()                         Sets the current record's "ReceiptAccountEntry" collection
 * @method ChartOfAccount      setReceiptAccountEntryOutputVat()                Sets the current record's "ReceiptAccountEntryOutputVat" collection
 * @method ChartOfAccount      setReceiptCashEntry()                            Sets the current record's "ReceiptCashEntry" collection
 * @method ChartOfAccount      setReceiptCheckEntry()                           Sets the current record's "ReceiptCheckEntry" collection
 * @method ChartOfAccount      setInvoiceAccountEntry()                         Sets the current record's "InvoiceAccountEntry" collection
 * @method ChartOfAccount      setInvoiceAccountEntryOutputVat()                Sets the current record's "InvoiceAccountEntryOutputVat" collection
 * @method ChartOfAccount      setJournalVoucherAccountEntry()                  Sets the current record's "JournalVoucherAccountEntry" collection
 * @method ChartOfAccount      setJournalVoucherAccountEntryOutputVat()         Sets the current record's "JournalVoucherAccountEntryOutputVat" collection
 * @method ChartOfAccount      setPettyCashVoucherAccountEntry()                Sets the current record's "PettyCashVoucherAccountEntry" collection
 * @method ChartOfAccount      setPettyCashVoucherAccountEntryOutputVat()       Sets the current record's "PettyCashVoucherAccountEntryOutputVat" collection
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseChartOfAccount extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('chart_of_account');
        $this->hasColumn('chart_of_account_type_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('code', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'unique' => true,
             'length' => 50,
             ));
        $this->hasColumn('title', 'string', 50, array(
             'type' => 'string',
             'default' => '',
             'length' => 50,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('status', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'ACTIVE',
              1 => 'INACTIVE',
             ),
             'default' => 'ACTIVE',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ChartOfAccountType', array(
             'local' => 'chart_of_account_type_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('GroupCode', array(
             'refClass' => 'ChartOfAccountGroupCode',
             'local' => 'chart_of_account_id',
             'foreign' => 'group_code_id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('ChartOfAccountGroupCode', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('ChartOfAccountValidation', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('Validation', array(
             'refClass' => 'ChartOfAccountValidation',
             'local' => 'chart_of_account_id',
             'foreign' => 'validation_id'));

        $this->hasMany('CheckVoucherAccountEntry', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('CheckVoucherAccountEntryOutputVat', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('AccountsPayableVoucherAccountEntry', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('AccountsPayableVoucherAccountEntryOutputVat', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('GeneralLedgerBeginningBalance', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('CashVoucherEntry', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('CheckVoucherEntry', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('DebitCreditMemoAccountEntry', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('DebitCreditMemoAccountEntryOutputVat', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('FixAssetAccount', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('JournalBookTemplateEntry', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('PrepaymentAccount', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('ReceiptAccountEntry', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('ReceiptAccountEntryOutputVat', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('ReceiptCashEntry', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('ReceiptCheckEntry', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('InvoiceAccountEntry', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('InvoiceAccountEntryOutputVat', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('JournalVoucherAccountEntry', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('JournalVoucherAccountEntryOutputVat', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('PettyCashVoucherAccountEntry', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $this->hasMany('PettyCashVoucherAccountEntryOutputVat', array(
             'local' => 'id',
             'foreign' => 'chart_of_account_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}