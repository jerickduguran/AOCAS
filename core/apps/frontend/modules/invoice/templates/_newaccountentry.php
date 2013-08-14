 <?php foreach($form['account_entries'] as $a_enrty_form):?>
<div class="entryBorder account_entry_row" id="row-<?php echo $total_acct;?>">
	<div class="entryChartInvoice"> 
		<div> 
		<?php echo $a_enrty_form['chart_of_account_id']->render(array('class'=>'entrySelect'));?> 
		</div> 
	</div>                     
	<div class="entryChart"> 
		<div> 
			<?php echo $a_enrty_form['general_library_id']->render(array('class'=>'entrySelect'));?> 
		</div> 
	</div>  
	<div class="entryDC"> 
		<?php echo $a_enrty_form['debit']->render(array('class'=>''));?>  
	</div>
	<div class="entryDC"> 
		<?php echo $a_enrty_form['credit']->render(array('class'=>''));?>  
	</div> 
	<div class="entryAction"> 
			<?php echo image_tag("trash.png",array("class" => "removenewaccount","style"=>"text-align:center;"));?>
	</div> 
</div>
<?php endforeach;?>