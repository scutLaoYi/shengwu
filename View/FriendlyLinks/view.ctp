<div class="action_menu">
<?php echo $this->element('admin_options');?>
</div>

<div class="manage_fieldset">
<h2><?php echo __('查看友情链接'); ?></h2>
	<ul>
		<li id="manage_li1"><?php echo __('Id'); ?></li>
		<li id="manage_li2">
			<?php echo h($friendlyLink['FriendlyLink']['id']); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('链接名称'); ?></li>
		<li id="manage_li2">
			<?php echo h($friendlyLink['FriendlyLink']['link_name']); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('链接'); ?></li>
		<li id="manage_li2">
			<?php echo h($friendlyLink['FriendlyLink']['link_url']); ?>
			&nbsp;
		</li>
	</dl>
</div>

