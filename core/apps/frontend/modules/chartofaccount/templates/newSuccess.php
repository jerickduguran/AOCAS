<?php slot("content_title");?>
Chart Of Accounts
<?php end_slot();?>
<div class="formBodyContent">
	<form action="<?php echo url_for("chartofaccount/create");?>"  method="post" id="form_chartofaccount">
		<?php echo $form->renderHiddenFields();?>
        	<h4>Add New Account</h4>
            	<div class="formControl">
					<div id="error" style="display:none;"></div>
				</div>
            	<div class="formControl">
       				<div class="formControlTitle">Code</div>
                	<div> 
						<?php echo $form['code']->render(array('class'=>'formControlCode'));?>
                    </div>
                    <div class="formControlDesc">
                    	A unique code/number for this account (limited to 8 characters)
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Name</div>
                	<div> 
						<?php echo $form['title']->render(array("class"=>"formControlBox"));?>
                    </div>
                    <div class="formControlDesc">
                    A short title for this account (limited to 100 characters)
                    </div>
                </div> 
				
                <div class="formControl">
       				<div class="formControlTitle">Class</div>
                	<div>  
						<?php echo $form['chart_of_account_type_id']->render(array("class"=>"formControlBox"));?>
                    </div>
                    <div class="formControlDesc">Description</div>
                </div>
				
                 <div class="formControl" id="validation_list"></div> 
				
                <div class="formControl">
       				<div class="formControlTitle">Description</div>
                	<div><?php echo $form['description']->render(array("class"=>"formControlTextarea"));?></div>
                    <div class="formControlDesc">
                    A description of how this account should be used
                    </div>
                </div>
                 
                <div class="formControl">
       				<div class="formControlTitle">Group Codes</div>
                	<div>
						<?php echo $form['group_code_list']->render(array("class"=>"formControlSelect"));?>
                    </div>
                    <div class="formControlDesc">Description</div>
                </div>
				
        		<div class="formControlBtn" align="right">
                	
        			<a href="javascript:void(0);" class="btnSave">Save</a>
       				<a href="javascript:document.getElementById('form_chartofaccount').reset();" class="btnCancel">Reset</a>  
       				<a href="<?php echo url_for("chartofaccount/index");?>" class="btnCancel">Cancel</a>  
                    
                </div>
     </form>           
</div>
<script type="text/javascript">
	 $.validator.setDefaults({
		errorElement: 'span'
	});
	$(document).ready(function(){ 
		$(".btnSave").click(function(){
			$("form#form_chartofaccount").submit();
		});
	
	var validator = $("form#form_chartofaccount").validate({		 
		rules: {		
			'<?php echo $form['code']->renderName();?>': {
					  required: true, 
					  remote: {
							url: "<?php echo url_for("chartofaccount/checkcode");?>",
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
			'<?php echo $form['title']->renderName();?>': "required",
			'<?php echo $form['description']->renderName();?>': "required"
		},
		messages: {
			'<?php echo $form['code']->renderName();?>': {required:"*Required",remote:'*Already in used.'}, 
			'<?php echo $form['title']->renderName();?>': "*Required", 
			'<?php echo $form['description']->renderName();?>': "*Required"
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

	
	$('#<?php echo $form['chart_of_account_type_id']->renderId();?>').change(function(){
		if($(this).val() !=''){
			$.ajax({
				url: '<?php echo url_for("chartofaccount/validationlists?type=");?>'+$(this).val(),
				type: 'POST',
				dataType: 'json',
				success: function(resp){ 
					var response_data = eval(resp);
					if(response_data.total_count > 0){ 
						$('#validation_list').html(response_data.details); 
					}else{
						$('#validation_list').empty();
					}
				} 
			});
			
		}
	
	});
	
	
	
	});
</script>
<div class="rightGraph">    
<?php echo image_tag("sampleGraph.jpg");?>
</div>