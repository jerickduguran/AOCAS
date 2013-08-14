<?php slot("content_title");?>
	Setup Wizard
<?php end_slot();?>
<style type="text/css">
input.error{border: 1px solid red;}
.tablecontent div div.td{position:relative;}
.tablecontent div div.td span{display:none;color: red; position: absolute; bottom: -20px; right: 0px;}
.tablecontent div div.td span.error{display:block !important;} 
</style>
<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td>  
  		<div id="wizard" class="swMain">
  			<ul>
  			<li><a href="#step-1">
                <label class="stepNumber">Start</label>
                
            </a></li>
  				<li><a href="#step-2">
                <label class="stepNumber">Company Configuration</label>
            </a></li>
  				<li><a href="#step-3">
                <label class="stepNumber">Financial Settings</label>               
             </a></li>
  				<li><a href="#step-4">
                <label class="stepNumber">Invoice Settings</label>                 
            </a></li>
            <li><a href="#step-5">
                <label class="stepNumber">Currencies</label>                 
            </a></li>
            <li><a href="#step-6">
                <label class="stepNumber">Tax Rates</label>                 
            </a></li>
            <li><a href="#step-7">
                <label class="stepNumber">Chart of Accounts</label>                 
            </a></li>
            <li><a href="#step-8">
                <label class="stepNumber">Account Balances</label>                 
            </a></li>
  			</ul>
  			
  			<div id="step-1"></div>    
  			<div id="step-2"></div>    
  			<div id="step-3"></div>    
  			<div id="step-4"></div>    
  			<div id="step-5"></div>    
  			<div id="step-6"></div>    
  			<div id="step-7"></div>    
  			<div id="step-8"></div>    
  		</div> 
 		
