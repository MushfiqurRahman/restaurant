<div class="subcategories view">
<h2><?php  echo __('Subcategory'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subcategory['Subcategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subcategory['Category']['title'], array('controller' => 'categories', 'action' => 'view', $subcategory['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($subcategory['Subcategory']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descr'); ?></dt>
		<dd>
			<?php echo h($subcategory['Subcategory']['descr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo $this->Html->image(Configure::read('BaseURL').'uploads/'.$subcategory['Subcategory']['img'], array('height' => 80, 'width' => 100)); ?>
			&nbsp;
		</dd>
	</dl>
</div>

