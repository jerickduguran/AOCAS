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
		<?php include_partial("global/header/header");?> 
		<div class="main_body">    
		  <div class="main_body_reminders">
				<div class="main_body_header">
					<a href="">Reminders</a>
				</div>

				<div class="box">
					<ul>
						<li><a href="">49 Sales Order to Bill</a></li>
						<li><a href="">9 Invoices that are Overdue</a></li>
						<li><a href="">32 Bill to Pay</a></li>
						<li><a href="">10 Purchase Order to Bill</a></li>
						<li><a href="">6 Quotes to Approve</a></li>
						<li><a href="">2 Opportunities to Close</a></li>
						<li><a href="">6 Quotes to Approve</a></li>
						<li><a href="">2 Opportunities to Close</a></li>
						<li><a href="">6 Quotes to Approve</a></li>
						<li><a href="">2 Opportunities to Close</a></li>
					</ul>
				</div>
		  </div>
		<?php echo $sf_content;?>
		</div>
		<?php include_partial("global/footer");?>
  </body>
</html>
