<h2 class="StepTitle">Add the foreign currencies used by your company</h2>	 
<a href="javascript:void(0);" id="add_currency" class="button" title="Add Currency">Add New Currency</a>
<div style="display:none;" id="currency_new">
	<form id="newcurrency"> 
	    <?php echo $form->renderHiddenFields();?> 	 
		<div class="tablecontent">
			<div id="table">                    	
				<div class="tr">
					Symbol:
				</div>
				<div class="td">
				<?php echo $form['symbol']->render(array('class'=>'textbox'));?>
				</div>
			</div>
			
			<div id="table">                    	
				<div class="tr">
					Title:
				</div>
				<div class="td">
				<?php echo $form['title']->render(array('class'=>'textbox'));?>
				</div>
			</div> 
			<div id="table">                    	
				<div class="tr">
					Unit per PHP:
				</div>
				<div class="td">
				<?php echo $form['unit_per_base']->render(array('class'=>'textbox'));?>
				</div>
			</div>
			<div id="table">                    	
				<div class="tr">
					Date:
				</div>
				<div class="td">
				<?php echo $form['date']->render(array());?>
				</div>
			</div>
			<div id="table">                    	
				<div class="tr">
					Notes
				</div>
				<div class="td">
				<?php echo $form['notes']->render(array('class'=>'textbox'));?>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
	</form>
</div> 
<div>
	<table style="width:400px;">
		<tr>
			<th>Currency</th>
			<th>Unit per PHP</th>
			<th>PHP Per Unit</th>
			<th>Notes</th>
		</tr>
		<?php if($currencies->count()>0):?>
				<?php foreach($currencies as $currency):?>
					<tr>
						<td><?php echo $currency->getSymbol();?> <?php echo $currency->getTitle();?></td> 
						<td><?php echo $currency->getUnitPerBase();?></td>
						<td><?php echo $currency->getUnitPerBase();?></td>
						<td><?php echo $currency->getNotes();?></td>
					</tr>
				<?php endforeach;?>
		<?php else:?>
		<tr>
			<td colspan='4' rowspan="10"> No Currency yet.</td> 
		</tr>
		<?php endif;?>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#add_currency").click(function(){
			//$("#currency_new").show(function(){ 
			//	var height	= $(this).parent().height() + 10;
			//	$(".stepContainer").css("height",height);  
			//}); 	
			$('#currency_new').bPopup();			
		
		});
	});
</script>