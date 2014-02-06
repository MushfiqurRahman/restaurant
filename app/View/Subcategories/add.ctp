<div class="subcategories form">
<?php echo $this->Form->create('Subcategory',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Subcategory'); ?></legend>
	<?php
		echo $this->Form->input('category_id');
		echo $this->Form->input('title');
		echo $this->Form->input('descr');
		echo $this->Form->input('img',array('type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
