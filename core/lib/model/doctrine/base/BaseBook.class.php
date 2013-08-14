<?php

/**
 * BaseBook
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $code
 * @property string $name
 * @property string $description
 * @property Doctrine_Collection $CheckVoucher
 * @property Doctrine_Collection $Invoice
 * @property Doctrine_Collection $Receipt
 * 
 * @method string              getCode()         Returns the current record's "code" value
 * @method string              getName()         Returns the current record's "name" value
 * @method string              getDescription()  Returns the current record's "description" value
 * @method Doctrine_Collection getCheckVoucher() Returns the current record's "CheckVoucher" collection
 * @method Doctrine_Collection getInvoice()      Returns the current record's "Invoice" collection
 * @method Doctrine_Collection getReceipt()      Returns the current record's "Receipt" collection
 * @method Book                setCode()         Sets the current record's "code" value
 * @method Book                setName()         Sets the current record's "name" value
 * @method Book                setDescription()  Sets the current record's "description" value
 * @method Book                setCheckVoucher() Sets the current record's "CheckVoucher" collection
 * @method Book                setInvoice()      Sets the current record's "Invoice" collection
 * @method Book                setReceipt()      Sets the current record's "Receipt" collection
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBook extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('book');
        $this->hasColumn('code', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'unique' => true,
             'length' => 50,
             ));
        $this->hasColumn('name', 'string', 50, array(
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
        $this->hasMany('CheckVoucher', array(
             'local' => 'id',
             'foreign' => 'book_id'));

        $this->hasMany('Invoice', array(
             'local' => 'id',
             'foreign' => 'book_id'));

        $this->hasMany('Receipt', array(
             'local' => 'id',
             'foreign' => 'book_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}