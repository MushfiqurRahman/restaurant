<div class="tables form">
<?php echo $this->Form->create('Table'); ?>
	<fieldset>
		<legend><?php echo __('Edit Table'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

