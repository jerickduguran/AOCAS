<h2 class="StepTitle">Setup your Account Balance</h2>	
    <p>
		Chart of accounts is a list of all the accounts used to code your transactions.
		You can use the default of G Cross accounting system or import your own.  
    </p> 
    
     <div class="tableBody">
    	<a href="javascript:void(0);" id="add_new_balance" class="buttons"><?php echo image_tag("icons/add.png");?> Add Balance</a>
    </div>
    <div class="tableBody">    
		<div id="table" class="balancelists">    	 
				<?php include_partial("accountbalancelist",array('balances'=>$balances));?>                       				          
		</div>
    </div>   
		<div class="popup popupbalance" style="display:none;"> 
			<form id="form_coa">
				<?php echo $form->renderHiddenFields();?>
				<h3>Add New Balance</h3>				 
				<div id="table">	
				   <div class="tr">
				     Account:
				   </div>
				   <div class="td"> 
				   <?php echo $form['chart_of_account_id']->render(array('class'=>"textboxadd"));?>
				   </div>
				 </div>
				 <div id="table">	
				   <div class="tr">
				   Project:
				   </div>
				   <div class="td"> 
				   <?php echo $form['project_id']->render(array('class'=>"textboxadd"));?>
				   </div>
				 </div>
				 <div id="table">	
				   <div class="tr">
				   Department:
				   </div>
				   <div class="td"> 
				   <?php echo $form['department_id']->render(array('class'=>"textboxadd"));?>
				   </div>
				 </div>
				 <div id="table">	
				   <div class="tr">
				   Debit:
				   </div>
				   <div class="td"> 
				   <?php echo $form['debit']->render(array('class'=>"textboxadd"));?>
				   </div>
				 </div>
				 <div id="table">	
				   <div class="tr">
				   Credit:
				   </div>
				   <div class="td"> 
				   <?php echo $form['credit']->render(array('class'=>"textboxadd"));?>
				   </div>
				 </div>
				 <div class="popupFooter">
					<a href="javascript:void(0);"  id="save_balance"  class="buttons">Save</a> 
					<a href="javascript:void(0);" class="buttons close_balance">Cancel</a>   
				</div>    
		</div>	
<script type="text/javascript">
	$(document).ready(function(){
		$("#add_new_balance").click(function(){
					$.ajax({
						url: "<?php echo url_for("chartofaccount/fetchoptions");?>",
						type: "POST",
						method: 'json',
						success: function(resp){	
							var response_data = eval("("+resp+")");
							$("#general_ledger_beginning_balance_chart_of_account_id").val(response_data.options); 
						}
					});
					$('.popupbalance').bPopup({modalColor: '#C821A1',modalClose: false,closeClass:'close_balance'}); 
		});
		 
		$("#save_balance").click(function(){
			$(this).text("Saving...");
			$.ajax({
				url: '<?php echo url_for("generalledger/savebalance");?>',
				data: $("form#form_coa").serialize(),
				method: 'post',
				type: "json",
				success: function(response){
					var response_data = eval("("+response+")");
					if(response_data.success){ 
						$(".balancelists").html(response_data.list);
						var content_height = $("#step-7").height() + 10;
						$(".stepContainer").height(content_height);
						$('.popupbalance').bPopup().close(); 						
						$(this).text("Save");
					}
				}
			
			});
		});
	});
</script> 