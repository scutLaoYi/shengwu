<div class="action_menu">
	<?php echo $this->element('admin_options');?>
</div>

<h2><?php echo __('友情链接管理'); ?></h2>

<div class="container_box">
	
	<?php echo $this->Html->link('创建友情链接',array('controller'=>'FriendlyLinks','action'=>'add'));?>
	<div class="table_box">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('link_name','链接名称'); ?></th>
			<th><?php echo $this->Paginator->sort('link_url','链接'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($friendlyLinks as $friendlyLink): ?>
	<tr>
		<td><?php echo h($friendlyLink['FriendlyLink']['id']); ?>&nbsp;</td>
		<td><?php echo h($friendlyLink['FriendlyLink']['link_name']); ?>&nbsp;</td>
		<td><?php echo h($friendlyLink['FriendlyLink']['link_url']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'view', $friendlyLink['FriendlyLink']['id'])); ?>
			<?php echo $this->Html->link(__('编辑'), array('action' => 'edit', $friendlyLink['FriendlyLink']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $friendlyLink['FriendlyLink']['id']), null, __('你确定删除该链接么？', $friendlyLink['FriendlyLink']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

