<?php slot("content_title");?>
Particular Template : New
<?php end_slot();?> 
<style>
	ul.checkbox_list li{
		float:left;
		list-style:none;
		width:50%;
:	ul.checkbox_list li:after{
		clear:left;
		content: "";
	}
</style>

	<form action="<?php echo url_for("@particulartemplate_update?id=".$form->getObject()->getId());?>"  method="post" id="form_particulartemplate">
		<?php echo $form->renderHiddenFields();?>
<div class="formBodyContent">
        	<h4>Edit Particular Template</h4>
            
                <div class="formControlBtnTop" align="right">
                    <a href="<?php echo url_for("@particulartemplate");?>" class="btnBack">Back</a> 
					<a href="javascript:document.getElementById('form_particulartemplate').reset();" class="btnCancel">Reset</a>
					<a href="javascript:void(0);" class="btnSave">Save</a>
					<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>       
                </div>
                
                <div class="formControl">
       				<div class="formControlTitle">Code</div>
                	<div> 
						<?php echo $form['code']->render(array('class'=>'formControlCode'));?>
                    </div>
                    <div class="formControlDesc">
                    	Enter code of this template
                    </div>
                </div>                
                
                <div class="formControl">
       				<div class="formControlTitle">Name</div>
                	<div> 
						<?php echo $form['name']->render(array('class'=>'formControlBox'));?>
                    </div>
                    <div class="formControlDesc">
                    Description or name of this template
                    </div>
                </div>
                <div class="formControl">
       				<div class="formControlTitle">Header</div>
                	<div> 
						<?php echo $form['header_message']->render(array('class'=>'formControlTextarea'));?>
                    </div>
                    <div class="formControlDesc">
						Header Content
                    </div>
                </div>
                
				  <div class="formControl">
       				<div class="formControlTitle">Footer</div>
                	<div> 
						<?php echo $form['footer_message']->render(array('class'=>'formControlTextarea'));?>
                    </div>
                    <div class="formControlDesc">
                    Footer Content
                    </div>
                </div>
                <div class="formControl">
       				<div class="formControlTitle">Journal Book</div>
                	<div class=""> 
						<?php echo $form['journal_book_list']->render();?>
                    </div>        
					<div style="clear:both;"></div>
                </div>
                         
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
                
               <div class="formControl">
                    
                    <div class="particularHeaderTemplate">
							<div class="formControlTitle">
								Header 
								<?php echo $form['header_message']->render(array('class'=>'entryParticularTextarea1'));?>
							</div>
							
							<div class="formControlTitle">
								Footer 
								<?php echo $form['footer_message']->render(array('class'=>'entryParticularTextarea1'));?>
							</div>
						
						
						
							<div class="entryControl">
								<div class="entryChart2">    
									<div class="formEntryTitle">
										Title
									</div>         
								</div>
								<div class="entryDC">
									<div class="formEntryTitle">
										Amount
									</div>                
								</div>
								<div class="entryCode1">
									<div class="formEntryTitle">
										VAT
									</div>               
								</div>
								<div class="entryCode1">
									<div class="formEntryTitle">
										EWT
									</div>                       
								</div>
								<div class="entryCode1">
									<div class="formEntryTitle">
										ATC
									</div>     
								</div>
								<div class="entryDC">
									<div class="formEntryTitle">
										Total
									</div>            
								</div>
								<div class="entryAction">
									<div class="formEntryTitle">
										
									</div>            
								</div>
							</div>
							<div class="template_entry_list_wrapper">
								 <?php if(count($form['ParticularTemplateEntry']) > 0):?>
										<?php $total_part = 0;?>
										<?php foreach($form['ParticularTemplateEntry'] as $p_entry_form):?>
											<?php $total_part++;?>
												<div class="entryBorder particular_template_entry_row">
													<div class="entryChart2">  
														<?php echo $p_entry_form['title']->render(array('class'=>'entryBox part_title'));?>
													</div>                     
													<div class="entryDC">  
														<?php echo $p_entry_form['amount']->render(array('class'=>'entryBox part_amount'));?>
													</div>
													<div class="entryCode1"> 
														<?php echo $p_entry_form['vat_application']->render(array('class'=>'entrySelect part_vat'));?>
													</div>
													<div class="entryCode1"> 
														<?php echo $p_entry_form['tax_expanded_withheld_id']->render(array('class'=>'entrySelect part_ewt'));?>
													</div>
													<div class="entryCode1"> 
														<?php echo $p_entry_form['tax_final_withheld_id']->render(array('class'=>'entrySelect part_atc'));?>
													</div>
													<div class="entryDC"> 
														<?php echo $p_entry_form['total']->render(array('class'=>'entryBox part_atc','readonly'=>'readonly'));?>											
													</div> 
													<div class="entryAction">
														<?php if($total_part != 1):?>
															<a href="javascript:void(0);" class="remove_partivulartemplate_entry"><?php echo image_tag("trash.png");?></a>
														<?php endif;?>
													</div> 
												</div>
											<?php endforeach;?>
									<?php else:?>
										<?Php $form->addNewParticularTemplateEntry(1);?>  
										<?php $total_part = 0;?>
										<?php foreach($form['particular_entries'] as $p_entry_form):?>
											<?php $total_part++;?>
												<div class="entryBorder particular_template_entry_row">
													<div class="entryChart2">  
														<?php echo $p_entry_form['title']->render(array('class'=>'entryBox part_title'));?>
													</div>                     
													<div class="entryDC">  
														<?php echo $p_entry_form['amount']->render(array('class'=>'entryBox part_amount'));?>
													</div>
													<div class="entryCode1"> 
														<?php echo $p_entry_form['vat_application']->render(array('class'=>'entrySelect part_vat'));?>
													</div>
													<div class="entryCode1"> 
														<?php echo $p_entry_form['tax_expanded_withheld_id']->render(array('class'=>'entrySelect part_ewt'));?>
													</div>
													<div class="entryCode1"> 
														<?php echo $p_entry_form['tax_final_withheld_id']->render(array('class'=>'entrySelect part_atc'));?>
													</div>
													<div class="entryDC"> 
														<?php echo $p_entry_form['total']->render(array('class'=>'entryBox part_atc','readonly'=>'readonly'));?>											
													</div> 
													<div class="entryAction">
														<?php if($total_part != 1):?>
															<a href="javascript:void(0);" class="remove_partivulartemplate_entry"><?php echo image_tag("trash.png");?></a>
														<?php endif;?>
													</div> 
												</div>
											<?php endforeach;?>
									<?php endif;?>
							</div>
							<div class="addLine">
								<a href="javascript:void(0);" class="buttons addPartEntry"><u>A</u>dd New Line</a>
								<a href="javascript:void(0);" class="buttons"><u>P</u>review Particular</a>
							</div>
						</div>
                    </div>  
                
        		<div class="formControlBtn" align="right">
					<a href="<?php echo url_for("@particulartemplate");?>" class="btnBack">Back</a> 
					<a href="javascript:document.getElementById('form_particulartemplate').reset();" class="btnCancel">Reset</a>
					<a href="javascript:void(0);" class="btnSave">Save</a>
					<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>     
                </div>
                 
            </div>
   </form>         
            <div class="rightBalances">
                <h4>
            	Particular Template
                </h4>               
                	                    
                    <div class="rightBalancesHeader">
                    	<div class="rightBalancesHeaderCode">
                    	<strong>Template Name</strong>
                        </div>
                        <div class="rightBalancesHeaderEntry">
                        <strong>Journal Book</strong>
                        </div>
                        <div class="rightBalancesHeaderEntry">
                        <strong>Department</strong>
                        </div>
                    </div>
                    
                    <div class="rightBalancesHeader">
                    	<div class="rightBalancesCode">
                    	009 - Asset
                   	 	</div>
                        <div class="rightBalancesAmount">
                        Book 2
                        </div>
                        <div class="rightBalancesAmount">
                        Operations
                        </div>
                    </div>
                    
                    <div class="rightBalancesHeader">
                    	<div class="rightBalancesCode">
                    	003 - Liabilities
                   	 	</div>
                        <div class="rightBalancesAmount">
                        Book 1
                        </div>
                        <div class="rightBalancesAmount">
                        Accounting
                        </div>
                    </div>
                    
            </div>

<script type="text/javascript">
	$.validator.setDefaults({
		errorElement: 'span'
	}); 
	
    var new_particular_entry_count = <?php echo $total_part;?>;
	
	$(document).ready(function(){ 
		$(".btnSave").click(function(){
			$("form#form_particulartemplate").submit();
		});
		
		var validator = $("form#form_particulartemplate").validate({		 
			rules: {		
				'<?php echo $form['code']->renderName();?>': {
						  required: true, 
						  remote: {
								url: "<?php echo url_for("particulartemplate/checkcode");?>",
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
				'<?php echo $form['journal_book_list']->renderName();?>': "required",
				'<?php echo $form['particulars']->renderName();?>': "required"
			},
			messages: {
				'<?php echo $form['code']->renderName();?>': {required:"*Required",remote:'*Already in used.'}, 
				'<?php echo $form['name']->renderName();?>': "*Required", 
				'<?php echo $form['journal_book_list']->renderName();?>': "*Required",
				'<?php echo $form['particulars']->renderName();?>': "*Required"
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

	
		$(".addPartEntry").click(function(e){
			addNewParticularTemplateEntry(new_particular_entry_count); 
		});
 
	
	});
	
	function addNewParticularTemplateEntry()
	{
			$.ajax({
					url: '<?php echo url_for("particulartemplate/addParticularTemplateEntry?num=");?>'+ (new_particular_entry_count + 1),
					type: 'POST',
					dataType: 'json',
					success: function(resp){ 
						var response_data = eval(resp);
						if(response_data.added)
						{  
							new_particular_entry_count = new_particular_entry_count + 1;	
							setLastOccurenceContent("template_entry_list_wrapper","particular_template_entry_row",response_data.new);
							$('.remove_particulartemplate_entry').unbind('click');
							removeNewParticularTemplate();
						}
					} 
				});
	}	
	
	function setLastOccurenceContent(_parent, type,content)
	{ 
		if($("."+_parent+"").find("div."+type+":last").length > 0){
			$("."+_parent+"").find("div."+type+":last").after(content);
		}else{
			$("."+_parent+"").find("div.entryControl").after(content);
		} 
	}
	
	var removeNewParticularTemplate = function(){
	  $('.remove_particulartemplate_entry').click(function(e){
		e.preventDefault();
		$(this).parent().parent().remove();
	  })
	};
</script> 