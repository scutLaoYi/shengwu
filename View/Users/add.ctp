<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('创建管理员'); ?></legend>
	<?php
		echo $this->Form->input('username',array('label'=>'用户名'));
		echo $this->Form->input('password',array('label'=>'密码','type'=>'password'));
		echo $this->Form->input('email',array('lable'=>'电子邮箱'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<?php $this->element('admin_options');?>
</div>
