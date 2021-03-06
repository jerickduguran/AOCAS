<?php

/**
 * BaseInvoiceParticularEntry
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int $invoice_id
 * @property string $title
 * @property decimal $amount
 * @property enum $vat_application
 * @property int $tax_expanded_withheld_id
 * @property int $tax_final_withheld_id
 * @property decimal $total
 * @property Invoice $Invoice
 * @property TaxExpandedWithheld $TaxExpandedWithheld
 * @property TaxFinalWithheld $TaxFinalWithheld
 * 
 * @method int                    getInvoiceId()                Returns the current record's "invoice_id" value
 * @method string                 getTitle()                    Returns the current record's "title" value
 * @method decimal                getAmount()                   Returns the current record's "amount" value
 * @method enum                   getVatApplication()           Returns the current record's "vat_application" value
 * @method int                    getTaxExpandedWithheldId()    Returns the current record's "tax_expanded_withheld_id" value
 * @method int                    getTaxFinalWithheldId()       Returns the current record's "tax_final_withheld_id" value
 * @method decimal                getTotal()                    Returns the current record's "total" value
 * @method Invoice                getInvoice()                  Returns the current record's "Invoice" value
 * @method TaxExpandedWithheld    getTaxExpandedWithheld()      Returns the current record's "TaxExpandedWithheld" value
 * @method TaxFinalWithheld       getTaxFinalWithheld()         Returns the current record's "TaxFinalWithheld" value
 * @method InvoiceParticularEntry setInvoiceId()                Sets the current record's "invoice_id" value
 * @method InvoiceParticularEntry setTitle()                    Sets the current record's "title" value
 * @method InvoiceParticularEntry setAmount()                   Sets the current record's "amount" value
 * @method InvoiceParticularEntry setVatApplication()           Sets the current record's "vat_application" value
 * @method InvoiceParticularEntry setTaxExpandedWithheldId()    Sets the current record's "tax_expanded_withheld_id" value
 * @method InvoiceParticularEntry setTaxFinalWithheldId()       Sets the current record's "tax_final_withheld_id" value
 * @method InvoiceParticularEntry setTotal()                    Sets the current record's "total" value
 * @method InvoiceParticularEntry setInvoice()                  Sets the current record's "Invoice" value
 * @method InvoiceParticularEntry setTaxExpandedWithheld()      Sets the current record's "TaxExpandedWithheld" value
 * @method InvoiceParticularEntry setTaxFinalWithheld()         Sets the current record's "TaxFinalWithheld" value
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseInvoiceParticularEntry extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('invoice_particular_entry');
        $this->hasColumn('invoice_id', 'int', 11, array(
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
        $this->hasOne('Invoice', array(
             'local' => 'invoice_id',
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