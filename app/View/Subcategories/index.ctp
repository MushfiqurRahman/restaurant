<div class="subcategories index">
	<h2><?php echo __('Subcategories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('descr'); ?></th>
			<th><?php echo $this->Paginator->sort('img'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($subcategories as $subcategory): ?>
	<tr>
		<td><?php echo h($subcategory['Subcategory']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($subcategory['Category']['title'], array('controller' => 'categories', 'action' => 'view', $subcategory['Category']['id'])); ?>
		</td>
		<td><?php echo h($subcategory['Subcategory']['title']); ?>&nbsp;</td>
		<td><?php echo h($subcategory['Subcategory']['descr']); ?>&nbsp;</td>
		<td><?php echo $this->Html->image(Configure::read('BaseURL').'uploads/'.$subcategory['Subcategory']['img'], array('height' => 80, 'width' => 100)); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $subcategory['Subcategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subcategory['Subcategory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subcategory['Subcategory']['id']), null, __('Are you sure you want to delete # %s?', $subcategory['Subcategory']['id'])); ?>
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

