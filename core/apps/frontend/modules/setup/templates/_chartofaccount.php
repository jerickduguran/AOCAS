<h2 class="StepTitle">Setup your Chart of Accounts</h2>	
    <p>
    Chart of accounts is a list of all the accounts used to code your transactions.
    You can use the default of G Cross accounting system or import your own.  
    </p>  
    
     <div class="tableBody">
    	<a href="javascript:void(0);" id="add_new_account" class="buttons"><?php echo image_tag("icons/add.png");?> Add Account</a>
    </div>
    <div class="tableBody">    
    <div id="table" class="charofaccountlists">    	 
			<?php include_partial("chartofaccountlist",array('coa'=>$coa));?>                       				          
	</div>
    </div>   
		<div class="popup popupcoa" style="display:none;"> 
			<form id="form_coa">
				<?php echo $form->renderHiddenFields();?>
				<h3>Add New Account</h3>
				 
				<div id="table">	
				   <div class="tr">
				   Account Type:
				   </div>
				   <div class="td"> 
				   <?php echo $form['account_type_id']->render(array('class'=>"textboxadd"));?>
				   </div>
				 </div>
				 <div id="table">	
				   <div class="tr">
				   Code:
				   </div>
				   <div class="td"> 
				   <?php echo $form['code']->render(array('class'=>"textboxadd"));?>
				   </div>
				 </div>
				 <div id="table">	
				   <div class="tr">
				   Title:
				   </div>
				   <div class="td"> 
				   <?php echo $form['title']->render(array('class'=>"textboxadd"));?>
				   </div>
				 </div>
				 <div id="table">	
				   <div class="tr">
				   Desciption
				   </div>
				   <div class="td"> 
				   <?php echo $form['description']->render(array('class'=>"textarea"));?>
				   </div>
				 </div>
				 <div id="table">	
				   <div class="tr">
				   Tax Rate
				   </div>
				   <div class="td"> 
				   <?php echo $form['tax_class_id']->render(array('class'=>"textboxadd"));?>
				   </div>
				 </div>
				 <div class="popupFooter">
					<a href="javascript:void(0);"  id="save_account"  class="buttons">Save</a> 
					<a href="javascript:void(0);" class="buttons close_coa">Cancel</a>   
				</div>    
		</div>	
<script type="text/javascript">
	$(document).ready(function(){
		$("#add_new_account").click(function(){ 
			$('.popupcoa').bPopup({modalColor: '#C821A1',modalClose: false,closeClass:'close_coa'}); 
		});
		 
		$("#save_account").click(function(){
			$(this).text("Saving...");
			$.ajax({
				url: '<?php echo url_for("chartofaccount/save");?>',
				data: $("form#form_coa").serialize(),
				method: 'post',
				type: "json",
				success: function(response){
					var response_data = eval("("+response+")");
					if(response_data.success){ 
						$(".charofaccountlists").html(response_data.list);
						var content_height = $("#step-6").height() + 10;
						$(".stepContainer").height(content_height);
						$('.popupcoa').bPopup().close(); 						
						$(this).text("Save");
					}
				}
			
			});
		});
	});
</script> 