</td></tr>
</table>
<script type="text/javascript"> 
	var to_validate_twice		= true;
	var to_validate_twice_step3 = true;
    $(document).ready(function(){ 
  		$('#wizard').smartwizardJM({contentURL:'<?php echo url_for("setup/nextstep");?>',
								    contentCache: false,
								    onLeaveStep: leaveAStepCallback,
									onFinish: onFinishCallback,
									keyNavigation: false
								  });      
		function onFinishCallback()
		{
			$('#wizard').smartwizardJM('showMessage','Congratulations!');
			window.location = "<?php echo url_for("@dashboard");?>";
		}    
		
		function leaveAStepCallback(obj,to)
		{
			var fromStepIdx = obj.attr( "rel" );
			var toStepIdx = to.attr( "rel" );
			if ( toStepIdx < fromStepIdx )
			{ 
				to_validate_twice 	    = true;
			 	to_validate_twice_step3 = true;
				return true;
			}
			var step_num= obj.attr('rel');
			return validateSteps(step_num);
		} 
	}); 
		
	function validateSteps(step){  
		  var isStepValid = true;
		  // validate step 2 
		  if(step == 2){  
			if(validateStep2() == false ){
			  isStepValid = false; 
			  $('#wizard').smartwizardJM('showMessage','Please correct the errors in step'+step+ ' and click next.');
			  $('#wizard').smartwizardJM('setError',{stepnum:step,iserror:true});         
			}else{
				if(to_validate_twice){
					isStepValid = false;
					var ajax_onprocess = true;
					//if valid, try submitting the form to validate / save  
					var form_data = $("#step-2").find("form").serialize(); 
						$.ajax({
							url: "<?php echo url_for("setup/save?step=2");?>",
							method: "POST",
							data: form_data,
							type: "json", 
							success: function(response){ 
									var response_data = eval("("+response+")");  
									var ajax_onprocess = false;;								
									if(!response_data.success){
										to_validate_twice = true;
										isValid=false; 
										$('#wizard').smartwizardJM('showMessage','Error on saving the form.');
									}else{
										isStepValid = false;
										$('#wizard').smartwizardJM('setError',{stepnum:step,iserror:false});
										$(".msgBox").remove();
										to_validate_twice = false;
										$(".buttonNext").trigger("click"); 
									}
							}												
					});  
					
					if(ajax_onprocess){
						$('#wizard').smartwizardJM('showMessage','Please wait ... ');
						$('#wizard').smartwizardJM('setError',{stepnum:step,iserror:true});   
					} 
				}else{ 
					$('#wizard').smartwizardJM('setError',{stepnum:step,iserror:false});
				}
			}
		  }
	  
		  // validate step3
		  if(step == 3){ 
				if(validateStep3() == false ){
				  isStepValid = false; 
				  $('#wizard').smartwizardJM('showMessage','Please correct the errors in step '+step+ ' and click next.');
				  $('#wizard').smartwizardJM('setError',{stepnum:step,iserror:true});         
				}else{
						if(to_validate_twice_step3){
							isStepValid = false;
						//    var ajax_onprocess = true;
							var form_data = $("#step-3").find("form").serialize(); 
							$.ajax({
								url: "<?php echo url_for("setup/save?step=3");?>",
								method: "POST",
								data: form_data,
								type: "json", 
								success: function(response){ 
										var response_data = eval("("+response+")");   						
										if(!response_data.success){
											to_validate_twice_step3 = true;
											isValid=false; 
											$('#wizard').smartwizardJM('showMessage','Error on saving the form.');
										}else{;
											isStepValid = false;
											$('#wizard').smartwizardJM('setError',{stepnum:step,iserror:false});
											$(".msgBox").remove();
											to_validate_twice_step3 = false;
											$(".buttonNext").trigger("click"); 
										}
								}												
							});  
							if(ajax_onprocess){
								$('#wizard').smartwizardJM('showMessage','Please wait ... ');
								$('#wizard').smartwizardJM('setError',{stepnum:step,iserror:true});   
							} 
					}else{ 
						$('#wizard').smartwizardJM('setError',{stepnum:step,iserror:false});
					} 
				}
		  }
		  
		  return isStepValid;
		}
		
	function validateStep2(){  
	
		$("#step-2").find(".tablecontent").find("div#table").each(function(){ 
			$(this).find("input").removeClass('error');
			$(this).find("span").removeClass('error');
		});
		var isValid = true;  
		if($("#organization_display_name").val() == ""){
			$("#organization_display_name").addClass("error");
			$("#organization_display_name").next().addClass("error");
			isValid = false;
		}  
		if($("#organization_legal_name").val() == ""){
			$("#organization_legal_name").addClass("error");
			$("#organization_legal_name").next().addClass("error");
			isValid = false;
		}  
		if($("#organization_branch_code").val() == ""){
			$("#organization_branch_code").addClass("error");
			$("#organization_branch_code").next().addClass("error");
			isValid = false;
		}  
		if($("#organization_rdo_code").val() == ""){
			$("#organization_rdo_code").addClass("error");
			$("#organization_rdo_code").next().addClass("error");
			isValid = false;
		}  
		if($("#organization_city").val() == ""){
			$("#organization_city").addClass("error");
			$("#organization_city").next().addClass("error");
			isValid = false;
		}  
		if($("#organization_email").val() == ""){
			$("#organization_email").addClass("error");
			$("#organization_email").next().addClass("error");
			isValid = false;
		}  
		if($("#organization_telephone_number").val() == ""){
			$("#organization_telephone_number").addClass("error");
			$("#organization_telephone_number").next().addClass("error");
			isValid = false;
		}  
	//	if($("#organization_tin").val() == ""){
	//		$("#organization_tin").addClass("error");
	//		$("#organization_tin").next().addClass("error");
	//		isValid = false;
	//	}  
		return isValid; 
		
	}
    
    function validateStep3(){
		  var isValid = true;    
		  
		  $("#financial_setting_currency_id").css('border','none');
		  console.log($("#financial_setting_currency_id").val());
		  
		  if($("#financial_setting_currency_id").val() == ""){
				$("#financial_setting_currency_id").css('border','1px solid red');
				isValid = false;
		  }
		  
		  return isValid;
    }
    
    // Email Validation
    function isValidEmailAddress(emailAddress) {
		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
		return pattern.test(emailAddress);
    } 
	  
</script> 		
