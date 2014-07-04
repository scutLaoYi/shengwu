<div class="action_menu">
	<?php echo $this->element('admin_options');?>
</div>

<div class="manage_fieldset">
<h2><?php echo __('用户'); ?></h2>
	<ul>
		<li id="manage_li1"><?php echo __('Id'); ?></li>
		<li id="manage_li2">
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('用户名'); ?></li>
		<li id="manage_li2">
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('邮箱'); ?></li>
		<li id="manage_li2">
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('类型'); ?></li>
		<li id="manage_li2">
			<?php echo h($allUserType[$user['User']['type']]); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('创建时间'); ?></li>
		<li id="manage_li2">
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</li>
	</ul>
</div>

	
