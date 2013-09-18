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
		<?php echo $a_check_entry_form['is_cleared']->render(array('class'=>'cashentry_clearedcheck'));?> 
		<?php echo $a_check_entry_form['is_cleared_date']->render(array('class'=>'datepicker_s','disabled'=>'disabled'));?> 
	</div>
	<div class="entryStatus">
		<?php echo $a_check_entry_form['is_released']->render(array('class'=>'cashentry_releasedcheck'));?> 
		<?php echo $a_check_entry_form['is_released_date']->render(array('class'=>'datepicker_s','disabled'=>'disabled'));?> 
	</div>
	<div class="entryStatus">
		<?php echo $a_check_entry_form['is_cancelled']->render(array('class'=>'cashentry_cancelledcheck'));?> 
		<?php echo $a_check_entry_form['is_cancelled_date']->render(array('class'=>'datepicker_s','disabled'=>'disabled'));?> 
	</div>
	<div class="entryAction">	
 		<?php echo image_tag("trash.png",array("class" => "removecheckentry","style"=>"text-align:center;"));?>
	</div> 
</div>
<?php endforeach;?>