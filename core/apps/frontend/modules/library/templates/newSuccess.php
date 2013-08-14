<?php slot("content_title");?>
General Library : ADD
<?php end_slot();?> 

<script type="text/javascript">
$(document).ready(function() {

	$(".tab_content").hide();
	$(".tab_content:first").show(); 

	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
});

</script> 

<form action="<?php echo url_for("library/create");?>" method="post" id="form_library">
  <?php echo $form->renderHiddenFields();?>
	<div class="formBodyContent"> 
				<h4>Add General Libraries</h4> 
				<div class="formControl">
					<div id="error" style="display:none;"></div>
				</div>
            	<div class="formControl">
       				<div class="formControlTitle">Code</div>
                	<div> 
						<?php echo $form['code']->render(array('class'=>'formControlCode '));?> 
                    </div>
                    <div class="formControlDesc">
                    	A unique code/number for this account (limited to 8 characters)
                    </div>
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Name</div>
                	<div> 
						<?php echo $form['name']->render(array('class'=>'formControlBox'));?> 
                    </div>
                    <div class="formControlDesc">
                    A short title for this account (limited to 100 characters)
                    </div>
                </div>
             <div>
             
             <div id="container">
				<ul class="tabs"> 
        			<li class="active" rel="tab1"> Main Information</li>
                    <li rel="tab2"> Additional Information</li>
                    <li rel="tab3"> Billing Information</li>
    			</ul>
				
                <div class="tab_container"> 
     				<div id="tab1" class="tab_content"> 
         				<div class="formControl">
       						<div class="formControlTitle">Status</div>
                			<div>  
							<?php echo $form['status_id']->render(array('class'=>'formControlSelect '));?>  
                            </div>
                    		<div class="formControlDesc">
                    			Status of the client/supplier etc.
                    		</div>
                		</div>
                        <div class="formControl">
       						<div class="formControlTitle">Address</div>
                			<div> 
							<?php echo $form['street_1']->render(array('class'=>'formControlBox'));?>  
                   			</div>
                    		<div class="formControlDesc">
                    		(e.g. Building Number, Street)
                    		</div>
                            <div> 
								<?php echo $form['street_2']->render(array('class'=>'formControlBox'));?> 
                   			</div>
                    		<div class="formControlDesc">
                    		City
                    		</div>
                            <div> 
								<?php echo $form['city']->render(array('class'=>'formControlBox'));?> 
                   			</div>
                    		<div class="formControlDesc">
                    		Country
                    		</div>
							<div>
								<?php echo $form['country_id']->render(array('class'=>'formControlSelect '));?>  
							</div>
                		</div>
                        
                        <div class="formControl">
       						<div class="formControlTitle">Attention</div>
                			<div>
                    		<input type="text" class="formControlBox" />
                            </div>
                    		<div class="formControlDesc">
                    			Contact person
                    		</div>
                		</div>
                        
                        <div class="formControl">
       						<div class="formControlTitle">Position</div>
                			<div>
                    		<input type="text" class="formControlBox" />
                            </div>
                    		<div class="formControlDesc">
                    			Position of the contact person
                    		</div>
                		</div>
                        
                        <div class="formControl">
       						<div class="formControlTitle">Telephone No.</div>
                			<div>
                    		<input type="text" class="formControlBox" />
                            </div>
                    		<div class="formControlDesc">
                    			Contact number of the company
                    		</div>
                		</div>
                        
                        <div class="formControl">
       						<div class="formControlTitle">Fax Number</div>
                			<div>
                    		<input type="text" class="formControlBox" />
                            </div>
                    		<div class="formControlDesc">
                    			Number only
                    		</div>
                		</div>
                        
                        <div class="formControl">
       						<div class="formControlTitle">Mobile Number</div>
                			<div> 						
							<?php echo $form['mobile_no']->render(array('class'=>'formControlBox'));?> 
                            </div>
                    		<div class="formControlDesc">
                    			Number only
                    		</div>
                		</div>
                        
                        <div class="formControl">
       						<div class="formControlTitle">Website</div>
                			<div>
                    		<input type="text" class="formControlBox" />
                            </div>
                    		<div class="formControlDesc">
                    			optional only
                    		</div>
                		</div>
                        
                       <div class="formControl">
       						<div class="formControlTitle">Email Address</div>
                			<div> 
								<?php echo $form['email']->render(array('class'=>'formControlBox'));?> 
                            </div>
                    		<div class="formControlDesc"></div>
                		</div>
                        <div class="formControl">
       						<div class="formControlTitle">Category</div>
                			<div> 
								<?php echo $form['category_id']->render(array('class'=>'formControlSelect'));?> 
                            </div>
                    		<div class="formControlDesc">
                    			(e.g. Client, supplier, affiliates)
                    		</div>
                		</div>
     				</div><!-- #tab1 -->
                
     				<div id="tab2" class="tab_content"> 
      					<div class="formControl">
       						<div class="formControlTitle">TIN Number</div>
                			<div>
								<?php echo $form['additional_info']['tin']->render(array('class'=>'formControlBox'));?> 
                            </div>
                    		<div class="formControlDesc">
                    			(limited of 12 numbers only)
                    		</div>
                		</div> 
                        <div class="formControl">
       						<div class="formControlTitle">Industry</div>
                			<div> 
								<?php echo $form['additional_info']['industry_id']->render(array('class'=>'formControlSelect'));?> 
                            </div>
                    		<div class="formControlDesc">
                    			Contact person
                    		</div>
                		</div>
                        
                        <div class="formControl">
       						<div class="formControlTitle">Tax Rate</div>
                			<div>
                    		<input type="text" class="formControlBox" />
                            </div>
                    		<div class="formControlDesc">
                    			EWT/ATC Code
                    		</div>
                		</div>
                        
                        <div class="formControl">
       						<div class="formControlTitle">Discount %</div>
                			<div>
                    		<input type="text" class="formControlBox" />
                            </div>
                    		<div class="formControlDesc">
                    			This default discount rate can be overridden on individual transactions
                    		</div>
                		</div>
     				</div><!-- #tab2 -->
                    
     				<div id="tab3" class="tab_content"> 
                        <div class="formControl">
       						<div class="formControlTitle">Drawing Number</div>
                			<div>
                    		<input type="text" class="formControlBox" />
                            </div>
                    		<div class="formControlDesc">
                    			Not limited to 100 characters
                    		</div>
                		</div>
                        <div class="formControl">
       						<div class="formControlTitle">Specs Number</div>
                			<div>
                    		<input type="text" class="formControlBox" />
                            </div>
                    		<div class="formControlDesc">
                    			Number only
                    		</div>
                		</div>
                        <div class="formControl">
       						<div class="formControlTitle">Bill to</div>
                			<div>
                    		<input type="text" class="formControlBox" />
                            </div>
                    		<div class="formControlDesc">
                    			Company Name
                    		</div>
                		</div>
                        <div class="formControl">
       						<div class="formControlTitle">Address</div>
                			<div>
                    		<input type="text" class="formControlBox" />
                            </div>
                    		<div class="formControlDesc">
                    			Address of billing
                    		</div>
                		</div>
                        <div class="formControl">
       						<div class="formControlTitle">Attention</div>
                			<div>
                    		<input type="text" class="formControlBox" />
                            </div>
                    		<div class="formControlDesc">
                    			Contact for the bill
                    		</div>
                		</div>
     				</div><!-- #tab3 -->
 				</div> <!-- .tab_container --> 
			</div> <!-- #container -->
                    
                <div class="formControlBtn" align="right">                	   
					<a href="javascript:void(0);" class="btnSave">Save</a>
					<a href="javascript:document.getElementById('form_project').reset();" class="btnCancel">Reset</a>  
					<a href="<?php echo url_for("@library");?>" class="btnCancel">Cancel</a>   					
                </div> 
            </div>
            
        </div>
