 <?php slot("content_title");?>
Petty cash Voucher : Edit
<?php end_slot();?> 
    <div class="formBodyTransaction">
		<form action="<?php echo url_for("pettycashvoucher/update?id=").$form->getObject()->getId();?>"  method="post" id="form_pc_voucher">
				<?php echo $form->renderHiddenFields();?>
        	<h4>Create New Voucher</h4> 
                <div class="formControlBtnTop" align="right">
                    <a href="<?php echo url_for("pettycashvoucher/index");?>" class="btnBack">Back</a> 
					<a href="javascript:document.getElementById('form_pc_voucher').reset();" class="btnCancel">Reset</a>
					<a href="javascript:void(0);" class="btnSave">Save</a>
					<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>   
                </div> 
            
            	<div class="formTransaction">
                
                	<div class="reference">
						<div class="refBody">
                        	Book: <?php echo $form['book_id']->render(array('readonly'=>'readonly'));?> 
                        </div>
                        <div class="refBody">
                        	Period: <?php echo $form['period']->render(array('readonly'=>'readonly'));?>
                        </div>
                    	<div class="refBody">
                        	References: 
                            <input type="text" readonly disabled value="INCOME BOOK"/>
                        </div>
                    </div>
                
                	<div class="transBodyLeft">
                    
                    	<div class="transBodyContent">
                            <div class="transBodyTitle">
                            	Voucher Number:
                            </div>
                            <div class="transBodyInfo"> 
                                <?php echo $form['voucher_number']->render(array('readonly'=>'readonly'));?>
                            </div>
                        </div>
                        
                        <div class="transBodyContent">
                            <div class="transBodyTitle">
                            	Client Code:
                            </div>
                            <div class="transBodyInfo"> 
                                <?php echo $form['general_library_id']->render();?>
                            </div>
                        </div>
                        
                        <div class="transBodyContent">
                            <div class="transBodyTitle">
                            	Type of Currency:
                            </div>
                            <div class="transBodyInfo"> 
                                <?php echo $form['currency_id']->render();?>
                            </div>
                        </div>
                        
                        <div class="transBodyContent">
                            <div class="transBodyTitle">
                            	Total Amount:
                            </div>
                            <div class="transBodyInfo"> 
                                <?php echo $form['total_amount']->render();?>
                            </div>
                        </div>
                        
                        <div class="transBodyContent">
                            <div class="transBodyTitle">
                           		Amount in Words:
                            </div>
                            <div class="transBodyInfo">
                            	<input type="text" id="total_amount_in_words"/>
                            </div>  
                        </div> 
                                               
                    </div>
                    
                    <div class="transBodyRight">  
                        
                        <div class="transBodyContent">
                            <div class="transBodyTitle">
                           		Replenishment Date:
                            </div>
                            <div class="transBodyInfo">
                                <?php echo $form['replenishment_date']->render();?>
                            </div>  
                        </div>  
                        <div class="transBodyContent">
                            <div class="transBodyTitle">
                           		Status:
                            </div>
                            <div class="transBodyInfo">
								<?php echo $form['status']->render();?>
                            </div>  
                        </div>   
                    </div>
					
					
			<div class="entryForm"> 
                	<div class="formControlTitle">
                		<h2>PARTICULARS</h2>
                    </div>
                    
                    <div class="particularSe">
            			<div class="formControlTitle">
                    		Use Particular Template:      
							<?php echo $form['particular_template']->render(array('class'=>'formTranSelect2'));?>
                		</div>
            		</div>
                    <div class="particularHeader">
                    	<div class="formControlTitle">
                    	Header
						<?php echo $form['header_message']->render(array('class'=>'entryParticularTextarea'));?>
                    	</div>
                    </div>
                    <div class="particularHeader">
                    	<div class="formControlTitle">
                    	Footer
						<?php echo $form['footer_message']->render(array('class'=>'entryParticularTextarea'));?>            
                    	</div>
                    
						<div class="parent_part">
							<div class="entryControl">
								<div class="entryChart">    
									<div class="formEntryTitle">
										Title
									</div>         
								</div>
								<div class="entryCode">
									<div class="formEntryTitle">Amount</div>                
								</div>
								<div class="entryCode">
									<div class="formEntryTitle">VAT</div>               
								</div>
								<div class="entryCode">
									<div class="formEntryTitle">EWT</div>                       
								</div>
								<div class="entryD"> 
									<div class="formEntryTitle">ATC</div>     
								</div>
								<div class="entryD">
									<div class="formEntryTitle">Total</div>            
								</div>
								<div class="entryAction">
									<div class="formEntryTitle"></div>            
								</div>
							</div>
							<?php if(count($form['PettyCashVoucherParticularEntry']) > 0):?>
								<?php $total_part = 0;?>
								<?php foreach($form['PettyCashVoucherParticularEntry'] as $p_entry_form):?>
								<?php $total_part++;?>
									<div class="entryBorder particular_entry_row" id="row-<?php echo $total_part;?>">
										<div class="entryChart"> 
											<div> 
											<?php echo $p_entry_form['title']->render(array('class'=>'entryBox title_entry'));?>
											</div> 
										</div>                     
										<div class="entryCode"> 
											<div> 
											<?php echo $p_entry_form['amount']->render(array('class'=>'entryBox amount_entry','placeholder'=>'0.00'));?>
											</div> 
										</div>
										<div class="entryCode">
											<div> 
												<?php echo $p_entry_form['vat_application']->render(array('class'=>'entrySelect vatapp_entry'));?> 
											</div>  
										</div>
										<div class="entryCode">
											<div> 
											<?php echo $p_entry_form['tax_expanded_withheld_id']->render(array('class'=>'entrySelect ewt_entry'));?>
											
											</div>  
										</div>
										<div class="entryD">
											<div> 
											<?php echo $p_entry_form['tax_final_withheld_id']->render(array('class'=>'entrySelect atc_entry'));?>
											</div> 
										</div>
										<div class="entryD">
											<div>
												<?php echo $p_entry_form['total']->render(array('class'=>'entryBox total_entry'));?>
											</div> 
										</div> 
										<div class="entryAction">
											<?php //echo image_tag("icons/DeleteRed.png");?>
											<?php echo $total_part != 1 ? image_tag("icons/trash.png",array("class" => "removenewparticular")) : '';?>
										</div> 
									</div> 
								<?php endforeach;?>
							<?php else:?>
								<?Php $form->addNewParticularEntry(1);?>  
								<?php $total_part = 0;?>
								<?php foreach($form['particular_entries'] as $p_entry_form):?>
									<?php $total_part++;?>
									<div class="entryBorder particular_entry_row" id="row-<?php echo $total_part;?>">
										<div class="entryChart"> 
											<div> 
											<?php echo $p_entry_form['title']->render(array('class'=>'entryBox title_entry'));?>
											</div> 
										</div>                     
										<div class="entryCode"> 
											<div> 
											<?php echo $p_entry_form['amount']->render(array('class'=>'entryBox amount_entry','placeholder'=>'0.00'));?>
											</div> 
										</div>
										<div class="entryCode">
											<div> 
												<?php echo $p_entry_form['vat_application']->render(array('class'=>'entrySelect vatapp_entry'));?> 
											</div>  
										</div>
										<div class="entryCode">
											<div> 
											<?php echo $p_entry_form['tax_expanded_withheld_id']->render(array('class'=>'entrySelect ewt_entry'));?>
											
											</div>  
										</div>
										<div class="entryD">
											<div> 
											<?php echo $p_entry_form['tax_final_withheld_id']->render(array('class'=>'entrySelect atc_entry'));?>
											</div> 
										</div>
										<div class="entryD">
											<div>
												<?php echo $p_entry_form['total']->render(array('class'=>'entryBox total_entry'));?>
											</div> 
										</div> 
										<div class="entryAction">
											<?php //echo image_tag("icons/DeleteRed.png");?>
											<?php echo $total_part != 1 ? image_tag("icons/DeleteRed.png",array("class" => "removenewparticular")) : '';?>
										</div> 
									</div> 
								<?php endforeach;?>
							<?php endif;?>
							</div>   
							<div class="addLine">
								<a href="javascript:void(0);" class="buttons addPartEntry"><u>A</u>dd New Line</a>
								<a href="javascript:void(0);" class="buttons previewEntry"><u>P</u>review Particular</a>
							</div> 
                    </div>                 
                    
                    
                    </div> 
			<div class="entryForm"> 
                	<div class="formControlTitle">
                		<h2>ACCOUNT ENTRIES</h2>
                    </div>
                    
                    <div class="particularSe">
            			<div class="formControlTitle">
                    		Use Book Template:        
						<?php echo $form['book_template']->render(array('class'=>'formTranSelect2'));?>     
                		</div>
            		</div> 
					<div class="particularHeader">   
						<div class="account_part"> 
							<div class="entryControl">
								<div class="entryChartOR">    
									<div class="formEntryTitle">
										Account Code
									</div>         
								</div>
								<div class="entryChart">
									<div class="formEntryTitle">
										General Reference
									</div>                
								</div> 
								<div class="entryDC"> 
									<div class="formEntryTitle">
										Debit
									</div>     
								</div>
								<div class="entryDC">
									<div class="formEntryTitle">
										Credit
									</div>            
								</div>
								<div class="entryAction">
									<div class="formEntryTitle">
										
									</div>            
								</div>
							</div>
							<?php if(count($form['PettyCashVoucherAccountEntry']) > 0 ):?>
								<?php $total_acct = 0;?>
								<?php foreach($form['PettyCashVoucherAccountEntry'] as $a_enrty_form):?>
									<?php $total_acct ++;?>
									<div class="entryBorder account_entry_row" id="row-<?php echo $total_acct;?>">
										<div class="entryChartOR"> 
											<div> 
											<?php echo $a_enrty_form['chart_of_account_id']->render(array('class'=>'entrySelect'));?> 
											</div> 
										</div>                     
										<div class="entryChart">  
												<?php echo $a_enrty_form['general_library_id']->render(array('class'=>'entrySelect'));?>  
										</div>  
										<div class="entryDC"> 
											<?php echo $a_enrty_form['debit']->render(array('class'=>'entryBox'));?>  
										</div>
										<div class="entryDC"> 
											<?php echo $a_enrty_form['credit']->render(array('class'=>'entryBox'));?>  
										</div>
										<div class="entryAction"> 
												<?php //echo image_tag("icons/DeleteRed.png");?>
										</div> 
									</div>
								<?php endforeach;?> 
							
							<?php else:?> 
									<?Php $form->addNewAccountEntry(1);?>  
									<?php $total_acct = 0;?>
									<?php foreach($form['account_entries'] as $a_enrty_form):?>
										<?php $total_acct++;?>
										<div class="entryBorder account_entry_row" id="row-<?php echo $total_acct;?>">
											<div class="entryChartOR"> 
												<div> 
												<?php echo $a_enrty_form['chart_of_account_id']->render(array('class'=>'entrySelect pettycash-account-entry-coa'));?> 
												</div> 
											</div>                     
											<div class="entryChart">  
													<?php echo $a_enrty_form['general_library_id']->render(array('class'=>'entrySelect'));?>  
											</div> 
											<div class="entryDC"> 
												<?php echo $a_enrty_form['debit']->render(array('class'=>''));?>  
											</div>
											<div class="entryDC"> 
												<?php echo $a_enrty_form['credit']->render(array('class'=>''));?>  
											</div>
											<div class="entryAction"> 
													<?php //echo image_tag("icons/DeleteRed.png");?>
											</div> 
										</div>
									<?php endforeach;?>  
							<?php endif;?>						
							<div class="addLine">
								<a href="javascript:void(0);" class="buttons addAccountEntry"><u>A</u>dd Line</a>
								<a href="javascript:void(0);" class="buttons"><u>P</u>review</a>
							</div>
						</div>
                    </div>
                    
					
					<div class="total">
						<div class="totalTitle">
						Total
						</div>
						<div class="totalDebitCredit">
						0.00
						</div>
						<div class="totalDebitCredit">
						0.00
						</div>
						
						<div class="totalTitleDiff">
						Difference
						</div>
						<div class="totalDebitCreditDiff">
						0.00
						</div>
					</div>
				</div>    
				
                </div>
                    
                    <div class="formControlBtn" align="right">
						<a href="<?php echo url_for("pettycashvoucher/index");?>" class="btnBack">Back</a> 
						<a href="javascript:document.getElementById('form_or').reset();" class="btnCancel">Reset</a>
						<a href="javascript:void(0);" class="btnSave">Save</a>
						<a href="javascript:void(0);" id="btnSaveAndContinue" class="btnSave">Save & Continue</a>   
					</div>   
                
               </form> 
                </div>
				
