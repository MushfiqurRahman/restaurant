<div class="menus view">
<h2><?php  echo __('Menu'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descr'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['descr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo $this->Html->image(Configure::read('BaseURL').'uploads/'.$menu['Menu']['img'], array('height' => 80, 'width' => 100)); ?>
			&nbsp;
		</dd>
	</dl>
</div>
