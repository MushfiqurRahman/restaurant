<div class="settings view">
<h2><?php  echo __('Setting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Variable Name'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['variable_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['label']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

