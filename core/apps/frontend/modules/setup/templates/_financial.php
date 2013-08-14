 <form>
 <?php echo $form->renderHiddenFields();?>
	<h2 class="StepTitle">Enter your financial details</h2>	
    <div class="tablecontent">
         <div id="table">                    	
         	<div class="tr">
            	Currency:
            </div>
            <div class="td"> 
                <?php echo $form['currency_id']->render(array("class"=>"textbox"));?>
            </div>
         </div>
         <div id="table">                    	
         	<div class="tsr">
            	Financial Year End:
            </div>
            <div class="td"> 
			<select name="<?php echo $form->getName()."[".$form['financial_yearend_day']->getName()."]";?>">
				<option value=""></option>
				<?php $dateList = array();
					  $dates = range(1, 31);
					  foreach($dates AS $date):?>
							<option value="<?php echo $date;?>" <?php echo $form->getObject()->getFinancialYearendDay() == $date ? "SELECTED='SELECTED'" : "";?>><?php echo $date;?></option> 
					  <?php endforeach;?> 
			</select>
			
			<select name="<?php echo $form->getName()."[".$form['financial_yearend_month']->getName()."]";?>">
				<?php $months = array( '' => '',
									   1  => 'January', 
									   2  => 'February', 
									   3  => 'March', 
									   4  => 'April', 
									   5  => 'May', 
									   6  => 'June', 
									   7  => 'July', 
									   8  => 'August', 
									   9  => 'September', 
									   10 => 'October', 
									   11 => 'November', 
									   12 => 'December');	
					  foreach($months AS $m=>$month):?>
							<option value="<?php echo $m;?>" <?php echo $form->getObject()->getFinancialYearendMonth() == $m ? "SELECTED='SELECTED'" : "";?>><?php echo $month;?></option> 
					  <?php endforeach;?> 
			</select> 
            </div>
         </div>
    </div> 
</form>