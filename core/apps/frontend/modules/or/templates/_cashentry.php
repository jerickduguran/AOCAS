 <div class="popupCheck"  style="height:427px;">
    	 <h3>Cash Entry</h3>
    	 
         <div class="transactionEntry">
            <div class="transactionName">
                Transaction No. 
            </div>
            <div class="transactionDivider">:</div>
            <div class="transactionInfo">
                <?php echo $receipt->getReceiptNumber();?>
            </div>
        </div>
         
        <div class="entryControl cashentry_wrapper">
			<form action="<?php echo url_for("or/savecashentries");?>" method="post" id="frm_cashentries">
				<?php echo $form->renderHiddenFields();?>
					<div class="entryChart5">    
						<div class="formEntryTitle">
							Payee
						</div>         
					</div>
					<div class="entryCode4">
						<div class="formEntryTitle">
							Deposited To
						</div>                       
					</div>    
					<div class="entryCode5"> 
						<div class="formEntryTitle">
							Date
						</div>     
					</div>
					<div class="entryCode5">
						<div class="formEntryTitle">
							Amount
						</div>               
					</div>
					 
		<!-- ***** DETAILS OF ENTRY HERE ***** -->
			<?php if(count($form['ReceiptCashEntry']) > 0 ):?>
						<?php $total_entry = 1;?>
						<?php foreach($form['ReceiptCashEntry'] as $a_cash_entry_form):?>
								<div class="entryBorder cash_row">
									<?php echo $a_cash_entry_form->renderHiddenFields();?>
									<div class="entryChart5">  
										<?php echo $a_cash_entry_form['general_library_id']->render(array('class'=>'entrySelect'));?>
									</div>      
									<div class="entryCode4"> 
										<?php echo $a_cash_entry_form['chart_of_account_id']->render(array('class'=>'entrySelect'));?>
									</div>
									<div class="entryCode5">
										<?php echo $a_cash_entry_form['date']->render();?>
									</div>
									<div class="entryCode5">
										 <?php echo $a_cash_entry_form['amount']->render();?>
									</div>
									
									<div class="entryAction">
										<?php echo $total_entry !=1 ? image_tag("trash.png",array("class" => "removecashentry","style"=>"text-align:center;")) : '';?>
									</div> 
								</div>
							<?php $total_entry ++;?> 
						<?php endforeach;?>  
					<?php else:?> 
							<?Php $form->addNewCashEntry(1);?>  
							<?php $total_entry = 1;?>
							<?php foreach($form['cash_entries'] as $a_cash_entry_form):?>
								 <div class="entryBorder cash_row">
									<div class="entryChart5">  
										<?php echo $a_cash_entry_form['general_library_id']->render(array('class'=>'entrySelect'));?>
									</div>      
									<div class="entryCode4"> 
										<?php echo $a_cash_entry_form['chart_of_account_id']->render(array('class'=>'entrySelect'));?>
									</div>
									<div class="entryCode5">
										<?php echo $a_cash_entry_form['date']->render();?>
									</div>
									<div class="entryCode5">
										 <?php echo $a_cash_entry_form['amount']->render();?>
									</div>
									
									<div class="entryAction">
										<?php echo $total_entry !=1 ? image_tag("trash.png",array("class" => "removecashentry","style"=>"text-align:center;")) : '';?>
									</div> 
								</div>
								<?php $total_entry++;?>
						<?php endforeach;?>  
					<?php endif;?>	
					</form>					
				</div>
        <div class="addLine">
              <a href="javascript:void(0);" class="buttons add_new_cash_entry"><u>A</u>dd New Line</a>
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
			<a href="javascript:void(0);" id="btnSave_cashentry" class="btnSave">Save</a>      
			<a href="javascript:void(0);" class="btnCancel closeCashCheckEntry">Cancel</a>      
		</div>
    </div>
<script>
	var new_cash_count = <?php echo $total_entry;?>;
	var removeNewCashEntry = function(){
	  $('.removecashentry').click(function(e){
		e.preventDefault();
		$(this).parent().parent().remove();
	  })
	};
	
	$(document).ready(function(){	
		removeNewCashEntry();
		$("#btnSave_cashentry").click(function(){ 	
			$.ajax({
				url: '<?php echo url_for("or/savecashentries?id=").$receipt->getId();?>',
				method: 'POST',
				dataType: 'json',
				data: $("#frm_cashentries").serialize(),
				success: function(resp){
					var _resp = eval(resp);
					if(_resp.save){
						$(".closeCashCheckEntry").trigger('click');
					}else{
						console.log(_resp.errors);
					}
				}		
			}); 
		});
		
		$(".add_new_cash_entry").click(function(e){
				addNewCashEntry(new_cash_count); 
			}); 
	});
	
	function addNewCashEntry()
	{
			$.ajax({
					url: '<?php echo url_for("or/addCashEntry?num=");?>'+ (new_cash_count),
					type: 'POST',
					dataType: 'json',
					success: function(resp){ 
						var response_data = eval(resp);
						if(response_data.added)
						{  
							new_cash_count = new_cash_count + 1;	
							setLastOccurenceContent("cashentry_wrapper","cash_row",response_data.new);
							$('.removecashentry').unbind('click');
							removeNewCashEntry();
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