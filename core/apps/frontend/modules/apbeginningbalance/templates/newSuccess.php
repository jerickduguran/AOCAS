<?php slot("content_title");?>
Accounts Payable - Beginning Balance
<?php end_slot();?>

	<form action="<?php echo url_for("apbeginningbalance/create");?>"  method="post" id="form_apbeginningbalance">
		<?php echo $form->renderHiddenFields();?>
				<div class="formBodyContent">
				<h4>Enter Payable beginning balances schedule</h4> 
				<div class="formControlBtnTop" align="right"> 
					<a href="<?php echo url_for("apbeginningbalance/index");?>" class="btnBack">Back</a> 
					<a href="javascript:document.getElementById('form_apbeginningbalance').reset();" class="btnCancel">Reset</a>
					<a href="javascript:void(0);" class="btnSave">Save</a>
					<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>    
				</div>
				
				<div class="formControl">
					<div id="error" style="display:none;"></div>
				</div>
            	<div class="formControl-2">
       				<div class="formControlTitle">Date</div>
                	<div> 
						<?php echo $form['start_date']->render(array('class'=>"formControlCode"));?>
                    </div>
                    <div class="formControlDesc">
                    	Enter start date of your account opening balances
                    </div>
                </div>
                
                <div class="formControl-2">
       				<div class="formControlTitle">Received Date</div>
                	<div>
						<?php echo $form['receive_date']->render(array('class'=>"formControlCode"));?>
                    </div>
                    <div class="formControlDesc">
                    	Enter receive date of your account opening balances
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Bill Number</div>
                	<div> 
						<?php echo $form['bill_number']->render(array('class'=>"formControlCode"));?>
                    </div>
                    <div class="formControlDesc">
                    	Enter billing code/number
                    </div>
                </div>                
                
                <div class="formControl">
       				<div class="formControlTitle">Currency</div>
                	<div>  
						<?php echo $form['currency_id']->render(array('class'=>"formControlSelect"));?>
                    </div>
                    <div class="formControlDesc">
                    Currency used for this opening balance
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Amount</div>
                	<div> 
						<?php echo $form['amount']->render(array('class'=>"formControlCode"));?>
                    </div>
                    <div class="formControlDesc">
                    	Enter exact amount
                    </div>
                </div>
                
                
                <div class="formControl">
       				<div class="formControlTitle">Amount in words</div>
                	<div>
                    	<input type="text" class="formControlBox" id="amount_in_words" disabled="disabled"/> 
                    </div>
                    <div class="formControlDesc">
                    	Enter amount in words
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Particulars</div>
                	<div> 
						<?php echo $form['particulars']->render(array('class'=>"formControlTextarea"));?>
                    </div>
                    <div class="formControlDesc">
                    	Particulars here
                    </div>
                </div>
                
                <hr />
                
                <div class="formControl">
       				<div class="formControlTitle">Project</div>
                	<div> 
						<?php echo $form['project_id']->render(array('class'=>"formControlSelect"));?>
                    </div>
                    <div class="formControlDesc">
                    Project of this entry
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Department</div>
                	<div>
						<?php echo $form['department_id']->render(array('class'=>"formControlSelect"));?> 
                    </div>
                    <div class="formControlDesc">
                    Department of this entry
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Gen Ref</div>
                	<div> 
						<?php echo $form['general_library_id']->render(array('class'=>"formControlSelect"));?>
                    </div>
                    <div class="formControlDesc">
                    Choose from general libraries
                    </div>
                </div>                   
				
					<div class="formControlBtn" align="right"> 
						<a href="<?php echo url_for("apbeginningbalance/index");?>" class="btnBack">Back</a> 
						<a href="javascript:document.getElementById('form_apbeginningbalance').reset();" class="btnCancel">Reset</a>
						<a href="javascript:void(0);" class="btnSave">Save</a>
						<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>    
					</div>
                 
            </div>
            
            <div class="rightBalances">
                <h4>
            	Beginning Balances for Accounts Payable
                </h4>               
                	<div class="rightBalancesFix">
                    	Date: Dec. 2013
                    </div>
                    <div class="rightBalancesFix">
                    	Currency: PHP
                    </div>
                    
                    <div class="rightBalancesHeader">
                    	<div class="rightBalancesHeaderSchedCode">
                    	<strong>Bill No.</strong>
                        </div>
                        <div class="rightBalancesHeaderSched">
                        <strong>Account </strong>
                        </div>
                        <div class="rightBalancesHeaderSched">
                        <strong>Name</strong>
                        </div>
                        <div class="rightBalancesHeaderDR">
                        <strong>Debit</strong>
                        </div>
                    </div>
                    
                    <div class="rightBalancesHeader">
                    	<div class="rightBalancesSchedCode">
                    	0091
                   	 	</div>
                        <div class="rightBalancesSched">
                        009
                        </div>
                        <div class="rightBalancesSched">
                        Supplier
                        </div>
                        <div class="rightBalancesDR">
                        0.00
                        </div>
                    </div>
                    
                    <div class="rightBalancesHeader">
                    	<div class="rightBalancesSchedCode">
                    	0091
                   	 	</div>
                        <div class="rightBalancesSched">
                        009
                        </div>
                        <div class="rightBalancesSched">
                        Supplier
                        </div>
                        <div class="rightBalancesDR">
                        0.00
                        </div>
                    </div>
                    
                    <div class="rightBalancesHeader">
                    	<div class="rightBalancesTotal">
                    	TOTAL 
                   	 	</div>
                        <div class="rightBalancesTotalAmount">
                        =
                        </div>
                        <div class="rightBalancesTotalAmount">
                        0.00
                        </div>
                    </div>
                    
            </div>
	</form>

