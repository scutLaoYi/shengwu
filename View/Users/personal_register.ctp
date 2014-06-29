<div class="loginBox">
<?php echo $this->Form->create('User'); ?>
<fieldset>
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
				<div id="password"></div>
			</li>
			<li id="inputTest_li"><p>确认密码</p></li>
			<li id="inputField_li">
			<?php echo $this->Form->input('confirm_password',array('label'=>'','type'=>'password'));?>
			</li>
			<li id="inputIcon">
				<div id="email"></div>
			</li>
			<li id="inputTest_li"><p>电子邮箱</p></li>
			<li id="inputField_li">
				<?php echo $this->Form->input('email',array('label'=>''));	?>
			</li>
			<li id="inputIcon">
				<div id="email"></div>
			</li>
			<li id="inputTest_li"><p>验证码</p></li>
			<li id="inputField_li">
						<?php $this->Captcha->render($captchaSettings);?>
			</li>
			<li id="button_li">
				<?php echo $this->Form->end(__('提交')); ?>
			</li>
		</ul>
</fieldset>
</div>
