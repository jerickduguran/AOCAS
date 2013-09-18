<?php foreach($form['outputvat_entries'] as $ov_entry_form):?>
	<div class="popupEntryContent">
		<div class="popupEntryBody"> 
			<div class="popupEntryLeft">
				<?php echo $ov_entry_form['tax_rate_id']->render();?>
			</div>
			<div class="popupEntryAmount">
				<?php echo $ov_entry_form['gross_purchased']->render();?>
			</div>     
			<div class="popupEntryValue">
				0.00
			</div>
			<div class="popupEntryValue">
				0.00
			</div> 
			<div class="popupEntryRight">
				<a href="javascript:void(0);" class="removeAccountOutputVatEntry"> <?php echo image_tag("trash.png");?></a>
			</div> 
		</div>
	</div>
<?php endforeach;?>