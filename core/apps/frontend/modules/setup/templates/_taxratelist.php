<div class="row">
	<div class="cell-header-check"><input type="checkbox" /></div>
	<div class="cell-header-title">Name</div>
	<div class="cell-header-title">Tax Rates</div>
</div>  
<?php if($rates->count()>0):?>
	<?php foreach($rates as $rate):?>			
			<div class="row">
				<div class="cell"><input type="checkbox" value="<?php echo $rate->getId();?>"/></div>
				<div class="cell"><?php echo $rate->getTitle();?></div>
				<div class="cell"><strong><?php echo $rate->getTaxRatePercent();?>%</strong></div>
			</div>       
	<?php endforeach;?>
<?php else:?>
			<div class="row">
				<div class="cell">No Tax rates set up.</div>
			</div>        
<?php endif;?>