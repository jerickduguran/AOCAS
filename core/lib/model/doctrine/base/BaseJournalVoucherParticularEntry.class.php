<?php

/**
 * BaseJournalVoucherParticularEntry
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int $journal_voucher_id
 * @property string $title
 * @property decimal $amount
 * @property enum $vat_application
 * @property int $tax_expanded_withheld_id
 * @property int $tax_final_withheld_id
 * @property decimal $total
 * @property JournalVoucher $JournalVoucher
 * @property TaxExpandedWithheld $TaxExpandedWithheld
 * @property TaxFinalWithheld $TaxFinalWithheld
 * 
 * @method int                           getJournalVoucherId()         Returns the current record's "journal_voucher_id" value
 * @method string                        getTitle()                    Returns the current record's "title" value
 * @method decimal                       getAmount()                   Returns the current record's "amount" value
 * @method enum                          getVatApplication()           Returns the current record's "vat_application" value
 * @method int                           getTaxExpandedWithheldId()    Returns the current record's "tax_expanded_withheld_id" value
 * @method int                           getTaxFinalWithheldId()       Returns the current record's "tax_final_withheld_id" value
 * @method decimal                       getTotal()                    Returns the current record's "total" value
 * @method JournalVoucher                getJournalVoucher()           Returns the current record's "JournalVoucher" value
 * @method TaxExpandedWithheld           getTaxExpandedWithheld()      Returns the current record's "TaxExpandedWithheld" value
 * @method TaxFinalWithheld              getTaxFinalWithheld()         Returns the current record's "TaxFinalWithheld" value
 * @method JournalVoucherParticularEntry setJournalVoucherId()         Sets the current record's "journal_voucher_id" value
 * @method JournalVoucherParticularEntry setTitle()                    Sets the current record's "title" value
 * @method JournalVoucherParticularEntry setAmount()                   Sets the current record's "amount" value
 * @method JournalVoucherParticularEntry setVatApplication()           Sets the current record's "vat_application" value
 * @method JournalVoucherParticularEntry setTaxExpandedWithheldId()    Sets the current record's "tax_expanded_withheld_id" value
 * @method JournalVoucherParticularEntry setTaxFinalWithheldId()       Sets the current record's "tax_final_withheld_id" value
 * @method JournalVoucherParticularEntry setTotal()                    Sets the current record's "total" value
 * @method JournalVoucherParticularEntry setJournalVoucher()           Sets the current record's "JournalVoucher" value
 * @method JournalVoucherParticularEntry setTaxExpandedWithheld()      Sets the current record's "TaxExpandedWithheld" value
 * @method JournalVoucherParticularEntry setTaxFinalWithheld()         Sets the current record's "TaxFinalWithheld" value
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseJournalVoucherParticularEntry extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('journal_voucher_particular_entry');
        $this->hasColumn('journal_voucher_id', 'int', 11, array(
             'type' => 'int',
             'notnull' => true,
             'length' => 11,
             ));
        $this->hasColumn('title', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('amount', 'decimal', 12, array(
             'type' => 'decimal',
             'scale' => 2,
             'default' => 0,
             'notnull' => true,
             'length' => 12,
             ));
        $this->hasColumn('vat_application', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'VAT_EXEMPT',
              1 => 'VAT_ZERO_PERCENT',
              2 => 'VAT_INCLUSIVE',
              3 => 'VAT_EXCLUSIVE',
             ),
             'default' => 'VAT_INCLUSIVE',
             ));
        $this->hasColumn('tax_expanded_withheld_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('tax_final_withheld_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('total', 'decimal', 12, array(
             'type' => 'decimal',
             'scale' => 2,
             'default' => 0,
             'notnull' => true,
             'length' => 12,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('JournalVoucher', array(
             'local' => 'journal_voucher_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('TaxExpandedWithheld', array(
             'local' => 'tax_expanded_withheld_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('TaxFinalWithheld', array(
             'local' => 'tax_final_withheld_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}