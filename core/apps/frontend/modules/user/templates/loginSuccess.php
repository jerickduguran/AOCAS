<div style="width:300px; margin: 0 auto; border:#CCC solid thin; padding:20px;position:relative;">
	<form id="frmlogin" action="<?php echo url_for("@authenticate");?>" method="post">
		<div style="padding:5px; 0px;">
			Username
		</div>            
		<div>
			<input type="text" name="username" class="formControlLogin" />
		</div>	
		<div style="padding:5px; 0px;">
			Password
		</div>            
		<div>
			<input type="password" name="password" class="formControlLogin" />
		</div>
		<?php if($sf_user->hasFlash('error')):?>
			<div class="" style="color:red;font-size:10px;position:absolute:bottom:20px;">Invalid Username/Password</div>
		<?php endif;?>	
		<div class="formControlBtn" align="right">
			<a href="javascript::void(0);" class="btnSave login">Login</a>
		</div>
	</form>
</div>
<script>	
	$(document).ready(function(){
		$(".login").click(function(){
			$("form#frmlogin").submit();
		});
	});
</script>