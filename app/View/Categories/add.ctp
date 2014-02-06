<div class="categories form">
<?php echo $this->Form->create('Category',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Category'); ?></legend>
	<?php
		echo $this->Form->input('Menu', array('required' => true, 'size' => 3, 'div' => 'required'));
		echo $this->Form->input('title');
		echo $this->Form->input('descr');
		echo $this->Form->input('img',array('type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
