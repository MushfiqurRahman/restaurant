<div class="orders view">
<h2><?php  echo __('Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Table'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Table']['title'], array('controller' => 'tables', 'action' => 'view', $order['Table']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Waiter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Waiter']['name'], array('controller' => 'waiters', 'action' => 'view', $order['Waiter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Items'); ?></dt>
		<dd>
			<?php echo h($order['Order']['items']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grand Total'); ?></dt>
		<dd>
			<?php echo h($order['Order']['grand_total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Printed'); ?></dt>
		<dd>
			<?php echo h($order['Order']['is_printed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($order['Order']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($order['Order']['comments']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

