<div class="popupMain init_add_invoice">
	<div class="popup">
		<form action="<?php echo url_for("invoice/presaveinvoice");?>" method="post" id="form_create_invoice">
			<?php echo $form->renderHiddenFields();?>
			<h3>Invoice Voucher Entry</h3>		
			<div class="popupBody">
				<div class="popTitle">
					Book
				</div>
				<div class="popRight"> 
					<?php echo $form['book_id']->render(array('class'=>'popSelect'));?>
				</div>
				<div class="popTitle">
					Period
				</div>
				<div class="popRight"> 
					<?php echo $form['period']->render(array('class'=>'datepicker_s'));?> 
				</div>
				<div class="popTitle">
					Invoice No.
				</div>
				<div class="popRight"> 
					<?php echo $form['invoice_number']->render(array('class'=>''));?> 
				</div>
			</div>
		</form>		
	</div>
	<div class="formControlBtn" align="right">
			  <a href="javascript:void(0);" class="btnBack">Cancel</a> 
			  <a href="javascript:void(0);" class="btnPrint">Continue</a>
	</div>
</div> 