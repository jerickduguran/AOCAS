<?php foreach($form['particular_entries'] as $p_entry_form):?> 
		<div class="entryBorder particular_template_entry_row">
			<div class="entryChart2">  
				<?php echo $p_entry_form['title']->render(array('class'=>'entryBox part_title'));?>
			</div>                     
			<div class="entryDC">  
				<?php echo $p_entry_form['amount']->render(array('class'=>'entryBox part_amount'));?>
			</div>
			<div class="entryCode1"> 
				<?php echo $p_entry_form['vat_application']->render(array('class'=>'entrySelect part_vat'));?>
			</div>
			<div class="entryCode1"> 
				<?php echo $p_entry_form['tax_expanded_withheld_id']->render(array('class'=>'entrySelect part_ewt'));?>
			</div>
			<div class="entryCode1"> 
				<?php echo $p_entry_form['tax_final_withheld_id']->render(array('class'=>'entrySelect part_atc'));?>
			</div>
			<div class="entryDC"> 
				<?php echo $p_entry_form['total']->render(array('class'=>'entryBox part_atc','readonly'=>'readonly'));?>											
			</div> 
			<div class="entryAction"> 
					<a href="javascript:void(0);" class="remove_particulartemplate_entry"><?php echo image_tag("trash.png");?></a> 
			</div> 
		</div>
<?php endforeach;?>