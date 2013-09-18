 <div class="popupCheck"  style="height:427px;">
    	 <h3>Check Entry  </h3>
    	 
         <div class="transactionEntry">
            <div class="transactionName">
                Transaction No. 
            </div>
            <div class="transactionDivider">:</div>
            <div class="transactionInfo">
                <?php echo $check_voucher->getVoucherNumber();?>
            </div>
        </div>
         
        <div class="entryControl checkentry_wrapper"> 
			<form action="<?php echo url_for("checkvoucher/savecheckentries");?>" method="post" id="frm_checkentries">
				<?php echo $form->renderHiddenFields();?>
            <div class="entryChart4">    
                <div class="formEntryTitle">
                    Payee
                </div>         
            </div>
            <div class="entryCode">
                <div class="formEntryTitle">
                    Bank
                </div>                
            </div>
            <div class="entryCode2">
                <div class="formEntryTitle">
                    Deposited To
                </div>                       
            </div>                        
            <div class="entryCode2">
                <div class="formEntryTitle">
                    Check No.
                </div>                       
            </div>
            <div class="entryCode2"> 
                <div class="formEntryTitle">
                    Check Date
                </div>     
            </div>
            <div class="entryCode3">
                <div class="formEntryTitle">
                    Amount
                </div>               
            </div>
            <div class="entryStatus">
                <div class="formEntryTitle">
                    Cleared
                </div>            
            </div>
            <div class="entryStatus">
                <div class="formEntryTitle">
                    Released
                </div>            
            </div>
            <div class="entryStatus">
                <div class="formEntryTitle">
                    Cancelled
                </div>            
            </div>
                        
                    
<!-- ***** DETAILS OF ENTRY HERE ***** -->
<?php if(count($form['CheckVoucherEntry']) > 0 ):?> 
			<?php $total_entry = 1;?>
			<?php foreach($form['CheckVoucherEntry'] as $a_check_entry_form):?>
					<?php echo $a_check_entry_form->renderHiddenFields();?>
					<div class="entryBorder check_row">
						<div class="entryChart4"> 
							<?php echo $a_check_entry_form['general_library_id']->render(array('class'=>'entrySelect'));?>
						</div>                     
						<div class="entryCode"> 
							<?php echo $a_check_entry_form['bank_id']->render(array('class'=>'entrySelect'));?>
						</div>
						<div class="entryCode2">
							<?php echo $a_check_entry_form['chart_of_account_id']->render(array('class'=>'entrySelect'));?>
						</div>
						<div class="entryCode2">
							 <?php echo $a_check_entry_form['check_number']->render();?>
						</div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
						<div class="entryCode2">
							<?php echo $a_check_entry_form['check_date']->render(array('class'=>'datepicker_s'));?>
						</div>
						<div class="entryCode3">
							<?php echo $a_check_entry_form['amount']->render();?> 
						</div>
						<div class="entryStatus">
							<?php echo $a_check_entry_form['is_cleared']->render();?> 
							<?php echo $a_check_entry_form['is_cleared_note']->render();?> 
						</div>
						<div class="entryStatus">
							<?php echo $a_check_entry_form['is_released']->render();?> 
							<?php echo $a_check_entry_form['is_released_note']->render();?> 
						</div>
						<div class="entryStatus">
							<?php echo $a_check_entry_form['is_cancelled']->render();?> 
							<?php echo $a_check_entry_form['is_cancelled_note']->render();?> 
						</div>
						<div class="entryAction">	
							<?php echo $total_entry !=1 ? image_tag("trash.png",array("class" => "removecheckhentry","style"=>"text-align:center;")) : '';?>
						</div> 
					</div>
					<?php $total_entry ++;?> 
				<?php endforeach;?>  
	<?php else:?> 
			<?Php $form->addNewCheckEntry(1);?>  
				<?php $total_entry = 1;?>
				<?php foreach($form['check_entries'] as $a_check_entry_form):?>
					<div class="entryBorder check_row">
						<div class="entryChart4"> 
							<?php echo $a_check_entry_form['general_library_id']->render(array('class'=>'entrySelect'));?>
						</div>                     
						<div class="entryCode"> 
							<?php echo $a_check_entry_form['bank_id']->render(array('class'=>'entrySelect'));?>
						</div>
						<div class="entryCode2">
							<?php echo $a_check_entry_form['chart_of_account_id']->render(array('class'=>'entrySelect'));?>
						</div>
						<div class="entryCode2">
							 <?php echo $a_check_entry_form['check_number']->render();?>
						</div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
						<div class="entryCode2">
							<?php echo $a_check_entry_form['check_date']->render(array('class'=>'datepicker_s'));?>
						</div>
						<div class="entryCode3">
							<?php echo $a_check_entry_form['amount']->render();?> 
						</div>
						<div class="entryStatus">
							<?php echo $a_check_entry_form['is_cleared']->render();?> 
							<?php echo $a_check_entry_form['is_cleared_note']->render();?> 
						</div>
						<div class="entryStatus">
							<?php echo $a_check_entry_form['is_released']->render();?> 
							<?php echo $a_check_entry_form['is_released_note']->render();?> 
						</div>
						<div class="entryStatus">
							<?php echo $a_check_entry_form['is_cancelled']->render();?> 
							<?php echo $a_check_entry_form['is_cancelled_note']->render();?> 
						</div>
						<div class="entryAction">	
							<?php echo $total_entry !=1 ? image_tag("trash.png",array("class" => "removecheckhentry","style"=>"text-align:center;")) : '';?>
						</div> 
					</div>
					<?php $total_entry++;?>
				<?php endforeach;?>  
			<?php endif;?>	
			</form>		
		</div>
        <div class="addLine">
              <a href="javascript:void(0);" class="buttons add_new_check_entry"><u>A</u>dd New Line</a>
        </div>
        <div class="total">
        	<div style="float:left; width:100%;">
                <div class="entryAmountTitle">
                    Total Payment
                </div>
                <div class="entryAmount">
                    0.00
                </div>
            </div>
            <div style="float:left; width:50%;">
                <div class="entryDiff">
                Outstanding Balance
                </div>
                <div class="entryDiffAmount">
                    0.00
                </div>
            </div>
        </div> 
		<div class="formControlBtn" align="right">
			<a href="javascript:void(0);" class="btnCancel">Reset</a>
			<a href="javascript:void(0);" id="btnSave_checkentry" class="btnSave">Save</a>      
			<a href="javascript:void(0);" class="btnCancel closeCheckEntry">Cancel</a>      
		</div>
    </div> 
