<div class="ads view">
<h2><?php  echo __('Ad'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ad['Ad']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($ad['Ad']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descr'); ?></dt>
		<dd>
			<?php echo h($ad['Ad']['descr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo $this->Html->image(Configure::read('BaseURL').'uploads/'.$ad['Ad']['img'], array('height' => 80, 'width' => 100)); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($ad['Ad']['link']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