</form>   
<script type="text/javascript">
	$(document).ready(function(){
		$.validator.setDefaults({
			errorElement: 'span'
		});

		$(".btnSave").click(function(){
			$("form#form_library").submit();
		});

		var validator = $("form#form_library").validate({	
			ignore:"",		
			rules: {		
				'<?php echo $form['code']->renderName();?>': {
						  required: true, 
						  remote: {
								url: "<?php echo url_for("library/checkcode");?>",
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
				'<?php echo $form['name']->renderName();?>': "required",
				'<?php echo $form['status_id']->renderName();?>': "required",
				'<?php echo $form['street_1']->renderName();?>': "required",
				'<?php echo $form['email']->renderName();?>': {email:true,required: true},
				'<?php echo $form['city']->renderName();?>': "required",
				'<?php echo $form['category_id']->renderName();?>': "required",
				'<?php echo $form['additional_info']['tin']->renderName();?>': "required",
				'<?php echo $form['additional_info']['industry_id']->renderName();?>': "required"
			},
			messages: {
				'<?php echo $form['code']->renderName();?>': {required:"*Required",remote:'*Already in used.'}, 
				'<?php echo $form['name']->renderName();?>': "*Required", 
				'<?php echo $form['status_id']->renderName();?>': "*Required", 
				'<?php echo $form['street_1']->renderName();?>': "*Required", 
				'<?php echo $form['email']->renderName();?>': {required:"*Required",email:"*Please enter a valid email"}, 
				'<?php echo $form['city']->renderName();?>': "*Required",
				'<?php echo $form['category_id']->renderName();?>': "*Required",
				'<?php echo $form['additional_info']['tin']->renderName();?>': "*Required",
				'<?php echo $form['additional_info']['industry_id']->renderName();?>': "*Required"
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
    
            <div class="rightGraph">
            	TOTAL OF CLIENTS - 100<br />
                TOTAL SUPPLIER - 90<br />
                TOTAL AFFILIATES - 10
            </div>