<script>
	var new_check_count = <?php echo $total_entry;?>;
	var removeNewCheckEntry = function(){
	  $('.removecheckentry').click(function(e){
		e.preventDefault();
		$(this).parent().parent().remove();
	  })
	};
	
	$(document).ready(function(){	
		removeNewCheckEntry();
		$("#btnSave_checkentry").click(function(){ 	
			$.ajax({
				url: '<?php echo url_for("checkvoucher/savecheckentries?id=").$check_voucher->getId();?>',
				method: 'POST',
				dataType: 'json',
				data: $("#frm_checkentries").serialize(),
				success: function(resp){
					var _resp = eval(resp);
					if(_resp.save){
						$(".closeCheckEntry").trigger('click');
					}else{
						console.log(_resp.errors);
					}
				}		
			}); 
		});
		
		$(".add_new_check_entry").click(function(e){
				addNewCheckEntry(new_check_count); 
			}); 
	});
	
	function addNewCheckEntry()
	{
			$.ajax({
					url: '<?php echo url_for("checkvoucher/addCheckEntry?num=");?>'+ (new_check_count),
					type: 'POST',
					dataType: 'json',
					success: function(resp){ 
						var response_data = eval(resp);
						if(response_data.added)
						{  
							new_check_count = new_check_count + 1;	
							setLastOccurenceContent("checkentry_wrapper","check_row",response_data.new);
							$('.removecheckentry').unbind('click');
							removeNewCheckEntry();							
							reloadDatapickers();
						}
					} 
				});
	}	
		
	function setLastOccurenceContent(_parent, type,content)
	{ 
		if($("."+_parent+"").find("div."+type+":last").length > 0){
			$("."+_parent+"").find("div."+type+":last").after(content);
		}else{
			$("."+_parent+"").find("div.popupEntryHeader").after(content);
		} 
	} 
	
</script>