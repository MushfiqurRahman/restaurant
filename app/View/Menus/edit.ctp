<div class="menus form">
<?php echo $this->Form->create('Menu',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Menu'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('descr');
		echo $this->Form->input('img',array('type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
