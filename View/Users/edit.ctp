<div class="action_menu">
	<?php echo $this->element('admin_options'); ?>
</div>

<div class="manage_fieldset">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('编辑用户'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array('label'=>'用户名'));
		echo $this->Form->input('password', array('label'=>'密码'));
		echo $this->Form->input('email', array('label'=>'电子邮箱'));
	?>
	<?php echo $this->Form->end(__('提交')); ?>
	</fieldset>
</div>

