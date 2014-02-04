<div class="items form">
<?php echo $this->Form->create('Item',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('descr');
		echo $this->Form->input('img',array('type' => 'file'));
		echo $this->Form->input('ingredients');
		echo $this->Form->input('price');
		echo $this->Form->input('discount');
		echo $this->Form->input('is_featured');
		echo $this->Form->input('Subcategory');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
