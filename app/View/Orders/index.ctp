<div class="orders index">
	<h2><?php echo __('Orders'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('table_id'); ?></th>
			<th><?php echo $this->Paginator->sort('waiter_id'); ?></th>
			<th><?php echo __('Items Detail'); ?></th>
			<th><?php echo $this->Paginator->sort('grand_total'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('comments'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orders as $order): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($order['Table']['title'], array('controller' => 'tables', 'action' => 'view', $order['Table']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['Waiter']['name'], array('controller' => 'waiters', 'action' => 'view', $order['Waiter']['id'])); ?>
		</td>
                <td>
                    <table>
                        <tr><td>Item(n)</td><td>Ingredients</td></tr>
                        <?php
                            foreach($order['Order']['items'] as $itm){
                                echo '<tr><td>'.$this->Html->link($itm['title'], array(
                                    'controller' => 'items', 'action' => 'view', $itm['id'])).
                                    ' ('. $itm['quantity'].')</td><td>'.$itm['ingredients'].
                                    '</td></tr>';
                            }
                        ?>
                    </table>
                    
                </td>
		<td><?php echo h($order['Order']['grand_total']); ?>&nbsp;</td>		
		<td><?php echo h($order['Order']['created']); ?>&nbsp;</td>
		<td><?php echo h($order['Order']['comments']); ?>&nbsp;</td>
		<td class="actions">			
			<?php 
                            if($order['Order']['is_printed']==0){
                                echo $this->Html->link(__('Print Order'), array('action' => 'edit', $order['Order']['id']));
                            }
                            echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 
                                $order['Order']['id']), null, __('Are you sure you want to delete # %s?', $order['Order']['id']));
                        ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
