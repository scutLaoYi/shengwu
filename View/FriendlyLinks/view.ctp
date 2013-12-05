<div class="friendlyLinks view">
<h2><?php echo __('查看友情链接'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($friendlyLink['FriendlyLink']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('链接名称'); ?></dt>
		<dd>
			<?php echo h($friendlyLink['FriendlyLink']['link_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('链接'); ?></dt>
		<dd>
			<?php echo h($friendlyLink['FriendlyLink']['link_url']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
<?php echo $this->element('admin_options');?>
</div>
