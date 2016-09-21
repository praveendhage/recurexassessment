<div class="admins form">
<?php echo $this->Form->create('Admin'); ?>
	<fieldset>
		<legend><?php echo __('Add Admin'); ?></legend>
	<?php
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('mobile');
		echo $this->Form->input('profile_pic');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Admins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Food Items'), array('controller' => 'food_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Food Item'), array('controller' => 'food_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
