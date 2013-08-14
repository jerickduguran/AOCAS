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
			<?php echo image_tag("trash.png",array("class" => "removecashentry","style"=>"text-align:center;"));?>
		</div> 
</div>
<?php endforeach;?>