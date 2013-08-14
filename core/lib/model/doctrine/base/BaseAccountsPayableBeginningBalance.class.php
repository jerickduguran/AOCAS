<?php

/**
 * BaseAccountsPayableBeginningBalance
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $currency_id
 * @property integer $general_library_id
 * @property integer $project_id
 * @property integer $department_id
 * @property date $start_date
 * @property date $receive_date
 * @property string $bill_number
 * @property decimal $amount
 * @property string $particulars
 * @property GeneralLibrary $GeneralLibrary
 * @property Project $Project
 * @property Department $Department
 * @property Currency $Currency
 * 
 * @method integer                         getCurrencyId()         Returns the current record's "currency_id" value
 * @method integer                         getGeneralLibraryId()   Returns the current record's "general_library_id" value
 * @method integer                         getProjectId()          Returns the current record's "project_id" value
 * @method integer                         getDepartmentId()       Returns the current record's "department_id" value
 * @method date                            getStartDate()          Returns the current record's "start_date" value
 * @method date                            getReceiveDate()        Returns the current record's "receive_date" value
 * @method string                          getBillNumber()         Returns the current record's "bill_number" value
 * @method decimal                         getAmount()             Returns the current record's "amount" value
 * @method string                          getParticulars()        Returns the current record's "particulars" value
 * @method GeneralLibrary                  getGeneralLibrary()     Returns the current record's "GeneralLibrary" value
 * @method Project                         getProject()            Returns the current record's "Project" value
 * @method Department                      getDepartment()         Returns the current record's "Department" value
 * @method Currency                        getCurrency()           Returns the current record's "Currency" value
 * @method AccountsPayableBeginningBalance setCurrencyId()         Sets the current record's "currency_id" value
 * @method AccountsPayableBeginningBalance setGeneralLibraryId()   Sets the current record's "general_library_id" value
 * @method AccountsPayableBeginningBalance setProjectId()          Sets the current record's "project_id" value
 * @method AccountsPayableBeginningBalance setDepartmentId()       Sets the current record's "department_id" value
 * @method AccountsPayableBeginningBalance setStartDate()          Sets the current record's "start_date" value
 * @method AccountsPayableBeginningBalance setReceiveDate()        Sets the current record's "receive_date" value
 * @method AccountsPayableBeginningBalance setBillNumber()         Sets the current record's "bill_number" value
 * @method AccountsPayableBeginningBalance setAmount()             Sets the current record's "amount" value
 * @method AccountsPayableBeginningBalance setParticulars()        Sets the current record's "particulars" value
 * @method AccountsPayableBeginningBalance setGeneralLibrary()     Sets the current record's "GeneralLibrary" value
 * @method AccountsPayableBeginningBalance setProject()            Sets the current record's "Project" value
 * @method AccountsPayableBeginningBalance setDepartment()         Sets the current record's "Department" value
 * @method AccountsPayableBeginningBalance setCurrency()           Sets the current record's "Currency" value
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAccountsPayableBeginningBalance extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('accounts_payable_beginning_balance');
        $this->hasColumn('currency_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('general_library_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('project_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('department_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('start_date', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('receive_date', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('bill_number', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'length' => 50,
             ));
        $this->hasColumn('amount', 'decimal', 12, array(
             'type' => 'decimal',
             'scale' => 2,
             'default' => 0,
             'notnull' => true,
             'length' => 12,
             ));
        $this->hasColumn('particulars', 'string', null, array(
             'type' => 'string',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('GeneralLibrary', array(
             'local' => 'general_library_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('Project', array(
             'local' => 'project_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('Department', array(
             'local' => 'department_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('Currency', array(
             'local' => 'currency_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}