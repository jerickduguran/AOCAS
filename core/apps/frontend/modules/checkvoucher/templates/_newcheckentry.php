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
 		<?php echo image_tag("trash.png",array("class" => "removecheckentry","style"=>"text-align:center;"));?>
	</div> 
</div>
<?php endforeach;?>