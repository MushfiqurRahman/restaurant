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
		echo $this->Form->input('price', array('required' => true, 'div' =>'required'));
		echo $this->Form->input('discount', array('value' => 0, 'required' => true, 'div' =>'required'));
		echo $this->Form->input('is_featured');
//		echo $this->Form->input('subcategory_id', array('required' => true, 'div' => 'required'));
                echo $this->Form->input('category_id', array('required' => true, 'div' => 'required'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
