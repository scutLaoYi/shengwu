<div id="anotherPageBox">
<?php echo $this->Form->create('User'); ?>
<fieldset>
	<legend><?php echo __('个人注册信息'); ?></legend>
	<?php 
		echo $this->Form->input('username',array('label'=>'用户名'));
		echo $this->Form->input('password',array('label'=>'密码'));
		echo $this->Form->input('confirm_password',array('label'=>'确认密码','type'=>'password'));
		echo $this->Form->input('email',array('label'=>'电子邮箱'));	
	?>
</fieldset>
<?php echo $this->Form->end(__('提交')); ?>
</div>
