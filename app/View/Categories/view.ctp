<div class="categories view">
<h2><?php  echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Menu'); ?></dt>
		<dd>
			<?php echo $this->Html->link($category['Menu']['title'], array('controller' => 'menus', 'action' => 'view', $category['Menu']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($category['Category']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descr'); ?></dt>
		<dd>
			<?php echo h($category['Category']['descr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo $this->Html->image(Configure::read('BaseURL').'uploads/'.$category['Category']['img'], array('height' => 80, 'width' => 100)); ?>
			&nbsp;
		</dd>
	</dl>
</div>
