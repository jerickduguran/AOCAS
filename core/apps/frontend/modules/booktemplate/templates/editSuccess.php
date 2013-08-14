<?php slot("content_title");?>
Book Template: New
<?php end_slot();?> 
<style>
	ul.checkbox_list li{
		float:left;
		list-style:none;
		width:50%;
	}
	ul.checkbox_list li:after{
		clear:left;
		content: "";
	}
</style>
    <div class="formBodyContent"> 
		<form action="<?php echo url_for("booktemplate/update?id=").$form->getObject()->getId();?>"  method="post" id="form_booktemplate">
				<?php echo $form->renderHiddenFields();?>
        	<h4>Add Book Template</h4> 
                <div class="formControlBtnTop" align="right">
                    <a href="<?php echo url_for("booktemplate/index");?>" class="btnBack">Back</a> 
					<a href="javascript:document.getElementById('form_booktemplate').reset();" class="btnCancel">Reset</a>
					<a href="javascript:void(0);" class="btnSave">Save</a>
					<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>   
                </div>
               	<div class="formControl">
					<div id="error" style="display:none;"></div>
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
                
				<div class="formControl template_entry_list_wrapper">
                        <div class="entryControl">
                            <div class="entryChart3">    
                                <div class="formEntryTitle">
                                    Account Code
                                </div>         
                            </div>
                            <div class="entryChart3">
                                <div class="formEntryTitle">
                                   Gen. Ref
                                </div>                
                            </div>
                            <div class="entryCodeBook">
                                <div class="formEntryTitle">
                                    Debit
                                </div>               
                            </div>
                            <div class="entryCodeBook">
                                <div class="formEntryTitle">
                                    Credit
                                </div>                       
                            </div>
                        </div>
				<!-- ***** DETAILS OF ENTRY HERE ***** -->
				<?php $total_entries = 1;?>
				<?php if(count($form['JournalBookTemplateEntry']) > 0):?>
					<?php foreach($form['JournalBookTemplateEntry'] as $b_entry):?>
							<div class="entryBorder journal_template_entry_row">
								<div class="entryChart3"> 
									<div>
										<div>
											<?php echo $b_entry['chart_of_account_id']->render(array('class'=>'entrySelect'));?>
										</div>  
									</div> 
								</div>                     
								<div class="entryChart3"> 
									<div> 
										<?php echo $b_entry['general_library_id']->render(array('class'=>'entrySelect'));?>
									</div> 
								</div>
								<div class="entryCodeBook">
									<div> 
										<?php echo $b_entry['debit']->render(array('class'=>'entryBox'));?>
									</div>  
								</div>
								<div class="entryCodeBook">
									<div> 
										<?php echo $b_entry['credit']->render(array('class'=>'entryBox'));?>
									</div>  
								</div> 
								<div class="entryAction">									
								<?php if($total_entries != 1):?>
									<a href="javascript:void(0);" class="remove_journalbookentry"><?php echo image_tag("trash.png");?></a>
								<?php endif;?>
								</div> 
							</div>
						<?php $total_entries ++;?>
						<?php endforeach;?>
					<?php else:?>
						<?php $form->addNewAccountEntry(1);?>
						<?php foreach($form['journaltemplate_entries'] as $b_entry):?>
						<div class="entryBorder journal_template_entry_row">
                            <div class="entryChart3"> 
                                <div>
									<div>
										<?php echo $b_entry['chart_of_account_id']->render(array('class'=>'entrySelect'));?>
									</div>  
                                </div> 
                            </div>                     
                            <div class="entryChart3"> 
                                <div> 
									<?php echo $b_entry['general_library_id']->render(array('class'=>'entrySelect'));?>
                                </div> 
                            </div>
                            <div class="entryCodeBook">
                                <div> 
									<?php echo $b_entry['debit']->render(array('class'=>'entryBox'));?>
                                </div>  
                            </div>
                            <div class="entryCodeBook">
                                <div> 
									<?php echo $b_entry['credit']->render(array('class'=>'entryBox'));?>
                                </div>  
                            </div> 
                            <div class="entryAction"> 
								<?php if($total_entries != 1):?>
									<a href="javascript:void(0);" class="remove_journalbookentry"><?php echo image_tag("trash.png");?></a>
								<?php endif;?>
                            </div> 
                        </div>
						<?php $total_entries ++;?>
						<?php endforeach;?>
					<?php endif;?>
					<div class="addLine">
						<a href="javascript:void(0);" class="buttons addnew_accountentry"><u>A</u>dd New Line</a>
						<a href="javascript:void(0);" class="buttons"><u>P</u>review Template</a>
					</div>
                    
                </div>      
        		<div class="formControlBtn" align="right">
                    <a href="<?php echo url_for("booktemplate/index");?>" class="btnBack">Back</a> 
					<a href="javascript:document.getElementById('form_booktemplate').reset();" class="btnCancel">Reset</a>
					<a href="javascript:void(0);" class="btnSave">Save</a>
					<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>    
                </div>
                 
            </div>
            
            <div class="rightBalances">
                <h4>
            	Book Template
                </h4>               
                	                    
                    <div class="rightBalancesHeader">
                    	<div class="rightBalancesHeaderCode">
                    	<strong>Template Name</strong>
                        </div>
                        <div class="rightBalancesHeaderEntry">
                        <strong>Debit</strong>
                        </div>
                        <div class="rightBalancesHeaderEntry">
                        <strong>Credit</strong>
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

<script type="text/javascript">
	$.validator.setDefaults({
		errorElement: 'span'
	}); 
	
    var new_journalbook_entry_count = <?php echo $total_entries;?>;
	
	$(document).ready(function(){ 
		$(".btnSave").click(function(){
			$("form#form_booktemplate").submit();
		});
	
		var validator = $("form#form_booktemplate").validate({		 
			rules: {		
				'<?php echo $form['code']->renderName();?>': {
						  required: true, 
						  remote: {
								url: "<?php echo url_for("booktemplate/checkcode");?>",
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
				'<?php echo $form['project_id']->renderName();?>': "required",
				'<?php echo $form['department_id']->renderName();?>': "required", 
			},
			messages: {
				'<?php echo $form['code']->renderName();?>': {required:"*Required",remote:'*Already in used.'}, 
				'<?php echo $form['name']->renderName();?>': "*Required", 
				'<?php echo $form['journal_book_list']->renderName();?>': "*Required", 		 
				'<?php echo $form['project_id']->renderName();?>': "*Required", 
				'<?php echo $form['department_id']->renderName();?>': "*Required", 
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
		
		$(".addnew_accountentry").click(function(e){
			addNewJournalBookTemplateEntry(new_journalbook_entry_count); 
		});
		
	
	});
	
	function addNewJournalBookTemplateEntry()
	{
		$.ajax({
				url: '<?php echo url_for("booktemplate/addJournalBookTemplateEntry?num=");?>'+ (new_journalbook_entry_count),
				type: 'POST',
				dataType: 'json',
				success: function(resp){ 
					var response_data = eval(resp);
					if(response_data.added)
					{  
						new_journalbook_entry_count = new_journalbook_entry_count + 1;	
						setLastOccurenceContent("template_entry_list_wrapper","journal_template_entry_row",response_data.new);
						$('.remove_journalbookentry').unbind('click');
						removeNewJournalBookTemplateEntry();
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

	var removeNewJournalBookTemplateEntry = function(){
		$('.remove_journalbookentry').click(function(e){
			e.preventDefault();
			$(this).parent().parent().remove();
		})
	};
	removeNewJournalBookTemplateEntry();
</script> 