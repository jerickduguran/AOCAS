 <?php slot("content_title");?>
Tax ATC: New
<?php end_slot();?> 
 <div class="formBodyContent"> 
		<form action="<?php echo url_for("taxfinalwithheld/create");?>"  method="post" id="form_tsxfinalwithheld">
				<?php echo $form->renderHiddenFields();?>
        	<h4>Add Tax Rate</h4> 
                <div class="formControlBtnTop" align="right">
                    <a href="<?php echo url_for("taxfinalwithheld/index");?>" class="btnBack">Back</a> 
					<a href="javascript:document.getElementById('form_tsxfinalwithheld').reset();" class="btnCancel">Reset</a>
					<a href="javascript:void(0);" class="btnSave">Save</a>
					<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>   
                </div>
               	<div class="formControl">
					<div id="error" style="display:none;"></div>
				</div> 
                <div class="formControl">
       				<div class="formControlTitle">ATC Code</div>
                	<div> 
						<?php echo $form['code']->render(array('class'=>'formControlCode'));?>
                    </div>
                    <div class="formControlDesc">
                    	Enter code of this ATC
                    </div>
                </div>                
                
                <div class="formControl">
       				<div class="formControlTitle">Nature of Income Payment</div>
                	<div> 
						<?php echo $form['nature_income_payment']->render(array('class'=>'formControlBox'));?>
                    </div>
                    <div class="formControlDesc">
                    Description or name of this template
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Tax Rate in Percentage</div>
                	<div> 
						<?php echo $form['tax_rate_percent']->render(array('class'=>'formControlBox','placeholder'=>'0'));?>
                    </div>
                    <div class="formControlDesc">
                    Rate in percentage for this atc
                    </div>
                </div>
                
                           
                
        		<div class="formControlBtn" align="right">
                    <a href="<?php echo url_for("taxrate/index");?>" class="btnBack">Back</a> 
					<a href="javascript:document.getElementById('form_tsxfinalwithheld').reset();" class="btnCancel">Reset</a>
					<a href="javascript:void(0);" class="btnSave">Save</a>
					<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>       
                </div>
                 
            </div>
            
            <div class="rightBalances">
                <h4>
            	Final Income Taxes Withheld
                </h4>               
                	                    
                    <div class="rightBalancesHeader">
                    	<div class="rightBalancesHeaderCode">
                    	<strong>Nature of Income Payment</strong>
                        </div>
                        <div class="rightBalancesHeaderEntry">
                        <strong>ATC Code</strong>
                        </div>
                        <div class="rightBalancesHeaderEntry">
                        <strong>Tax Rate</strong>
                        </div>
                    </div>
                    
                    <div class="rightBalancesHeader">
                    	<div class="rightBalancesCode">
                    	009 - Asset
                   	 	</div>
                        <div class="rightBalancesAmount">
                        0.00
                        </div>
                        <div class="rightBalancesAmount">
                        - 
                        </div>
                    </div>
                    
                    <div class="rightBalancesHeader">
                    	<div class="rightBalancesCode">
                    	003 - Liabilities
                   	 	</div>
                        <div class="rightBalancesAmount">
                        -
                        </div>
                        <div class="rightBalancesAmount">
                        0.00
                        </div>
                    </div>
                    
            </div>
 </div>

<script type="text/javascript">
	$.validator.setDefaults({
		errorElement: 'span'
	});
	$(document).ready(function(){ 
		$(".btnSave").click(function(){
			$("form#form_tsxfinalwithheld").submit();
		});
	
	var validator = $("form#form_tsxfinalwithheld").validate({		 
		rules: {		
			'<?php echo $form['code']->renderName();?>': {
					  required: true, 
					  remote: {
							url: "<?php echo url_for("taxfinalwithheld/checkcode");?>",
							type: "post",
							data: {
							  orig_code:  '<?php echo $form->getObject()->getCode();?>',
							  code: function()
							  {
								return $("#<?php echo $form['code']->renderId();?>").val()
							  }
							}
						  }
					  }, 
			'<?php echo $form['nature_income_payment']->renderName();?>': "required",
			'<?php echo $form['tax_rate_percent']->renderName();?>': "required"
		},
		messages: {
			'<?php echo $form['code']->renderName();?>': {required:"*Required",remote:'*Already in used.'}, 
			'<?php echo $form['nature_income_payment']->renderName();?>': "*Required", 
			'<?php echo $form['tax_rate_percent']->renderName();?>': "*Required"
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