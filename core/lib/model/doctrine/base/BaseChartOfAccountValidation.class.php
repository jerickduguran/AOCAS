<?php

/**
 * BaseChartOfAccountValidation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int $chart_of_account_id
 * @property int $validation_id
 * @property ChartOfAccount $ChartOfAccount
 * @property Validation $Validation
 * 
 * @method int                      getChartOfAccountId()    Returns the current record's "chart_of_account_id" value
 * @method int                      getValidationId()        Returns the current record's "validation_id" value
 * @method ChartOfAccount           getChartOfAccount()      Returns the current record's "ChartOfAccount" value
 * @method Validation               getValidation()          Returns the current record's "Validation" value
 * @method ChartOfAccountValidation setChartOfAccountId()    Sets the current record's "chart_of_account_id" value
 * @method ChartOfAccountValidation setValidationId()        Sets the current record's "validation_id" value
 * @method ChartOfAccountValidation setChartOfAccount()      Sets the current record's "ChartOfAccount" value
 * @method ChartOfAccountValidation setValidation()          Sets the current record's "Validation" value
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseChartOfAccountValidation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('chart_of_account_validation');
        $this->hasColumn('chart_of_account_id', 'int', 11, array(
             'type' => 'int',
             'primary' => true,
             'length' => 11,
             ));
        $this->hasColumn('validation_id', 'int', 11, array(
             'type' => 'int',
             'primary' => true,
             'length' => 11,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ChartOfAccount', array(
             'local' => 'chart_of_account_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Validation', array(
             'local' => 'validation_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}