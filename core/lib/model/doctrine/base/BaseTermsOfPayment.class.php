<?php

/**
 * BaseTermsOfPayment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int $title
 * @property int $number_of_days
 * @property Doctrine_Collection $Invoice
 * 
 * @method int                 getTitle()          Returns the current record's "title" value
 * @method int                 getNumberOfDays()   Returns the current record's "number_of_days" value
 * @method Doctrine_Collection getInvoice()        Returns the current record's "Invoice" collection
 * @method TermsOfPayment      setTitle()          Sets the current record's "title" value
 * @method TermsOfPayment      setNumberOfDays()   Sets the current record's "number_of_days" value
 * @method TermsOfPayment      setInvoice()        Sets the current record's "Invoice" collection
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTermsOfPayment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('terms_of_payment');
        $this->hasColumn('title', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('number_of_days', 'int', 11, array(
             'type' => 'int',
             'notnull' => true,
             'default' => 0,
             'length' => 11,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Invoice', array(
             'local' => 'id',
             'foreign' => 'terms_of_payment_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}