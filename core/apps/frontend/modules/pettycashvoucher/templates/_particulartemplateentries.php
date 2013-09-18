<div class="entryControl">
	<div class="entryChart">    
		<div class="formEntryTitle">
			Title
		</div>         
	</div>
	<div class="entryCode">
		<div class="formEntryTitle">Amount</div>                
	</div>
	<div class="entryCode">
		<div class="formEntryTitle">VAT</div>               
	</div>
	<div class="entryCode">
		<div class="formEntryTitle">EWT</div>                       
	</div>
	<div class="entryD"> 
		<div class="formEntryTitle">ATC</div>     
	</div>
	<div class="entryD">
		<div class="formEntryTitle">Total</div>            
	</div>
	<div class="entryAction">
		<div class="formEntryTitle"></div>            
	</div>
</div> 
<?php $total_part = 0;?>
<?php foreach($form['particular_entries'] as $p_entry_form):?>
	<?php $total_part++;?>
	<div class="entryBorder particular_entry_row" id="row-<?php echo $total_part;?>">
		<div class="entryChart"> 
			<div> 
			<?php echo $p_entry_form['title']->render(array('class'=>'entryBox title_entry'));?>
			</div> 
		</div>                     
		<div class="entryCode"> 
			<div> 
			<?php echo $p_entry_form['amount']->render(array('class'=>'entryBox amount_entry','placeholder'=>'0.00'));?>
			</div> 
		</div>
		<div class="entryCode">
			<div> 
				<?php echo $p_entry_form['vat_application']->render(array('class'=>'entrySelect vatapp_entry'));?> 
			</div>  
		</div>
		<div class="entryCode">
			<div> 
			<?php echo $p_entry_form['tax_expanded_withheld_id']->render(array('class'=>'entrySelect ewt_entry'));?>
			
			</div>  
		</div>
		<div class="entryD">
			<div> 
			<?php echo $p_entry_form['tax_final_withheld_id']->render(array('class'=>'entrySelect atc_entry'));?>
			</div> 
		</div>
		<div class="entryD">
			<div>
				<?php echo $p_entry_form['total']->render(array('class'=>'entryBox total_entry'));?>
			</div> 
		</div> 
		<div class="entryAction">
			<?php //echo image_tag("icons/DeleteRed.png");?>
			<?php echo $total_part != 1 ? image_tag("trash.png",array("class" => "removenewparticular")) : '';?>
		</div> 
	</div> 
<?php endforeach;?> 
				 