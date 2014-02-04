<div class="items view">
<h2><?php  echo __('Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($item['Item']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($item['Item']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descr'); ?></dt>
		<dd>
			<?php echo h($item['Item']['descr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo $this->Html->image(Configure::read('BaseURL').'uploads/'.$item['Item']['img'], array('height' => 80, 'width' => 100)); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ingredients'); ?></dt>
		<dd>
			<?php echo h($item['Item']['ingredients']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($item['Item']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount'); ?></dt>
		<dd>
			<?php echo h($item['Item']['discount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Featured'); ?></dt>
		<dd>
			<?php echo h($item['Item']['is_featured']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

