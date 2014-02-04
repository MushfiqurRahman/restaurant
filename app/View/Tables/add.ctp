<div class="tables form">
<?php echo $this->Form->create('Table'); ?>
	<fieldset>
		<legend><?php echo __('Add Table'); ?></legend>
	<?php
		echo $this->Form->input('title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
