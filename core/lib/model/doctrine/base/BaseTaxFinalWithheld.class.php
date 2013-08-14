<?php

/**
 * BaseTaxFinalWithheld
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $code
 * @property string $nature_income_payment
 * @property decimal $tax_rate_percent
 * @property Doctrine_Collection $CheckVoucherParticularEntry
 * @property Doctrine_Collection $InvoiceParticularEntry
 * @property Doctrine_Collection $ParticularTemplateEntry
 * @property Doctrine_Collection $ReceiptParticularEntry
 * 
 * @method string              getCode()                        Returns the current record's "code" value
 * @method string              getNatureIncomePayment()         Returns the current record's "nature_income_payment" value
 * @method decimal             getTaxRatePercent()              Returns the current record's "tax_rate_percent" value
 * @method Doctrine_Collection getCheckVoucherParticularEntry() Returns the current record's "CheckVoucherParticularEntry" collection
 * @method Doctrine_Collection getInvoiceParticularEntry()      Returns the current record's "InvoiceParticularEntry" collection
 * @method Doctrine_Collection getParticularTemplateEntry()     Returns the current record's "ParticularTemplateEntry" collection
 * @method Doctrine_Collection getReceiptParticularEntry()      Returns the current record's "ReceiptParticularEntry" collection
 * @method TaxFinalWithheld    setCode()                        Sets the current record's "code" value
 * @method TaxFinalWithheld    setNatureIncomePayment()         Sets the current record's "nature_income_payment" value
 * @method TaxFinalWithheld    setTaxRatePercent()              Sets the current record's "tax_rate_percent" value
 * @method TaxFinalWithheld    setCheckVoucherParticularEntry() Sets the current record's "CheckVoucherParticularEntry" collection
 * @method TaxFinalWithheld    setInvoiceParticularEntry()      Sets the current record's "InvoiceParticularEntry" collection
 * @method TaxFinalWithheld    setParticularTemplateEntry()     Sets the current record's "ParticularTemplateEntry" collection
 * @method TaxFinalWithheld    setReceiptParticularEntry()      Sets the current record's "ReceiptParticularEntry" collection
 * 
 * @package    Gcross Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTaxFinalWithheld extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tax_final_withheld');
        $this->hasColumn('code', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'unique' => true,
             'length' => 50,
             ));
        $this->hasColumn('nature_income_payment', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('tax_rate_percent', 'decimal', 4, array(
             'type' => 'decimal',
             'scale' => 2,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('CheckVoucherParticularEntry', array(
             'local' => 'id',
             'foreign' => 'tax_final_withheld_id'));

        $this->hasMany('InvoiceParticularEntry', array(
             'local' => 'id',
             'foreign' => 'tax_final_withheld_id'));

        $this->hasMany('ParticularTemplateEntry', array(
             'local' => 'id',
             'foreign' => 'tax_final_withheld_id'));

        $this->hasMany('ReceiptParticularEntry', array(
             'local' => 'id',
             'foreign' => 'tax_final_withheld_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}