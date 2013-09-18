<?php

/**
 * BasePettyCashVoucherAccountEntryOutputVatEntry
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int $petty_cash_voucher_account_entry_output_vat_id
 * @property int $tax_rate_id
 * @property decimal $gross_purchased
 * @property decimal $vat_received
 * @property decimal $net_sales
 * @property PettyCashVoucherAccountEntryOutputVat $PettyCashVoucherAccountEntryOutputVat
 * @property TaxRate $TaxRate
 * 
 * @method int                                        getPettyCashVoucherAccountEntryOutputVatId()        Returns the current record's "petty_cash_voucher_account_entry_output_vat_id" value
 * @method int                                        getTaxRateId()                                      Returns the current record's "tax_rate_id" value
 * @method decimal                                    getGrossPurchased()                                 Returns the current record's "gross_purchased" value
 * @method decimal                                    getVatReceived()                                    Returns the current record's "vat_received" value
 * @method decimal                                    getNetSales()                                       Returns the current record's "net_sales" value
 * @method PettyCashVoucherAccountEntryOutputVat      getPettyCashVoucherAccountEntryOutputVat()          Returns the current record's "PettyCashVoucherAccountEntryOutputVat" value
 * @method TaxRate                                    getTaxRate()                                        Returns the current record's "TaxRate" value
 * @method PettyCashVoucherAccountEntryOutputVatEntry setPettyCashVoucherAccountEntryOutputVatId()        Sets the current record's "petty_cash_voucher_account_entry_output_vat_id" value
 * @method PettyCashVoucherAccountEntryOutputVatEntry setTaxRateId()                                      Sets the current record's "tax_rate_id" value
 * @method PettyCashVoucherAccountEntryOutputVatEntry setGrossPurchased()                                 Sets the current record's "gross_purchased" value
 * @method PettyCashVoucherAccountEntryOutputVatEntry setVatReceived()                                    Sets the current record's "vat_received" value
 * @method PettyCashVoucherAccountEntryOutputVatEntry setNetSales()                                       Sets the current record's "net_sales" value
 * @method PettyCashVoucherAccountEntryOutputVatEntry setPettyCashVoucherAccountEntryOutputVat()          Sets the current record's "PettyCashVoucherAccountEntryOutputVat" value
 * @method PettyCashVoucherAccountEntryOutputVatEntry setTaxRate()                                        Sets the current record's "TaxRate" value
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePettyCashVoucherAccountEntryOutputVatEntry extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('petty_cash_voucher_account_entry_output_vat_entry');
        $this->hasColumn('petty_cash_voucher_account_entry_output_vat_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('tax_rate_id', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('gross_purchased', 'decimal', 12, array(
             'type' => 'decimal',
             'scale' => 2,
             'default' => 0,
             'notnull' => true,
             'length' => 12,
             ));
        $this->hasColumn('vat_received', 'decimal', 12, array(
             'type' => 'decimal',
             'scale' => 2,
             'default' => 0,
             'notnull' => true,
             'length' => 12,
             ));
        $this->hasColumn('net_sales', 'decimal', 12, array(
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
        $this->hasOne('PettyCashVoucherAccountEntryOutputVat', array(
             'local' => 'petty_cash_voucher_account_entry_output_vat_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('TaxRate', array(
             'local' => 'tax_rate_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}