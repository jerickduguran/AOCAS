<?php

/**
 * ChartOfAccount
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Zafire Accounting System
 * @subpackage model
 * @author     Jerick Y. Duguran & Mary Ann I. Altar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ChartOfAccount extends BaseChartOfAccount
{ 
	public function __toString()
	{
		return str_pad($this->getCode(),8,0)." - ".$this->getTitle();
	}
	
	public function getEntryType()
	{
		$_type   =  ChartOfAccountType::ENTRY_TYPE_DEBIT;
		
		if($this->getChartOfAccountType()->getCode() == ChartOfAccountType::TYPE_LIABILITY ||
		   $this->getChartOfAccountType()->getCode() == ChartOfAccountType::TYPE_EXPENSE){
		   $_type = ChartOfAccountType::ENTRY_TYPE_CREDIT;
		}  
		return $_type;	
	}
	
	/* ********************************************************************
	 * 
	 *  @author Jerick Y. Duguran
	 *  @date June 20, 2013
	 *  @return  (Boolean) Checks if Account type belongs to 'OUTPUT VAT' Validation 
	 **********************************************************************/
	 
	public function isOutputVat()
	{ 
		if(!$validation = Doctrine_core::getTable("Validation")->findOneByCode(Validation::CODE_TYPE_OUTPUTVAT)){
			return false;
		}
		
	    if(!$record = Doctrine_Core::getTable("ChartOfAccountValidation")->findOneByChartOfAccountIdAndValidationId($this->getId(),$validation->getId())){

			return false;
		}																												 
		return true;
	}
	
	public function isExpandedVat()
	{ 
		if(!$validation = Doctrine_core::getTable("Validation")->findOneByCode(Validation::CODE_TYPE_EXPANDED)){
			return false;
		}
		
	    if(!$record = Doctrine_Core::getTable("ChartOfAccountValidation")->findOneByChartOfAccountIdAndValidationId($this->getId(),$validation->getId())){

			return false;
		}																												 
		return true;
	}
}