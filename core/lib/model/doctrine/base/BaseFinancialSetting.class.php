<?php

/**
 * BaseFinancialSetting
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int $currency_id
 * @property int $financial_yearend_day
 * @property int $financial_yearend_month
 * @property Currency $Currency
 * 
 * @method int              getCurrencyId()              Returns the current record's "currency_id" value
 * @method int              getFinancialYearendDay()     Returns the current record's "financial_yearend_day" value
 * @method int              getFinancialYearendMonth()   Returns the current record's "financial_yearend_month" value
 * @method Currency         getCurrency()                Returns the current record's "Currency" value
 * @method FinancialSetting setCurrencyId()              Sets the current record's "currency_id" value
 * @method FinancialSetting setFinancialYearendDay()     Sets the current record's "financial_yearend_day" value
 * @method FinancialSetting setFinancialYearendMonth()   Sets the current record's "financial_yearend_month" value
 * @method FinancialSetting setCurrency()                Sets the current record's "Currency" value
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFinancialSetting extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('financial_setting');
        $this->hasColumn('currency_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('financial_yearend_day', 'int', 2, array(
             'type' => 'int',
             'length' => 2,
             ));
        $this->hasColumn('financial_yearend_month', 'int', 2, array(
             'type' => 'int',
             'length' => 2,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Currency', array(
             'local' => 'currency_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}