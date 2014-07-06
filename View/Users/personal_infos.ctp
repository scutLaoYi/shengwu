<div id="bigBox">
	<?php ?>
	<div id="personaltitle"></div>
	<div id="personal_3_box">
		<ul id="personal_3_ul"> 
		<li id="personal_3_li_0"><?php echo __('用户名'); ?></li>
		<li id="personal_3_li">
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</li>
		<li id="personal_3_li_0"><?php echo __('电子邮箱'); ?></li>
		<li id="personal_3_li">
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</li>
		<li id="personal_3_li_0"><?php echo __('注册时间'); ?></li>
		<li id="personal_3_li">
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</li>
	</ul>
	</div>
	<div id='personal_3_li_return'>
	<?php
		echo $this->Html->link('修改信息',array('controller'=>'Users','action'=>'personal_edit')); ?> &nbsp;
	<?php
		echo $this->Html->link('我的简历',array('controller'=>'Resumes','action'=>'view_resumes'));
	?>
	</div>

</div>
