<div class="row">
	<div class="cell-header-check"><input type="checkbox" /></div>
	<div class="cell-header-title">Code</div>
	<div class="cell-header-title">Title</div>
	<div class="cell-header-title">Class Type</div>
	<div class="cell-header-title">Tax Rate</div>
</div>
<?php if($coa->count()>0):?>
	<?php foreach($coa as $account):?>
		<div class="row">	
			<div class="cell"><input type="checkbox" value="<?php echo $account->getId();?>" id="<?php echo $account->getId();?>"/></div>
			<div class="cell"><?php echo $account->getCode();?></div>
			<div class="cell"><?php echo $account->getTitle();?></div>
			<div class="cell"><?php echo $account->getAccountType()->getName();?></div>
			<div class="cell"><?php echo $account->getTaxClass()->getTaxRatePercent();?></div> 
		</div>   
		<?php endforeach;?>
<?php else:?>
			<div class="row">
				<div class="cell">No Tax rates set up.</div>
			</div>        
<?php endif;?>