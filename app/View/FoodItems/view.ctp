<div class="foodItems view">
<h2><?php echo __('Food Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($foodItem['FoodItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin'); ?></dt>
		<dd>
			<?php echo $this->Html->link($foodItem['Admin']['id'], array('controller' => 'admins', 'action' => 'view', $foodItem['Admin']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($foodItem['FoodItem']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sku'); ?></dt>
		<dd>
			<?php echo h($foodItem['FoodItem']['sku']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($foodItem['FoodItem']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($foodItem['FoodItem']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stock'); ?></dt>
		<dd>
			<?php echo h($foodItem['FoodItem']['stock']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($foodItem['FoodItem']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meal Type'); ?></dt>
		<dd>
			<?php echo h($foodItem['FoodItem']['meal_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serving Time'); ?></dt>
		<dd>
			<?php echo h($foodItem['FoodItem']['serving_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($foodItem['FoodItem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($foodItem['FoodItem']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Food Item'), array('action' => 'edit', $foodItem['FoodItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Food Item'), array('action' => 'delete', $foodItem['FoodItem']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $foodItem['FoodItem']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Food Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Food Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Admins'), array('controller' => 'admins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Admin'), array('controller' => 'admins', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Items'), array('controller' => 'order_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Item'), array('controller' => 'order_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Order Items'); ?></h3>
	<?php if (!empty($foodItem['OrderItem'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Food Item Id'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($foodItem['OrderItem'] as $orderItem): ?>
		<tr>
			<td><?php echo $orderItem['id']; ?></td>
			<td><?php echo $orderItem['order_id']; ?></td>
			<td><?php echo $orderItem['food_item_id']; ?></td>
			<td><?php echo $orderItem['price']; ?></td>
			<td><?php echo $orderItem['created']; ?></td>
			<td><?php echo $orderItem['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'order_items', 'action' => 'view', $orderItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'order_items', 'action' => 'edit', $orderItem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'order_items', 'action' => 'delete', $orderItem['id']), array('confirm' => __('Are you sure you want to delete # %s?', $orderItem['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order Item'), array('controller' => 'order_items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
