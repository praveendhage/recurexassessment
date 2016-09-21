<div class="foodItems form">
<?php echo $this->Form->create('FoodItem'); ?>
	<fieldset>
		<legend><?php echo __('Add Food Item'); ?></legend>
	<?php
		echo $this->Form->input('admin_id');
		echo $this->Form->input('name');
		echo $this->Form->input('sku');
		echo $this->Form->input('description');
		echo $this->Form->input('price');
		echo $this->Form->input('stock');
		echo $this->Form->input('image');
		echo $this->Form->input('meal_type');
		echo $this->Form->input('serving_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Food Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Admins'), array('controller' => 'admins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Admin'), array('controller' => 'admins', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Items'), array('controller' => 'order_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Item'), array('controller' => 'order_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
