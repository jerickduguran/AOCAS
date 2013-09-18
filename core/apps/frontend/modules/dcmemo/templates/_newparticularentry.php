<?php foreach($form['particular_entries'] as $p_enrty_form):?>
	<div class="entryBorder particular_entry_row" id="row-<?php echo $number;?>">
		<div class="entryChart"> 
			<div> 
			<?php echo $p_enrty_form['title']->render(array('class'=>'entryBox title_entry'));?>
			</div> 
		</div>                     
		<div class="entryCode"> 
			<div> 
			<?php echo $p_enrty_form['amount']->render(array('class'=>'entryBox amount_entry','placeholder'=>'0.00'));?>
			</div> 
		</div>
		<div class="entryCode">
			<div> 
				<?php echo $p_enrty_form['vat_application']->render(array('class'=>'entrySelect vatapp_entry'));?> 
			</div>  
		</div>
		<div class="entryCode">
			<div> 
			<?php echo $p_enrty_form['tax_expanded_withheld_id']->render(array('class'=>'entrySelect ewt_entry'));?>
			
			</div>  
		</div>
		<div class="entryD">
			<div> 
			<?php echo $p_enrty_form['tax_final_withheld_id']->render(array('class'=>'entrySelect atc_entry'));?>
			</div> 
		</div>
		<div class="entryD">
			<div>
				<?php echo $p_enrty_form['total']->render(array('class'=>'entryBox total_entry','readonly'=>'readonly'));?>
			</div> 
		</div> 
		<div class="entryAction">
				<?php echo image_tag("trash.png",array("class" => "removenewparticular"));?>
		</div> 
	</div>  
<?php endforeach;?>