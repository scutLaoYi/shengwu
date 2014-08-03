<div id="bigBox">
	<div class="forgetpsw">
		<?php echo $this->Form->create('Password')?>
		<ul id="inputLine">
		<li id="psw_modify_li1">请输入用户名</li>
		<li id="psw_modify_li2">
		<?php echo $this->Form->input('username',array('label'=>''));?>
		</li>
		<li id="psw_modify_li1">验证码</li>
		<li id="psw_yanzhengma">
		<?php echo $this->Captcha->render($captchaSettings);?>
		</li>
		<li id="psw_modify_li3">
		<?php echo $this->Form->end(__('提交')); ?>
		</li>
	</div>
</div>
	
