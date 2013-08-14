 <?php slot("content_title");?>
Tax Rate: New
<?php end_slot();?> 
 <div class="formBodyContent"> 
		<form action="<?php echo url_for("taxrate/create");?>"  method="post" id="form_taxrate">
				<?php echo $form->renderHiddenFields();?>
        	<h4>Add Tax Rate</h4> 
                <div class="formControlBtnTop" align="right">
                    <a href="<?php echo url_for("taxrate/index");?>" class="btnBack">Back</a> 
					<a href="javascript:document.getElementById('form_taxrate').reset();" class="btnCancel">Reset</a>
					<a href="javascript:void(0);" class="btnSave">Save</a>
					<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>   
                </div>
				
               	<div class="formControl">
					<div id="error" style="display:none;"></div>
				</div> 
               
                <div class="formControl">
       				<div class="formControlTitle">Old Rate</div>
                	<div>
                    	<input type="text" class="formControlCode" placeholder="not editable" disabled="disabled"/>
                    </div>
                    <div class="formControlDesc">
                    	Old Tax Rate
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">New Rate</div>
                	<div> 
						<?php echo $form['rate']->render(array("class"=>"formControlCode"));?>
                    </div>
                    <div class="formControlDesc">
                    	New tax rate
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Effectivity Date</div>
                	<div> 
						<?php echo $form['effectivity_date']->render(array("class"=>"formControlCode"));?>
                    </div>
                    <div class="formControlDesc">
                    	Date of the start of new rate
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Kinds of Rate</div>
                	<div> 
						<?php echo $form['type']->render(array("class"=>"formControlSelect"));?> 
                    </div>
                    <div class="formControlDesc">
                    	Kinds of Rate
                    </div>
                </div>      
                
        		<div class="formControlBtn" align="right">
                    <a href="<?php echo url_for("taxrate/index");?>" class="btnBack">Back</a> 
					<a href="javascript:document.getElementById('form_taxrate').reset();" class="btnCancel">Reset</a>
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
		$("#<?php echo $form['effectivity_date']->renderId();?>").datepicker({dateFormat: "yy/mm/dd"});
		$(".btnSave").click(function(){
			$("form#form_taxrate").submit();
		});
	
	var validator = $("form#form_taxrate").validate({		 
		rules: {		 
			'<?php echo $form['rate']->renderName();?>': "required",
			'<?php echo $form['effectivity_date']->renderName();?>': "required",
			'<?php echo $form['type']->renderName();?>': "required"
		},
		messages: { 
			'<?php echo $form['rate']->renderName();?>': "*Required", 
			'<?php echo $form['effectivity_date']->renderName();?>': "*Required", 
			'<?php echo $form['type']->renderName();?>': "*Required"
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