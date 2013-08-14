<form>
 <?php echo $organization_form->renderHiddenFields();?> 		
            <h2 class="StepTitle">Organization</h2>
           <div class="tablecontent">
                <div id="table">                    	
                    <div class="tr">
                    Display Name:
                    </div>
                    <div class="td">
						<?php echo $organization_form['display_name']->render(array('class'=>'textbox'));?>
						<span>*Required</span>
                    </div>
                </div>
                <div id="table">                    	
                    <div class="tr">
                    Legal Name:
                    </div>
                    <div class="td"> 
					<?php echo $organization_form['legal_name']->render(array('class'=>'textbox'));?>
					<span>*Required</span>
                    </div>
                </div>
                <div id="table">                    	
                    <div class="tr">
                    Industry:
                    </div>
                    <div class="td"> 
					<?php echo $organization_form['organization_type_id']->render(array('class'=>'textbox'));?>
                    </div>
                </div>
                
                
                <div id="table">	
                <h2>Contact Details</h2>
                    <div class="tr">
                    Street Address:
                    </div>
                    <div class="td">
                    <?php echo $organization_form['street']->render(array('class'=>'textarea'));?>
                    </div>
                </div>
                <div id="table">	
                    <div class="tr">
                    Town/City:
                    </div>
                    <div class="td">
                      <?php echo $organization_form['city']->render(array('class'=>'textboxadd'));?>
					<span>*Required</span>
                    </div>
                </div>
                <div id="table">	
                    <div class="tr">
                    Postal:
                    </div>
                    <div class="td"> 
                      <?php echo $organization_form['code']->render(array('class'=>'textboxadd'));?>
					<span>*Required</span>
                    </div>
                </div>
                <div id="table">	
                    <div class="tr">
                    Country:
                    </div>
                    <div class="td"> 
                      <?php echo $organization_form['country_id']->render(array('class'=>'textboxadd'));?>
					<span>*Required</span>
                    </div>
                </div>
                <div id="table">	
                    <div class="tr">
                    Telephone No.:
                    </div>
                    <div class="td">						
                      <?php echo $organization_form['telephone_number']->render(array('class'=>'textboxadd'));?>
					<span>*Required</span>
                    </div>
                </div>
                <div id="table">	
                    <div class="tr">
                    Fax No.:
                    </div>
                    <div class="td"> 
                      <?php echo $organization_form['fax']->render(array('class'=>'textboxadd'));?>
					<span>*Required</span>
                    </div>
                </div>
                <div id="table">	
                    <div class="tr">
                    Email Address:
                    </div>
                    <div class="td"> 
                      <?php echo $organization_form['email']->render(array('class'=>'textboxadd'));?>
					<span>*Required</span>
                    </div>
                </div>
                
            </div>
            
            <div class="tablecontent">
                <div id="table">	
                    <div class="tr">
                    Branch Code:
                    </div>
                    <div class="td"> 
                    <?php echo $organization_form['branch_code']->render(array('class'=>'textbox'));?>
					<span>*Required</span>
                    </div>
                </div>
                <div id="table">	
                    <div class="tr">
                    RDO Code:
                    </div>
                    <div class="td">
                    <?php echo $organization_form['rdo_code']->render(array('class'=>'textbox'));?>
					<span>*Required</span>
                    </div>
                </div>
                <div id="table">	
                    <div class="tr">
                    TIN No.:
                    </div>
                    <div class="td">
                    <?php echo $organization_form['tin']->render(array('class'=>'textbox'));?>
					<span>*Required</span>
                    </div>
                </div>
                <div id="table">	
                    <div class="tr">
                    Company Logo:
                    </div>
                    <div class="td">  
						<?php echo $organization_form['logo']->render(array('class'=>'textbox1'));?>
                    </div>
                </div>    	
            </div>  
	</form>       