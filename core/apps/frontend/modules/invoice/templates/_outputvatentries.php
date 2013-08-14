
<div class="popupVATBody" style="height:427px;">	
<form action="<?php url_for("invoice/saveaccountentry");?>" method="POST"> 
<?php echo $form->renderHiddenFields();?>
    <div class="popupVAT">
    	 <h3>Output VAT Schedule Detailed Entry Setup</h3> 
                    
        <div class="transactionEntry">
            <div class="transactionName">
                Transaction No. 
            </div>
            <div class="transactionDivider">:</div>
            <div class="transactionInfo">
               <?php echo $form['invoice_number']->render(array('value'=>$data['invoice_number']));?>
			   <?php echo $data['invoice_number'];?>
            </div>
        </div>
                    
        <div class="transactionEntry2">
            <div class="transactionName">
                Account Code
            </div>
            <div class="transactionDivider">:</div>
            <div class="transactionInfo"> 
               <?php echo $form['chart_of_account_id']->render(array('value'=>$data['account']->getId()));?>
			   <?php echo $data['account']->getCode();?> - <?php echo $data['account']->getTitle();?>
            </div>
        </div>
                    
        <div class="transactionEntry2">
            <div class="transactionName">
                Transaction Date 
            </div>
            <div class="transactionDivider">:</div>
            <div class="transactionInfo"> 
               <?php echo date("M d, Y");?>
            </div>
        </div>
        <div class="transactionEntry2">
            <div class="transactionName">
            	Client Name 
             </div>
             <div class="transactionDivider">:</div>
             <div class="transactionInfo">
             	<?php echo $form['general_library_id']->render(array('selected'=>$data['general_library'] ? $data['general_library']->getId() : ''));?>
             </div>
        </div>
        <div class="transactionEntry2">
            <div class="transactionName">
            	Client TIN No.
            </div>
            <div class="transactionDivider">:</div>
            <div class="transactionInfo">
                    <input type="text"/>
            </div>
        </div>  
        <div class="popupEntry account_outputvat_entry_wrap">
            <div class="popupEntryHeader">   
                <div class="popupEntryHeaderLeft">
                    Tax Rate
                </div>
                <div class="popupEntryHeaderTitle">
                    Gross Purchase
                </div>     
                <div class="popupEntryHeaderTitle">
                    VAT Received
                </div>
                <div class="popupEntryHeaderRight">
                    Net Sales
                </div> 
            </div>
            
			<?php $total_entries = 0;?>
			<?php if(count($form['InvoiceAccountEntryOutputVatEntry']) > 0):?>
				<?php foreach($form['InvoiceAccountEntryOutputVatEntry'] as $ov_entry_form):?>
					<div class="popupEntryContent outvat_entry_row">
						<div class="popupEntryBody"> 
							<div class="popupEntryLeft">
								<?php echo $ov_entry_form['tax_rate_id']->render();?>
							</div>
							<div class="popupEntryAmount">
								<?php echo $ov_entry_form['gross_purchased']->render();?>
							</div>     
							<div class="popupEntryValue">
								0.00
							</div>
							<div class="popupEntryValue">
								0.00
							</div> 
							<div class="popupEntryRight">
								<?php /*<a href=""> <?php echo image_tag("trash.png");?></a> */ ?>
							</div> 
						</div>
					</div>
				<?php endforeach;?>
			<?php else:?>
				<?Php $form->addNewEntry(1);?>   
					<?php foreach($form['outputvat_entries'] as $ov_entry_form):?>
						<?php $total_entries++;?>
					<div class="popupEntryContent outvat_entry_row">
						<div class="popupEntryBody"> 
							<div class="popupEntryLeft">
								<?php echo $ov_entry_form['tax_rate_id']->render();?>
							</div>
							<div class="popupEntryAmount">
								<?php echo $ov_entry_form['gross_purchased']->render();?>
							</div>     
							<div class="popupEntryValue">
								0.00
							</div>
							<div class="popupEntryValue">
								0.00
							</div> 
							<div class="popupEntryRight">
								<?php /*<a href=""> <?php echo image_tag("trash.png");?></a> */ ?>
							</div> 
						</div>
					</div>
				<?php endforeach;?> 
			<?php endif;?>
			 
            	<div class="addLine">
					<a href="javascript:void(0);" class="buttons add_new_outputvat_entry"><u>A</u>dd New Line</a>
            	</div> 
                
                <div class="totalVat">
                	<div class="totalAmount">
                    0.00
                    </div>
                    <div class="totalAmount">
                    0.00
                    </div>
                	<div class="totalAmount">
                    0.00
                    </div>
                </div> 
<!-- END ENTRY HERE --> 
        </div>        
    </div>
    <div class="formControlBtn" align="right">
        <a href="javascript:void(0);" class="btnCancel">Reset</a>
        <a href="javascript:void(0);" class="btnSave">Done</a>      
        <a href="javascript:void(0);" class="btnSave closeAccountEntry">Cancel</a>      
    </div>
 </form>
</div>

<script type="text/javascript">
 
    var new_output_entry_count = <?php echo $total_entries;?>;
	$(document).ready(function(){
		 $(".add_new_outputvat_entry").click(function(e){
			addNewOutpoutVatEntry(new_output_entry_count); 
		 });
	});
	function addNewOutpoutVatEntry()
	{
			$.ajax({
					url: '<?php echo url_for("invoice/addOutputVatEntry?num=");?>'+ (new_output_entry_count + 1),
					type: 'POST',
					dataType: 'json',
					success: function(resp){ 
						var response_data = eval(resp);
						if(response_data.added)
						{  
							new_output_entry_count = new_output_entry_count + 1;	
							setLastOccurenceContent("account_outputvat_entry_wrap","outvat_entry_row",response_data.new);
							$('.removeAccountOutputVatEntry').unbind('click');
							removeNewOutputVatEntry();
						}
					} 
				});
	}	
		
	function setLastOccurenceOutputVat(_parent, type,content)
	{ 
		if($("."+_parent+"").find("div."+type+":last").length > 0){
			$("."+_parent+"").find("div."+type+":last").after(content);
		}else{
			$("."+_parent+"").find("div.popupEntryHeader").after(content);
		} 
	}
	
	var removeNewOutputVatEntry = function(){
	  $('.removeAccountOutputVatEntry').click(function(e){
		e.preventDefault();
		$(this).parent().parent().parent().remove();
	  })
	};
	
</script>