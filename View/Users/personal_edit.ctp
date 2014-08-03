<div id="bigBox">

<div class="psw_modify">
	<?php echo $this->Form->create('User'); ?>
	<ul id="inputLine">
	<li id="psw_modify_li1">旧密码</li>
	<li id="psw_modify_li2">
	<?php echo $this->Form->input('old password',array('label'=>'','type'=>'password'));?>
	</li>
	<li id="psw_modify_li1">新密码</li>
	<li id="psw_modify_li2">
	<?php echo $this->Form->input('password',array('label'=>'','type'=>'password'));?>
	</li>
	<li id="psw_modify_li1">确认密码</li>
	<li id="psw_modify_li2">
	<?php echo $this->Form->input('confirm new password',array('label'=>'','type'=>'password'));?>
	</li>
	<li id="psw_modify_li3">
	<?php echo $this->Form->end(__('提交')); ?>
	</li>
	</ul>
</div>
</div>
