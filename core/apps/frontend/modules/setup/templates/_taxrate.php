<h2 class="StepTitle">Define the tax rates that apply to your company</h2>	
    <p>Everyday transaction item you enter into G Cross Accounting System needs a Tax Rate.
    The Tax Rates you use will depend on the location of your company.
    Tax Rate can have multiple Tax Components. For instance, you can have an item called "city import tax (8%)"
    that has two components....
    </p> 
    <div class="tableBody">
    	<a href="javascript:void(0);"  id="add_new_rate" class="buttons"><?php echo image_tag("icons/add.png");?> New Tax Rate</a>
    </div>
    <div class="tableBody">    
		<div id="table" class="taxrates_lists">  
			<?php include_partial("taxratelist",array('rates'=>$rates));?>   
		</div>
    </div> 
	<div class="popup popup_tax" style="display:none;">
		<form id="form_taxrate">
			<?php echo $form->renderHiddenFields();?>
			<h3>New Tax Rate</h3>
			 <div id="table">	
				<div class="tr">
				Code:
				</div>
				<div class="td"> 
				<?php echo $form['code']->render(array("class"=>"textboxadd"));?>
				</div>
			</div>
			<div id="table">	
			   <div class="tr">
			   Name:
			   </div>
			   <div class="td">
				<?php echo $form['title']->render(array("class"=>"textboxadd"));?>
			   </div>
			 </div>
			 <div id="table">	
			   <div class="tr">
			   Tax Rate:
			   </div>
			   <div class="td">
				<?php echo $form['tax_rate_percent']->render(array("class"=>"textboxadd"));?>
			   </div>
			 </div>
			 <div class="popupFooter">
				<a href="javascript:void(0);"  id="save_taxrate"  class="buttons">Save</a> 
				<a href="javascript:void(0);" class="buttons close_rate">Cancel</a>   
			</div>    
		</form>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#add_new_rate").click(function(){ 
			$('.popup_tax').bPopup({modalColor: '#C821A1',modalClose: false,closeClass:'close_rate'});	 
		});
		
		$("#save_taxrate").click(function(){
			$(this).text("Saving...");
			$.ajax({
				url: '<?php echo url_for("taxrate/save");?>',
				data: $("form#form_taxrate").serialize(),
				method: 'post',
				type: "json",
				success: function(response){
					var response_data = eval("("+response+")");
					if(response_data.success){ 
						$(".taxrates_lists").html(response_data.list);
						var content_height = $("#step-6").height() + 10;
						$(".stepContainer").height(content_height);
						$('.popup_tax').bPopup().close(); 				
						$("#save_taxrate").text("Save");
					}
				}
			
			});
		});
	});
</script>