<?php $noti_types = array('alert','information','error','warning','notification','success');?>
<?php $inc_script = true;?>
<div id="notifications" style="width:1000px;margin:0 auto;z-index:1000;">
	<div style="position:absolute;top:100px;">
	<?php foreach($noti_types as $type):?>
		<?php if($sf_user->hasFlash($type)):?> 
			<?php $message =  $sf_user->getFlash($type);?> 		
			<?php if($inc_script == true):?>
				<script>		
					function showNotification(message,type){
						var n = $('div#notifications').noty({
							  text: message,
							  type: type,
							  dismissQueue: true,
							  layout: 'topCenter',
							  theme: 'defaultTheme',
							  timeout: 10000
							});
					}
				</script>
			<?php endif;?>
			<script>
				$(document).ready(function(){
					showNotification("<?php echo $message;?>","<?php echo $type;?>");
				});
			</script>
		<?php endif;?>
	<?php endforeach;?>
	</div>
</div>