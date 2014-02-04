<div class="subcategories form">
<?php echo $this->Form->create('Subcategory',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Subcategory'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('title');
		echo $this->Form->input('descr');
		echo $this->Form->input('img',array('type' => 'file'));
		echo $this->Form->input('Item');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

