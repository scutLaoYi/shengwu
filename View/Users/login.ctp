<div class = "users form">
<?php echo $this->Form->create('User'); ?>
<fieldset>
	<legend><?php __('请输入帐号和密码'); ?></legend>
		<?php echo $this->Form->input('username');
		      echo $this->Form->input('password');
		?>
</fieldset>

<?php echo $this->Form->end(__('登录')); ?>
<?php echo $this->Html->link('忘记密码',array('action'=>'forget_password'));?>
</div>
