<div class="ads form">
<?php echo $this->Form->create('Ad',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Ad'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('descr');
		echo $this->Form->input('img',array('type' => 'file', ));
		echo $this->Form->input('link');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
