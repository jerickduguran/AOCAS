<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
		<div class="header_wrapper">   
			<div class="sub_header_wrapper" align="center"> 
				<?php echo image_tag("logo.png");?>
			</div>			
			<div style="text-align:center; font-size:18px; color:#666; font-weight:bold; padding-top:16px;">
				Welcome to G Cross Accounting System
			</div>     
		</div>		
		<div class="main_body">		
			<?php echo $sf_content;?> 
		</div>
    
		<?php include_partial("global/footer");?>
  </body>
</html>
