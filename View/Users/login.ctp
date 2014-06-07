<div id = "anotherPageBox">
	<div id="leftBox">
		<?php ?>
		<div id="login_title"></div>
	</div>
	<div id="rightBox">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<!--<legend><?php __('请输入帐号和密码'); ?></legend>-->
			<div class="inputLine">
				<ul>
					<li id="inputIcon">
						<div id="username"></div>
					</li>
					<li id="inputTest_li"><p>用户名</p></li>
					<li id="inputField_li">
						<div id="inputField">
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
						<div id="inputField">
			      	<?php echo $this->Form->input('password',array('label'=>''));
			?>
						</div>
					</li>
				</ul>
			</div>
			<?php echo $this->Form->end(__('登录')); ?>
			<?php echo $this->Html->link('忘记密码',array('action'=>'forget_password'));?>
	</fieldset>
	</div>
</div>