<script type="text/javascript">
	
	$.validator.setDefaults({
		errorElement: 'span'
	});
	
	$(document).ready(function(){ 
	
		$("#<?php echo $form['start_date']->renderId();?>").datepicker({dateFormat: 'yy-mm-dd'});
		$("#<?php echo $form['receive_date']->renderId();?>").datepicker({dateFormat: 'yy-mm-dd'});
		
		$("#<?php echo $form['amount']->renderId();?>").gcrossNumberToWords();
	
		$(".btnSave").click(function(){
			$("form#form_apbeginningbalance").submit();
		});
	
		var validator = $("form#form_apbeginningbalance").validate({		 
		rules: { 
			'<?php echo $form['start_date']->renderName();?>': "required",
			'<?php echo $form['receive_date']->renderName();?>': "required",
			'<?php echo $form['bill_number']->renderName();?>': "required",
			'<?php echo $form['currency_id']->renderName();?>': "required",
			'<?php echo $form['amount']->renderName();?>': "required",
			'<?php echo $form['particulars']->renderName();?>': "required",
			'<?php echo $form['project_id']->renderName();?>': "required",
			'<?php echo $form['department_id']->renderName();?>': "required",
			'<?php echo $form['general_library_id']->renderName();?>': "required"
		},
		messages: { 
			'<?php echo $form['start_date']->renderName();?>': "*Required",
			'<?php echo $form['receive_date']->renderName();?>': "*Required",
			'<?php echo $form['bill_number']->renderName();?>': "*Required",
			'<?php echo $form['currency_id']->renderName();?>': "*Required",
			'<?php echo $form['amount']->renderName();?>': "*Required",
			'<?php echo $form['particulars']->renderName();?>': "*Required",
			'<?php echo $form['project_id']->renderName();?>': "*Required",
			'<?php echo $form['department_id']->renderName();?>': "*Required",
			'<?php echo $form['general_library_id']->renderName();?>': "*Required"
		},
		errorPlacement: function(error, element) {
			if ( element.is(":radio") )
				error.appendTo( element.parent().next().next() );
			else if ( element.is(":checkbox") )
				error.appendTo ( element.next() );
			else
				error.appendTo( element.parent().next() );
		},
		invalidHandler: function(e, validator) {console.log('called');
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
					? 'You missed 1 field. It has been highlighted below'
					: 'You missed ' + errors + ' fields.  They have been highlighted below';
				$("div#error").html(message);
				$("div#error").show();
			} else {
				$("div#error").hide();
			}
		}, 
		// set this class to error-labels to indicate valid fields
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("checked");
		},
		highlight: function( element, errorClass, validClass ) {
			if ( element.type === "radio" ) {
				this.findByName(element.name).addClass(errorClass).removeClass(validClass);
			} else {
				$(element).addClass(errorClass).removeClass(validClass);
			}
		}
	});

	
	
	});
</script>