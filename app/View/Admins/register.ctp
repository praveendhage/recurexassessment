<div class="admins form">
<?php echo $this->Form->create('Admin', array("enctype" => "multipart/form-data")); ?>
	<fieldset>
		<legend><?php echo __('Register Admin'); ?></legend>
	<?php
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('confirm_password', array("type" => "password"));
		echo $this->Form->input('mobile');
		echo $this->Form->input('profile_pic', array("type" => "file"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>