<div style="display:none;">
	<div class="outputvat_popup"></div>
	<div class="checkentry_popup"></div> 
</div>
<script type="text/javascript">
 
    var new_particular_entry_count = 1;
    var new_account_entry_count    = 1;
 
	$(document).ready(function(){
	
		$("#<?php echo $form['period']->renderId();?>").datepicker({dateFormat: "MM d, yy"}); 
		$("#<?php echo $form['replenishment_date']->renderId();?>").datepicker({dateFormat: "yy-mm-dd"}); 
		$("#<?php echo $form['total_amount']->renderId();?>").gcrossNumberToWords({word_element: 'total_amount_in_words'});	
	
		$.validator.setDefaults({
			errorElement: 'span'
		}); 
		
		$(".btnSave").click(function(){
			$("form#form_pc_voucher").submit();
		}); 
		
		var validator = $("form#form_pc_voucher").validate({		 
			rules: {		
				'<?php echo $form['voucher_number']->renderName();?>': {
						  required: true, 
						  remote: {
								url: "<?php echo url_for("pettycashvoucher/checkvouchernumber");?>",
								type: "post",
								data: {
								  orig_voucher_number:  '<?php echo $form->getObject()->getVoucherNumber();?>',
								  voucher_number: function()
								  {
									return $("#<?php echo $form['voucher_number']->renderId();?>").val()
								  }
								}
							  }
						  }, 
				'<?php echo $form['general_library_id']->renderName();?>': "required",
				'<?php echo $form['currency_id']->renderName();?>': "required",
				'<?php echo $form['total_amount']->renderName();?>': "required"
			},
			messages: {
				'<?php echo $form['voucher_number']->renderName();?>': {required:"*Required",remote:'*Journal Voucher already exist.'}, 
				'<?php echo $form['general_library_id']->renderName();?>': "*Required", 
				'<?php echo $form['currency_id']->renderName();?>': "*Required", 
				'<?php echo $form['total_amount']->renderName();?>': "*Required"
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

		$("#<?php echo $form['particular_template']->renderId();?>").change(function(){
				$.ajax({
					url: '<?php echo url_for("pettycashvoucher/loadParticularTemplate?pid=");?>'+$(this).val(),
					type: 'json',
					method: 'POST',
					success: function(resp){ 
						var response_data = eval(resp);
						if(response_data.status){ 
							$('#<?php echo $form['header_message']->renderId();?>').val(response_data.header); 
							$('#<?php echo $form['footer_message']->renderId();?>').val(response_data.footer);
							$('.parent_part').html(response_data.entries); 
							new_particular_entry_count = response_data.nextCount;
							removeNewParticular();
						}
					} 
				});
		});
		$(".addPartEntry").click(function(e){
			addNewParticularEntry(new_particular_entry_count); 
		});
		
		$(".addAccountEntry").click(function(e){
			addNewAccountEntryField(new_account_entry_count); 
		});
		
		$(".parent_part").delegate("input.amount_entry",'keyup',function(e){
			calculate($(this),'amount_entry'); 
		});
		
		$(".parent_part").delegate(".vatapp_entry",'change',function(e){
			calculate($(this),'vatapp_entry'); 
		});	
		
		$(".parent_part").delegate(".ewt_entry",'change',function(e){
			calculate($(this),'ewt_entry'); 
		});	
		
		$(".parent_part").delegate(".atc_entry",'change',function(e){
			calculate($(this),'atc_entry'); 
		});	
		
		$(".account_part").delegate(".pettycash-account-entry-coa",'change',function(e){ 
			checkAccountType($(this).val());
		}); 
		
			$(".ap_voucher_entry").click(function(){ 
				$.ajax({
					url: '<?php echo url_for("pettycashvoucher/checkentries?cv_id=".$form->getObject()->getId());?>',
					type: 'POST',
					dataType: 'json', 
					success: function(resp){ 
						var resp_data = eval(resp);
						if(resp_data.is_valid){  
							$('.checkentry_popup').html(resp_data.content); 
							$('.checkentry_popup .popupJournal').bPopup({modalColor: '#C821A1',modalClose: false,closeClass:'closeJournalEntry',
								onClose: function() {
									$(".popupJournal").remove();
									$(".checkentry_popup").empty();
								}},
								function() {
									$(".popupJournal").css("height","auto");						
									$(".datepicker_s").each(function(){
										$(this).datepicker({dateFormat: "yy/mm/dd"}); 
									});
								});	  
						}else{
							console.log("failed to load");
						}
					} 
				});
		}); 
	}); 
	
	function checkAccountType(account_type)
	{
		$.ajax({
			url: '<?php echo url_for("pettycashvoucher/checkAccountType");?>',
		    type: 'json',
			data: {"account_id" : account_type,
				   'voucher_number' : $("#<?php echo $form['voucher_number']->renderId();?>").val(),
				   'client': $("#<?php echo $form['general_library_id']->renderId();?>").val()
				   },
			method: 'POST',
			success: function(resp){  
				var _resp =  eval("("+resp+")");				
				if(_resp.has_data){	 
					$(".outputvat_popup").html(_resp.data);
					$('.outputvat_popup .popupVATBody').bPopup({modalColor: '#C821A1',modalClose: false,closeClass:'closeAccountEntry'},  function() {
						$(".popupVATBody").css("height","auto");
					});	
				}				
			}
		});
	}
	
	
	
	function calculate(obj,_type)
	{
		if(_type == 'amount_entry'){ 
			var el_amount = $(obj);
			var el_vatapp = $(el_amount).parent().parent().next().find(".vatapp_entry");
			var el_ewt    = $(el_vatapp).parent().parent().next().find(".ewt_entry");
			var el_atc    = $(el_ewt).parent().parent().next().find(".atc_entry");
			var el_total  = $(el_atc).parent().parent().next().find(".total_entry");
		}else if(_type == 'vatapp_entry'){
			var el_amount = $(obj).parent().parent().prev().find(".amount_entry");
			var el_vatapp = $(obj);
			var el_ewt    = $(el_vatapp).parent().parent().next().find(".ewt_entry");
			var el_atc    = $(el_ewt).parent().parent().next().find(".atc_entry");
			var el_total  = $(el_atc).parent().parent().next().find(".total_entry");
		}else if(_type == 'ewt_entry'){
			var el_amount = $(obj).parent().parent().prev().prev().find(".amount_entry");
			var el_vatapp = $(el_amount).parent().parent().next().find(".vatapp_entry"); 
			var el_ewt    = $(obj);
			var el_atc    = $(el_ewt).parent().parent().next().find(".atc_entry");
			var el_total  = $(el_atc).parent().parent().next().find(".total_entry");
		}else{
			var el_amount = $(obj).parent().parent().prev().prev().prev().find(".amount_entry");
			var el_vatapp = $(el_amount).parent().parent().next().find(".vatapp_entry");
			var el_ewt    = $(el_vatapp).parent().parent().next().find(".ewt_entry");
			var el_atc    = $(obj);
			var el_total  = $(el_atc).parent().parent().next().find(".total_entry");
		} 
		
		$.ajax({ url: '<?php echo url_for('pettycashvoucher/calcTotalPartEntry');?>',
					 data: {"amount":el_amount.val(),"vatapp":el_vatapp.val(),"ewt":el_ewt.val(),"atc" : el_atc.val()},
					 dataType: 'json',
					 type: "POST",
					 success: function(resp){
						var resp = eval(resp);
						if(resp.hasTotal){
							el_total.val(resp.total_amount);
						}else{
							//alert('problem in calculation. please reload the page');
						}
					 } 
			});
		
	}
	function addNewParticularEntry()
	{
			$.ajax({
					url: '<?php echo url_for("pettycashvoucher/addParticularEntry?num=");?>'+ (new_particular_entry_count + 1),
					type: 'POST',
					dataType: 'json',
					success: function(resp){ 
						var response_data = eval(resp);
						if(response_data.added)
						{  
							new_particular_entry_count = new_particular_entry_count + 1;	
							setLastOccurenceContent("parent_part","particular_entry_row",response_data.new);
							removeNewParticular();
						}
					} 
				});
	}	
	
	function addNewAccountEntryField()
	{
			$.ajax({
					url: '<?php echo url_for("pettycashvoucher/addAccountEntry?num=");?>'+ (new_account_entry_count + 1),
					type: 'POST',
					dataType: 'json',
					success: function(resp){ 
						var response_data = eval(resp);
						if(response_data.added)
						{  
							new_account_entry_count = new_account_entry_count + 1;	
							setLastOccurenceContent("account_part","account_entry_row",response_data.new); 
							$('.removeaccount').unbind('click');
							removeNewAccount();
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
	
	var removeNewParticular = function(){
	  $('.removenewparticular').unbind('click');
	  $('.removenewparticular').click(function(e){
		e.preventDefault();
		$(this).parent().parent().remove();
	  })
	};
	
	var removeNewAccount = function(){
	  $('.removenewaccount').click(function(e){
		e.preventDefault();
		$(this).parent().parent().remove();
	  })
	};
	
	function calculateTotalParticularEntry(elem,type)
	{
		var amount = $(elem).val();
	}
</script>