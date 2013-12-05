<div id="anotherPageBox">

<?php echo $this->Form->create('User'); ?>
<fieldset>
	<legend><?php echo __('修改密码'); ?></legend>
	<?php 
		echo $this->Form->input('old password',array('label'=>'旧密码','type'=>'password'));
		echo $this->Form->input('new password',array('label'=>'新密码','type'=>'password'));
		echo $this->Form->input('confirm new password',array('label'=>'确认新密码','type'=>'password'));
		echo $this->Form->input('email', array('label'=>'邮箱'));
	?>
</fieldset>

<?php echo $this->Form->end(__('提交')); ?>
</div>
