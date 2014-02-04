<div class="orders form">
<?php echo $this->Form->create('Order'); ?>
	<fieldset>
		<legend><?php echo __('Add Order'); ?></legend>
	<?php
		echo $this->Form->input('table_id');
		echo $this->Form->input('waiter_id');
		echo $this->Form->input('items');
		echo $this->Form->input('grand_total');
		echo $this->Form->input('is_printed');
		echo $this->Form->input('comments');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
