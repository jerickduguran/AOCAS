<div class="formBodyContent">
				<form action="<?php echo url_for("generalledger/create");?>"  method="post" id="form_generalledger">
					<?php echo $form->renderHiddenFields();?>
				<h4>Add New Ledger</h4> 
				<div class="formControl">
					<div id="error" style="display:none;"></div>
				</div>            
            	<div class="formControl">
       				<div class="formControlTitle">Accounts</div>
                	<div> 
						<?php echo $form['chart_of_account_id']->render(array('class'=>'formControlSelect'));?>
                    </div>
                    <div class="formControlDesc">
                    Chart of Accounts
                    </div>
                </div>
                
                <div class="formControl">
                	<div class="formControlTitle">Entry</div>
                	<div>  
						<?php echo $form['entry_type']->render(array('class'=>'formControlSelect1'));?>
						<?php echo $form['entry_value']->render(array('class'=>'formControlAmount','placeholder'=>'0.00'));?> 
                
                    </div>
                    <div class="formControlDesc">
                    Enter your account balance 
                    </div>
                </div>
                
                <hr />    
                
                <div class="formControl">
       				<div class="formControlTitle">Project</div>
                	<div> 
						<?php echo $form['project_id']->render(array('class'=>'formControlSelect'));?>
                    </div>
                    <div class="formControlDesc">
                    Project of this entry
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Department</div>
                	<div> 
						<?php echo $form['department_id']->render(array('class'=>'formControlSelect'));?>
                    </div>
                    <div class="formControlDesc">
                    Department of this entry
                    </div>
                </div> 
                
        		<div class="formControlBtn" align="right">                	
        			<a href="<?php echo url_for("generalledger/index");?>" class="btnBack">Back</a> 
                    <a href="javascript:document.getElementById('form_generalledger').reset();" class="btnCancel">Reset</a>
        			<a href="javascript:void(0);" class="btnSave">Save</a>
                    <a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>  
                </div> 

<script type="text/javascript">
	$.validator.setDefaults({
		errorElement: 'span'
	});
	$(document).ready(function(){ 
		$("#btnSaveAndContinue").click(function(){
			$("form#form_generalledger").submit();
		});
	
	var validator = $("form#form_generalledger").validate({		 
		rules: { 
			'<?php echo $form['chart_of_account_id']->renderName();?>': {required: true, 
						   remote: {
								url: "<?php echo url_for("generalledger/validateaccounttype");?>",
								type: "post",
								data: {
								  account_type:  function(){ return $("#<?php echo $form['chart_of_account_id']->renderId();?>").val()},
								  entry_type: function(){ return $("#<?php echo $form['entry_type']->renderId();?>").val()},
								  val_type: function(){ return 'account_entry';}
								}
							  }
						  },
			'<?php echo $form['project_id']->renderName();?>': "required",
			'<?php echo $form['department_id']->renderName();?>': "required",
			'<?php echo $form['entry_type']->renderName();?>': {required: true, 
						   remote: {
								url: "<?php echo url_for("generalledger/validateaccounttype");?>",
								type: "post",
								data: {
								  account_type:  function(){ return $("#<?php echo $form['chart_of_account_id']->renderId();?>").val()},
								  entry_type: function(){ return $("#<?php echo $form['entry_type']->renderId();?>").val()},
								  val_type: function(){ return 'entry_account';}
								}
							  }
						  },
			'<?php echo $form['entry_value']->renderName();?>': "required"
			
			
		},
		messages: {
			'<?php echo $form['chart_of_account_id']->renderName();?>': {required: '',remote: 'Please check entry type'}, 
			'<?php echo $form['project_id']->renderName();?>': "*Required", 
			'<?php echo $form['department_id']->renderName();?>': "*Required",
			'<?php echo $form['entry_type']->renderName();?>': {required: '',remote: 'Invalid Type'},
			'<?php echo $form['entry_value']->renderName();?>': ""
		},
		errorPlacement: function(error, element) {
			if ( element.is(":radio") )
				error.appendTo( element.parent().next().next() );
			else if ( element.is(":checkbox") )
				error.appendTo ( element.next() );
			else
				error.appendTo( element.parent().next() );
		},
		invalidHandler: function(e, validator) {
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
		},
	}); 
	});
</script> 