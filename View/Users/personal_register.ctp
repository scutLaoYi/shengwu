<div id="anotherPageBox">
<?php echo $this->Form->create('User'); ?>
<fieldset>
	<div class="inputLine">
		<ul>
			<li id="inputIcon">
				<div id="username"></div>
			</li>
			<li id="inputTest_li"><p>用户名</p></li>
			<li id="inputField_li">
				<div id="inputField2">
				<?php echo $this->Form->input('username',array('label'=>''));?>
				</div>
			</li>
		</ul>
	</div>
	<div class="inputLine">
		<ul>
			<li id="inputIcon">
				<div id="password"></div>
			</li>
			<li id="inputTest_li"><p>密码</p></li>
			<li id="inputField_li">
				<div id="inputField2">
				<?php echo $this->Form->input('password',array('label'=>''));?>
				</div>
			</li>
		</ul>
	</div>
	<div class="inputLine">
		<ul>
			<li id="inputIcon">
				<div id="password"></div>
			</li>
			<li id="inputTest_li"><p>确认密码</p></li>
			<li id="inputField_li">
				<div id="inputField2">
			<?php echo $this->Form->input('confirm_password',array('label'=>'','type'=>'password'));?>
				</div>
			</li>
		</ul>
	</div>
	<div class="inputLine">
		<ul>
			<li id="inputIcon">
				<div id="email"></div>
			</li>
			<li id="inputTest_li"><p>电子邮箱</p></li>
			<li id="inputField_li">
				<div id="inputField2">
				<?php echo $this->Form->input('email',array('label'=>''));	?>
				</div>
			</li>
		</ul>
	</div>
	<div class="inputLine">
		<ul>
			<li id="inputIcon">
				<div id="email"></div>
			</li>
			<li id="inputTest_li"><p>验证码</p></li>
			<li id="inputField_li">
				<div id="inputField2">
						<?php $this->Captcha->render($captchaSettings);?>
				</div>
			</li>
		</ul>
	</div>
	<?php echo $this->Form->end(__('提交')); ?>
</fieldset>
</div>
