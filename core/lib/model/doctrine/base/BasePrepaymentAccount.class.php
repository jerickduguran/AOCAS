<?php

/**
 * BasePrepaymentAccount
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int $chart_of_account_id
 * @property string $code
 * @property string $title
 * @property string $description
 * @property ChartOfAccount $ChartOfAccount
 * 
 * @method int               getChartOfAccountId()    Returns the current record's "chart_of_account_id" value
 * @method string            getCode()                Returns the current record's "code" value
 * @method string            getTitle()               Returns the current record's "title" value
 * @method string            getDescription()         Returns the current record's "description" value
 * @method ChartOfAccount    getChartOfAccount()      Returns the current record's "ChartOfAccount" value
 * @method PrepaymentAccount setChartOfAccountId()    Sets the current record's "chart_of_account_id" value
 * @method PrepaymentAccount setCode()                Sets the current record's "code" value
 * @method PrepaymentAccount setTitle()               Sets the current record's "title" value
 * @method PrepaymentAccount setDescription()         Sets the current record's "description" value
 * @method PrepaymentAccount setChartOfAccount()      Sets the current record's "ChartOfAccount" value
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePrepaymentAccount extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('prepayment_account');
        $this->hasColumn('chart_of_account_id', 'int', 11, array(
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
             'length' => 50,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ChartOfAccount', array(
             'local' => 'chart_of_account_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}