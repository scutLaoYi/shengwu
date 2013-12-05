<div class = "users form">
<?php echo $this->Form->create('User'); ?>
<fieldset>
	<legend><?php __('请输入帐号和密码'); ?></legend>
		<?php echo $this->Form->input('username',array('label'=>'用户名'));
		      echo $this->Form->input('password',array('label'=>'密码'));
		?>
</fieldset>

<?php echo $this->Form->end(__('登录')); ?>
<?php echo $this->Html->link('忘记密码',array('action'=>'forget_password'));?>
</div>
