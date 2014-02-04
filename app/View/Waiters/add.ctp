<div class="waiters form">
<?php echo $this->Form->create('Waiter'); ?>
	<fieldset>
		<legend><?php echo __('Add Waiter'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
