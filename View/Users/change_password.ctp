<div id="anotherPageBox">
<?php echo $this->Form->create('User'); ?>
<fieldset>
	<legend><?php echo __($user.'修改密码'); ?></legend>
	<?php 

		echo $this->Form->input('password',array('label'=>'密码'));
		echo $this->Form->input('password_confirm',array('label'=>'确认密码','type'=>'password'));

	?>
</fieldset>
<?php echo $this->Form->end(__('提交')); ?>
</div>
