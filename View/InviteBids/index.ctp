<div class="inviteBids index">
	<h2><?php echo __('招标中标管理'); ?></h2>
	<?php echo $this->Html->link('创建',array('controller'=>'InviteBids','action'=>'add'));?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('content','内容'); ?></th>
			<th><?php echo $this->Paginator->sort('created','创建时间'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($inviteBids as $inviteBid): ?>
	<tr>
		<td><?php echo h($inviteBid['InviteBid']['id']); ?>&nbsp;</td>
		<?php $message=ereg_replace("\n","</br>\n",$inviteBid['InviteBid']['content']);?>
		<td><?php echo ($message); ?></td>
		<td><?php echo h($inviteBid['InviteBid']['created']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'view', $inviteBid['InviteBid']['id'])); ?>
			<?php echo $this->Html->link(__('编辑'), array('action' => 'edit', $inviteBid['InviteBid']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $inviteBid['InviteBid']['id']), null, __('你确定删除该招标信息么？', $inviteBid['InviteBid']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
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
<div class="actions">
	<?php echo $this->element('admin_options');?>
</div>
