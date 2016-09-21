<div class="admins view">
<h2><?php echo __('Admin'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profile Pic'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['profile_pic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($admin['Admin']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Admin'), array('action' => 'edit', $admin['Admin']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Admin'), array('action' => 'delete', $admin['Admin']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $admin['Admin']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Admins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Admin'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Food Items'), array('controller' => 'food_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Food Item'), array('controller' => 'food_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Food Items'); ?></h3>
	<?php if (!empty($admin['FoodItem'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Admin Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Sku'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Stock'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Meal Type'); ?></th>
		<th><?php echo __('Serving Time'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($admin['FoodItem'] as $foodItem): ?>
		<tr>
			<td><?php echo $foodItem['id']; ?></td>
			<td><?php echo $foodItem['admin_id']; ?></td>
			<td><?php echo $foodItem['name']; ?></td>
			<td><?php echo $foodItem['sku']; ?></td>
			<td><?php echo $foodItem['description']; ?></td>
			<td><?php echo $foodItem['price']; ?></td>
			<td><?php echo $foodItem['stock']; ?></td>
			<td><?php echo $foodItem['image']; ?></td>
			<td><?php echo $foodItem['meal_type']; ?></td>
			<td><?php echo $foodItem['serving_time']; ?></td>
			<td><?php echo $foodItem['created']; ?></td>
			<td><?php echo $foodItem['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'food_items', 'action' => 'view', $foodItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'food_items', 'action' => 'edit', $foodItem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'food_items', 'action' => 'delete', $foodItem['id']), array('confirm' => __('Are you sure you want to delete # %s?', $foodItem['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Food Item'), array('controller' => 'food_items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
