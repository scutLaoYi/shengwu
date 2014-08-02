<div id = "bigBox">
<div id="action_box">
	<div id="leftBox">
		<?php ?>
		<div id="login_title"></div>
	</div>
<div id="moving_ad"></div>
</div>
	<div class="loginBox">
	<div id="fieldset_box">
			<?php echo $this->Form->create('User'); ?>
				<ul id="inputLine">
					<li id="inputIcon">
						<div id="username"></div>
					</li>
					<li id="inputTest_li"><p>用户名</p></li>
					<li id="inputField_li">
						<?php echo $this->Form->input('username',array('label'=>''));?>
					</li>
					<li id="inputIcon">
						<div id="password"></div>
					</li>
					<li id="inputTest_li"><p>密码</p></li>
					<li id="inputField_li">
			      	<?php echo $this->Form->input('password',array('label'=>''));?>
					</li>
					<li id="inputIcon">
						<div id="email"></div>
					</li>
					<li id="inputTest_li"><p>验证码</p></li>
					<li id="yanzhengma">
							<?php $this->Captcha->render($captchaSettings);?>
					</li>
					<li id="forget_psw">
						<?php echo $this->Html->link('忘记密码',array('action'=>'forget_password'));?>
					</li>
					<li id="loginBtn_li">
						<?php echo $this->Form->end(__('登录')); ?>
					</li>
				</ul>
	</div>
	</div>
</div>

