<div class="header_wrapper">   
   		<div class="sub_header_wrapper">
       	  	<div class="logo">
				<a href="<?php echo url_for("@dashboard");?>"><?php echo image_tag("logo.png");?></a>
          	</div> 
            <div class="profile">
            	<ul>
                	<li>Hello <a href="">Name</a>,</li>
                    <li>My Profile</li>
                    <li>Help</li>
                    <li>Logout</li>
                </ul>
            </div>
            
            <div class="clear"></div>  
				<?php include_partial("global/header/menu");?>            
            <div class="company">
            	<?php echo OrganizationTable::getDisplayName();?>
            </div>
            
            <div class="clear"></div>
        </div>        
        <div class="page_title">
        	<div class="page_title_left">            
				<h1><?php if ($page_header = get_slot("content_title", false)): ?><?php echo $page_header;?><?php endif;?></h1>
            </div>
        </div>     
</div>