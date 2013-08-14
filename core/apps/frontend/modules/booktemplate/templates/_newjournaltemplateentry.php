<?php foreach($form['journaltemplate_entries'] as $b_entry):?>
		<div class="entryBorder journal_template_entry_row">
			<div class="entryChart3"> 
				<div>
					<div>
						<?php echo $b_entry['chart_of_account_id']->render(array('class'=>'entrySelect'));?>
					</div>  
				</div> 
			</div>                     
			<div class="entryChart3"> 
				<div> 
					<?php echo $b_entry['general_library_id']->render(array('class'=>'entrySelect'));?>
				</div> 
			</div>
			<div class="entryCodeBook">
				<div> 
					<?php echo $b_entry['debit']->render(array('class'=>'entryBox'));?>
				</div>  
			</div>
			<div class="entryCodeBook">
				<div> 
					<?php echo $b_entry['credit']->render(array('class'=>'entryBox'));?>
				</div>  
			</div> 
			<div class="entryAction">  
					<a href="javascript:void(0);" class="remove_journalbookentry"><?php echo image_tag("trash.png");?></a> 
			</div> 
		</div> 
<?php endforeach;?>