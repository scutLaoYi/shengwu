<div id="anotherPageBox">
	<fieldset>
		<legend><?php echo('找回密码');?></legend>
		<?php echo $this->Form->create('Password')?>
		<?php echo $this->Form->input('username',array('label'=>'请输入用户名'));?>
	<?php echo $this->Form->end(__('提交')); ?>
	</fieldset>

</div>
	
