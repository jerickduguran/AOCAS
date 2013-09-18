<?php

/**
 * BaseTermsOfPayment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property int $number_of_days
 * @property Doctrine_Collection $AccountsPayableVoucher
 * @property Doctrine_Collection $Invoice
 * 
 * @method string              getTitle()                  Returns the current record's "title" value
 * @method int                 getNumberOfDays()           Returns the current record's "number_of_days" value
 * @method Doctrine_Collection getAccountsPayableVoucher() Returns the current record's "AccountsPayableVoucher" collection
 * @method Doctrine_Collection getInvoice()                Returns the current record's "Invoice" collection
 * @method TermsOfPayment      setTitle()                  Sets the current record's "title" value
 * @method TermsOfPayment      setNumberOfDays()           Sets the current record's "number_of_days" value
 * @method TermsOfPayment      setAccountsPayableVoucher() Sets the current record's "AccountsPayableVoucher" collection
 * @method TermsOfPayment      setInvoice()                Sets the current record's "Invoice" collection
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
        $this->hasColumn('title', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'length' => 150,
             ));
        $this->hasColumn('number_of_days', 'int', 5, array(
             'type' => 'int',
             'notnull' => true,
             'default' => 0,
             'length' => 5,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('AccountsPayableVoucher', array(
             'local' => 'id',
             'foreign' => 'terms_of_payment_id'));

        $this->hasMany('Invoice', array(
             'local' => 'id',
             'foreign' => 'terms_of_payment_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}