<div class="inviteBids view">
<h2><?php echo __('查看招标中标'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($inviteBid['InviteBid']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('内容'); ?></dt>
		<dd>
			<?php $message=ereg_replace("\n","</br>\n",$inviteBid['InviteBid']['content']);?>
			<?php echo ($message); ?>
		</dd>
		<dt><?php echo __('创建时间'); ?></dt>
		<dd>
			<?php echo h($inviteBid['InviteBid']['created']); ?>
		</dd>
	</dl>
</div>
<div class="actions">
<?php echo $this->element('admin_options');?>
</div>
