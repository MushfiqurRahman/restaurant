<div class="settings form">
<?php echo $this->Form->create('Setting'); ?>
	<fieldset>
		<legend><?php echo __('Edit Setting'); ?></legend>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('variable_name');
		echo $this->Form->input('value');
		echo $this->Form->input('label');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
