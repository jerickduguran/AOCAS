<?php $module = sfContext::getInstance()->getRequest()->getParameter("module","dashboard");?>
<div id='cssmenu'>
	<ul>
	   <li <?php echo decorateMenu('dashboard');?>>   		
			<a href="<?php echo url_for("@dashboard");?>" title="dashboard">
			<span>Dashboard</span></a>
	   </li>
	   
	   <li <?php echo decorateMenu(array('chartofaccount','filesetup','library','code','generalledger','taxrate'),true);?>>
		   <a href=""><span>File Setup</span></a>
		  <ul>
			 <li <?php echo decorateMenu('chartofaccount',true);?>><a href='<?php echo url_for("chartofaccount/index");?>'><span>Chart of Accounts</span></a>
			 </li>
			 <li  <?php echo decorateMenu('library');?>><a href='<?php echo url_for("@library");?>'><span>General Library</span></a>
			 </li>
			 <li class='has-sub '><a href='<?php echo url_for("code/index");?>'><span>Code Setup</span></a>
			 </li> 
			 <li class='has-sub '><a href='<?php echo url_for("beginningbalance/index");?>'><span>Beginning Balances</span></a>
				<ul>
					<li><a href="<?php echo url_for("generalledger/index");?>">GL Beginning Balances</a></li>
					<li class='has-sub '><a href="#">Beginning Balances Schedule</a>
						<ul>
							<li><a href="<?php echo url_for("arbeginningbalance/index");?>">AR Beginning Balance Schedule</a></li>
							<li><a href="<?php echo url_for("apbeginningbalance/index");?>">AP Beginning Balance Schedule</a></li>
							<li><a href="<?php echo url_for("beginningbalance/accountsreceivable");?>">Asset/Expenses Beginning Balance Schedule</a></li>
							<li><a href="<?php echo url_for("beginningbalance/accountsreceivable");?>">Liability/Incom/Capital Beginning Balance Schedule</a></li>
						</ul>
					</li>
					<li class='has-sub '><a href="#">Taxes Beginning Balances</a>
						<ul>
							<li><a href="#">Final Tax Beginning Balance</a></li>
							<li><a href="#">Expanded Withholding Tax Beginning Balance</a></li>
							<li><a href="#">Input/Output Beginning Balance</a></li>
						</ul>
					</li>
					<li class='has-sub '><a href="#">Fixed Asset Beginning Balances</a>
					</li>
					<li class='has-sub '><a href="#">Prepayments Beginning Balances</a>
					</li>
			    </ul>
			 </li>
			 <li class='has-sub '><a href='<?php echo url_for("booktemplate/index");?>'><span>Book Template</span></a>
			 </li>  
			 <li class='has-sub '><a href='<?php echo url_for("@particulartemplate");?>'><span>Particular Templates</span></a>
			 </li>         
			 <li class='has-sub '><a href='<?php echo url_for("bank/index");?>'><span>Banks</span></a>
			 </li>
			 <li class='has-sub '><a href='<?php echo url_for("transactionsetup/index");?>'><span>Transaction Setup</span></a>
			 </li>
			 <li class='has-sub '><a href='<?php echo url_for("currency/index");?>'><span>Currency Setup</span></a>
			 </li>
			 <li class='has-sub '><a href='#'><span>Tax File Setup</span></a>
				<ul>
					<li class='has-sub '><a href="<?php echo url_for("taxfinalwithheld/index");?>">Final Income Taxes Witheld Setup</a>
					</li>
					<li class='has-sub '><a href="<?php echo url_for("taxexpandedwithheld/index");?>">Expanded Tax Withheld Library</a>
					</li>
					<li class='has-sub '><a href="<?php echo url_for("taxrate/index");?>">Input/Output VAT Rate Setup</a>
					</li>
				</ul>
			 </li>
		  </ul>
	   </li>
	   <li <?php echo decorateMenu('transaction',true);?>><a href=''><span>Transactions</span></a>
			<ul>	
				<li><a href="<?php echo url_for("invoice/index");?>">Invoice</a></li>
				<li><a href="<?php echo url_for("or/index");?>">Official Receipt</a></li>
				<li><a href="<?php echo url_for("or/index");?>">Check Voucher</a></li>
				<li><a href="<?php echo url_for("or/index");?>">Journal Voucher</a></li>
				<li><a href="<?php echo url_for("or/index");?>">Accounts Payable Voucher</a></li>
				<li><a href="<?php echo url_for("or/index");?>">Petty Cash Voucher</a></li>
				<li><a href="<?php echo url_for("or/index");?>">Debit Credit Memo</a></li> 
			</ul>
	   </li>
	   <li <?php echo decorateMenu('posting',true);?>><a href=''><span>Posting</span></a>
			<ul>
				<li class='has-sub '><a href='#'><span>GL Posting</span></a>
				</li>
				<li class='has-sub '><a href='#'><span>AR Posting</span></a>
				</li>
				<li class='has-sub '><a href='#'><span>AP Posting</span></a>
				</li>
				<li class='has-sub '><a href='#'><span>ALL Posting</span></a>
				</li>
			</ul>
	   </li>
	   <li class='has-sub '><a href=''><span>Reports</span></a>
			<ul>
				<li><a href="#"><span>General Ledger Reports</span></a></li>
				<li><a href="#"><span>Accounts Receivable Reports</span></a></li>
				<li><a href="#"><span>Accounts Payable Reports</span></a></li>
				<li><a href="#"><span>Other Accounts Reports</span></a></li>
				<li><a href="#"><span>All Books</span></a></li>
				<li><a href="#"><span>Input/Output VAT</span></a></li>
				<li><a href="#"><span>Print Check</span></a></li>
				<li><a href="#"><span>Multi Currency Voucher Reports</span></a></li>
				<li><a href="#"><span>Additional Reports</span></a></li>
				<li><a href="#"><span>Other Reports</span></a></li>
			</ul>
	   </li>
	   <li><a href=''><span>Utilities</span></a></li>
	   <li class='has-sub'><a href=''><span>System Configuration</span></a>
			<ul>
				<li><a href="<?php echo url_for("@setupwizard");?>"><span>Setup Wizard</span></a></li>
			</ul>
	   </li>
	</ul>
	</div>