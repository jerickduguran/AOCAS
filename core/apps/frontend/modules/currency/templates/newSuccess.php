<?php slot("content_title");?>
Currency - New
<?php end_slot();?>

	<form action="<?php echo url_for("currency/create");?>"  method="post" id="form_currency">
		<?php echo $form->renderHiddenFields();?>
        	<div class="formBodyContent">
        	<h4>Add New Currency</h4>
				<div class="formControlBtnTop" align="right"> 
					<a href="<?php echo url_for("currency/index");?>" class="btnBack">Back</a> 
					<a href="javascript:document.getElementById('form_currency').reset();" class="btnCancel">Reset</a>
					<a href="javascript:void(0);" class="btnSave">Save</a>
					<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>    
				</div>
				
				<div class="formControl">
					<div id="error" style="display:none;"></div>
				</div>
            	<div class="formControl">
       				<div class="formControlTitle">Symbol</div>
                	<div> 
						<?php echo $form['symbol']->render(array('class'=>'formControlCode'));?>
                    </div>
                    <div class="formControlDesc">
                    	A unique code/number for this currency (limited to 8 characters)
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Name</div>
                	<div> 
						<?php echo $form['title']->render(array('class'=>'formControlBox'));?>
                    </div>
                    <div class="formControlDesc">
                    A short title for this currency (limited to 100 characters)
                    </div>
                </div> 
				
                <div class="formControl">
       				<div class="formControlTitle">Description</div>
                	<div> 
						<?php echo $form['description']->render(array('class'=>'formControlBox'));?>
                    </div>
                    <div class="formControlDesc">
                    A short title for this currency (limited to 100 characters)
                    </div>
                </div> 
                
                <div class="formControl">
       				<div class="formControlTitle">Rate</div>
                	<div> 
						<?php echo $form['unit_per_base']->render(array('class'=>'formControlBox'));?>
                    </div>
                    <div class="formControlDesc">
                    Based on USD rate
                    </div>
                </div> 
                
        		<div class="formControlBtn" align="right"> 
					<a href="<?php echo url_for("currency/index");?>" class="btnBack">Back</a> 
					<a href="javascript:document.getElementById('form_currency').reset();" class="btnCancel">Reset</a>
					<a href="javascript:void(0);" class="btnSave">Save</a>
					<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>   
                </div>
                 
            </div>
            
            <div class="rightGraph">
            	Currency equivalent here
            </div>
		</form>

<script type="text/javascript">
	
	$.validator.setDefaults({
		errorElement: 'span'
	});
	
	$(document).ready(function(){   
	
		$(".btnSave").click(function(){
			$("form#form_currency").submit();
		});
	
		var validator = $("form#form_currency").validate({		 
		rules: {		
			'<?php echo $form['symbol']->renderName();?>': {
					  required: true, 
					  remote: {
							url: "<?php echo url_for("currency/checksymbol");?>",
							type: "post",
							data: {
							  orig_symbol:  '<?php echo $form->getObject()->getSymbol();?>',
							  symbol: function()
							  {
								return $("#<?php echo $form['symbol']->renderId();?>").val()
							  }
							}
						  }
					  }, 
			'<?php echo $form['title']->renderName();?>': "required",
			'<?php echo $form['description']->renderName();?>': "required",
			'<?php echo $form['unit_per_base']->renderName();?>': "required"
		},
		messages: {
			'<?php echo $form['symbol']->renderName();?>': {required:"*Required",remote:'*Already in used.'}, 
			'<?php echo $form['description']->renderName();?>': "*Required",
			'<?php echo $form['unit_per_base']->renderName();?>': "*Required"
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
		}
	});

	
	
	});
</script>