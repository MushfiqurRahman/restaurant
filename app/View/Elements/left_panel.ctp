<div class="actions">
	
	<ul>
		<li><?php echo $this->Html->link(__('User'), array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Items'), array('controller' => 'items', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Orders'), array('controller' =>'orders', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Menus'), array('controller' => 'menus', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Categories'), array('controller' => 'categories','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Subcategories'), array('controller' => 'subcategories','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Tables'), array('controller' => 'tables','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Waiters'), array('controller' => 'waiters','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Ads'), array('controller' => 'ads','action' => 'index')); ?></li>
	</ul>

	<ul style="margin-top: 100px;">
		<li><?php 
		$cntlr_name = $this->request->params['controller'];
		
		$models = array('users' => 'User', 'categories' => 'Category', 'orders' => 'Order', 
					'items' => 'Item', 'menus' => 'Menu', 'subcategories' => 'Subcategory',
					'waiters' => 'Waiter', 'ads' => 'Advertisement', 'tables' => 'Table',
					'settings' => 'Setting');
		// pr($cntlr_name);
		echo $this->Html->link(__('Add New '.$models[$cntlr_name]), array('controller' => $cntlr_name, 'action' => 'add')); ?></li>
	</ul>
</div>