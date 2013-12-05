<div id="anotherPageBox">

<h2><?php echo __('个人信息'); ?></h2>
	<dl>
		<dt><?php echo __('用户名'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('电子邮箱'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('注册时间'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	
	<div class='actions'>
	<?php
		echo $this->Html->link('修改信息',array('controller'=>'Users','action'=>'personal_edit')); ?> &nbsp;
	<?php
		echo $this->Html->link('我的简历',array('controller'=>'Resumes','action'=>'view_resumes'));
	?>
	</div>

</div>
