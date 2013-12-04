<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('编辑用户'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array('label'=>'用户名'));
		echo $this->Form->input('password', array('label'=>'密码'));
		echo $this->Form->input('email', array('label'=>'电子邮箱'));
		echo $this->Form->input('type', array('label'=>'类型','options'=>$allUserType));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
<?php echo $this->Html->link('返回', $referer); ?>
</div>

<div class="actions">
	<?php echo $this->element('admin_options'); ?>
</div>
