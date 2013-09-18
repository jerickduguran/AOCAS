<?php

/**
 * BaseDebitCreditMemo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int $book_id
 * @property string $voucher_number
 * @property int $general_library_id
 * @property int $currency_id
 * @property date $period
 * @property string $header_message
 * @property string $footer_message
 * @property decimal $total_amount
 * @property enum $status
 * @property Book $Book
 * @property GeneralLibrary $GeneralLibrary
 * @property Currency $Currency
 * @property Doctrine_Collection $DebitCreditMemoParticularEntry
 * @property Doctrine_Collection $DebitCreditMemoAccountEntry
 * 
 * @method int                 getBookId()                         Returns the current record's "book_id" value
 * @method string              getVoucherNumber()                  Returns the current record's "voucher_number" value
 * @method int                 getGeneralLibraryId()               Returns the current record's "general_library_id" value
 * @method int                 getCurrencyId()                     Returns the current record's "currency_id" value
 * @method date                getPeriod()                         Returns the current record's "period" value
 * @method string              getHeaderMessage()                  Returns the current record's "header_message" value
 * @method string              getFooterMessage()                  Returns the current record's "footer_message" value
 * @method decimal             getTotalAmount()                    Returns the current record's "total_amount" value
 * @method enum                getStatus()                         Returns the current record's "status" value
 * @method Book                getBook()                           Returns the current record's "Book" value
 * @method GeneralLibrary      getGeneralLibrary()                 Returns the current record's "GeneralLibrary" value
 * @method Currency            getCurrency()                       Returns the current record's "Currency" value
 * @method Doctrine_Collection getDebitCreditMemoParticularEntry() Returns the current record's "DebitCreditMemoParticularEntry" collection
 * @method Doctrine_Collection getDebitCreditMemoAccountEntry()    Returns the current record's "DebitCreditMemoAccountEntry" collection
 * @method DebitCreditMemo     setBookId()                         Sets the current record's "book_id" value
 * @method DebitCreditMemo     setVoucherNumber()                  Sets the current record's "voucher_number" value
 * @method DebitCreditMemo     setGeneralLibraryId()               Sets the current record's "general_library_id" value
 * @method DebitCreditMemo     setCurrencyId()                     Sets the current record's "currency_id" value
 * @method DebitCreditMemo     setPeriod()                         Sets the current record's "period" value
 * @method DebitCreditMemo     setHeaderMessage()                  Sets the current record's "header_message" value
 * @method DebitCreditMemo     setFooterMessage()                  Sets the current record's "footer_message" value
 * @method DebitCreditMemo     setTotalAmount()                    Sets the current record's "total_amount" value
 * @method DebitCreditMemo     setStatus()                         Sets the current record's "status" value
 * @method DebitCreditMemo     setBook()                           Sets the current record's "Book" value
 * @method DebitCreditMemo     setGeneralLibrary()                 Sets the current record's "GeneralLibrary" value
 * @method DebitCreditMemo     setCurrency()                       Sets the current record's "Currency" value
 * @method DebitCreditMemo     setDebitCreditMemoParticularEntry() Sets the current record's "DebitCreditMemoParticularEntry" collection
 * @method DebitCreditMemo     setDebitCreditMemoAccountEntry()    Sets the current record's "DebitCreditMemoAccountEntry" collection
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDebitCreditMemo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('debit_credit_memo');
        $this->hasColumn('book_id', 'int', 11, array(
             'type' => 'int',
             'notnull' => true,
             'default' => '0',
             'length' => 11,
             ));
        $this->hasColumn('voucher_number', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'unique' => true,
             'length' => 50,
             ));
        $this->hasColumn('general_library_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('currency_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('period', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('header_message', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('footer_message', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('total_amount', 'decimal', 12, array(
             'type' => 'decimal',
             'scale' => 2,
             'default' => 0,
             'notnull' => true,
             'length' => 12,
             ));
        $this->hasColumn('status', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'UNPAID',
              1 => 'PARTIAL_PAID',
              2 => 'FULL_PAID',
             ),
             'default' => 'UNPAID',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Book', array(
             'local' => 'book_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('GeneralLibrary', array(
             'local' => 'general_library_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('Currency', array(
             'local' => 'currency_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasMany('DebitCreditMemoParticularEntry', array(
             'local' => 'id',
             'foreign' => 'debit_credit_memo_id'));

        $this->hasMany('DebitCreditMemoAccountEntry', array(
             'local' => 'id',
             'foreign' => 'debit_credit_memo_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}