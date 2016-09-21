<div class="admins form">
<?php echo $this->Form->create('Admin'); ?>
	<fieldset>
		<legend><?php echo __('Login Administrator'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Html->link("Register", array("controller" => "admins", "action" => "register")); ?>