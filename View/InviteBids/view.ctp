
<div class="action_menu">
<?php echo $this->element('admin_options');?>
</div>

<div class="manage_fieldset">
<h2><?php echo __('查看招标中标'); ?></h2>
	<ul>
		<li id="manage_li1"><?php echo __('Id'); ?></li>
		<li id="manage_li2">
			<?php echo h($inviteBid['InviteBid']['id']); ?>
		</li>
		<li id="manage_li1"><?php echo __('内容'); ?></li>
		<li id="manage_li2">
			<?php $message=ereg_replace("\n","</br>\n",$inviteBid['InviteBid']['content']);?>
			<?php echo ($message); ?>
		</li>
		<li id="manage_li1"><?php echo __('创建时间'); ?></li>
		<li id="manage_li2">
			<?php echo h($inviteBid['InviteBid']['created']); ?>
		</li>
	</ul>
</div>

