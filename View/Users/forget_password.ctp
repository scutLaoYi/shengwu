<div id="anotherPageBox">
	<h2><?php echo('找回密码');?>
		<?php echo $this->Form->create('Password')?>
		<?php echo $this->Form->input('username',array('label'=>'请输入用户名'));?>
		<?php echo $this->Form->end('提交');?>
</div>
	
