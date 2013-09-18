<?php

/**
 * BasePettyCashVoucher
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int $book_id
 * @property string $voucher_number
 * @property int $general_library_id
 * @property int $currency_id
 * @property date $replenishment_date
 * @property date $period
 * @property string $header_message
 * @property string $footer_message
 * @property decimal $total_amount
 * @property enum $status
 * @property Book $Book
 * @property GeneralLibrary $GeneralLibrary
 * @property Currency $Currency
 * @property Doctrine_Collection $PettyCashVoucherParticularEntry
 * @property Doctrine_Collection $PettyCashVoucherAccountEntry
 * 
 * @method int                 getBookId()                          Returns the current record's "book_id" value
 * @method string              getVoucherNumber()                   Returns the current record's "voucher_number" value
 * @method int                 getGeneralLibraryId()                Returns the current record's "general_library_id" value
 * @method int                 getCurrencyId()                      Returns the current record's "currency_id" value
 * @method date                getReplenishmentDate()               Returns the current record's "replenishment_date" value
 * @method date                getPeriod()                          Returns the current record's "period" value
 * @method string              getHeaderMessage()                   Returns the current record's "header_message" value
 * @method string              getFooterMessage()                   Returns the current record's "footer_message" value
 * @method decimal             getTotalAmount()                     Returns the current record's "total_amount" value
 * @method enum                getStatus()                          Returns the current record's "status" value
 * @method Book                getBook()                            Returns the current record's "Book" value
 * @method GeneralLibrary      getGeneralLibrary()                  Returns the current record's "GeneralLibrary" value
 * @method Currency            getCurrency()                        Returns the current record's "Currency" value
 * @method Doctrine_Collection getPettyCashVoucherParticularEntry() Returns the current record's "PettyCashVoucherParticularEntry" collection
 * @method Doctrine_Collection getPettyCashVoucherAccountEntry()    Returns the current record's "PettyCashVoucherAccountEntry" collection
 * @method PettyCashVoucher    setBookId()                          Sets the current record's "book_id" value
 * @method PettyCashVoucher    setVoucherNumber()                   Sets the current record's "voucher_number" value
 * @method PettyCashVoucher    setGeneralLibraryId()                Sets the current record's "general_library_id" value
 * @method PettyCashVoucher    setCurrencyId()                      Sets the current record's "currency_id" value
 * @method PettyCashVoucher    setReplenishmentDate()               Sets the current record's "replenishment_date" value
 * @method PettyCashVoucher    setPeriod()                          Sets the current record's "period" value
 * @method PettyCashVoucher    setHeaderMessage()                   Sets the current record's "header_message" value
 * @method PettyCashVoucher    setFooterMessage()                   Sets the current record's "footer_message" value
 * @method PettyCashVoucher    setTotalAmount()                     Sets the current record's "total_amount" value
 * @method PettyCashVoucher    setStatus()                          Sets the current record's "status" value
 * @method PettyCashVoucher    setBook()                            Sets the current record's "Book" value
 * @method PettyCashVoucher    setGeneralLibrary()                  Sets the current record's "GeneralLibrary" value
 * @method PettyCashVoucher    setCurrency()                        Sets the current record's "Currency" value
 * @method PettyCashVoucher    setPettyCashVoucherParticularEntry() Sets the current record's "PettyCashVoucherParticularEntry" collection
 * @method PettyCashVoucher    setPettyCashVoucherAccountEntry()    Sets the current record's "PettyCashVoucherAccountEntry" collection
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePettyCashVoucher extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('petty_cash_voucher');
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
        $this->hasColumn('replenishment_date', 'date', null, array(
             'type' => 'date',
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

        $this->hasMany('PettyCashVoucherParticularEntry', array(
             'local' => 'id',
             'foreign' => 'petty_cash_voucher_id'));

        $this->hasMany('PettyCashVoucherAccountEntry', array(
             'local' => 'id',
             'foreign' => 'petty_cash_voucher_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}