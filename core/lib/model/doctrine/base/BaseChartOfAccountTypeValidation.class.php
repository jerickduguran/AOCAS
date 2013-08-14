<?php

/**
 * BaseChartOfAccountTypeValidation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int $chart_of_account_type_id
 * @property int $validation_id
 * @property ChartOfAccountType $ChartOfAccountType
 * @property Validation $Validation
 * 
 * @method int                          getChartOfAccountTypeId()     Returns the current record's "chart_of_account_type_id" value
 * @method int                          getValidationId()             Returns the current record's "validation_id" value
 * @method ChartOfAccountType           getChartOfAccountType()       Returns the current record's "ChartOfAccountType" value
 * @method Validation                   getValidation()               Returns the current record's "Validation" value
 * @method ChartOfAccountTypeValidation setChartOfAccountTypeId()     Sets the current record's "chart_of_account_type_id" value
 * @method ChartOfAccountTypeValidation setValidationId()             Sets the current record's "validation_id" value
 * @method ChartOfAccountTypeValidation setChartOfAccountType()       Sets the current record's "ChartOfAccountType" value
 * @method ChartOfAccountTypeValidation setValidation()               Sets the current record's "Validation" value
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseChartOfAccountTypeValidation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('chart_of_account_type_validation');
        $this->hasColumn('chart_of_account_type_id', 'int', 11, array(
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
        $this->hasOne('ChartOfAccountType', array(
             'local' => 'chart_of_account_type_id',
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