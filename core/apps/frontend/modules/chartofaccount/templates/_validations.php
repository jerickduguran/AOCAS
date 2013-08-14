<div class="validation">Validation:</div>
<div class="validationControl">
	<?php if($validations->count()>0):?>
		<?php foreach($validations as $validation):?> 
			<div class="validationCheck">
				<input name="<?php echo $form->getName()."[".$form['validation_list']->getName()."][]";?>" <?php echo in_array($validation->getId(),$chart_class_validations->getRawValue()) ? 'checked=checed' : '';?> type="checkbox" id="validation_<?php echo $validation->getId();?>" value="<?php echo $validation->getId();?>"/> 
				<label for="validation_<?php echo $validation->getId();?>"><?php echo $validation->getName();;?></label>
			</div>
		<?php endforeach;?>			
	<?php endif;?>		 
</div> 