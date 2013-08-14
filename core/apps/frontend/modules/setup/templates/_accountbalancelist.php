<div class="row">
	<div class="cell-header-check"><input type="checkbox" /></div>
	<div class="cell-header-title">Code</div>
	<div class="cell-header-title">Account</div>
	<div class="cell-header-title">Debit</div>
	<div class="cell-header-title">Credit</div>
</div>
<?php if($balances->count()>0):?>
	<?php foreach($balances as $balance):?>
		<div class="row">	
			<div class="cell"><input type="checkbox" value="<?php echo $balance->getId();?>" id="<?php echo $balance->getId();?>"/></div>
			<div class="cell"><?php echo $balance->getChartOfAccount()->getCode();?></div>
			<div class="cell"><?php echo $balance->getChartOfAccount()->getTitle();?></div>
			<div class="cell"><?php echo $balance->getDebit();?></div>
			<div class="cell"><?php echo $balance->getCredit();?></div> 
		</div>   
		<?php endforeach;?>
<?php else:?>
			<div class="row">
				<div class="cell">No Account Balance set.</div>
			</div>        
<?php endif;?>