<div class="adLists index">
	<h2><?php echo __('Ad Lists'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('pic_url'); ?></th>
			<th><?php echo $this->Paginator->sort('company_user_info_id'); ?></th>
			<th><?php echo $this->Paginator->sort('deadline'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($adLists as $adList): ?>
	<tr>
		<td><?php echo h($adList['AdList']['id']); ?>&nbsp;</td>
		<td><?php echo h($adList['AdList']['pic_url']); ?>&nbsp;</td>
		<td>
			<?php echo $adList['AdList']['company_user_info_id']; ?>
		</td>
		<td><?php echo h($adList['AdList']['deadline']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $adList['AdList']['id'])); ?>
			<?php echo $this->Html->link(__('添加广告位'), array('action' => 'edit', $adList['AdList']['id'])); ?>
			<?php echo $this->Form->postLink(__('恢复'), array('action' => 'delete', $adList['AdList']['id']), null, __('您确定恢复该广告位', $adList['AdList']['id'])); ?>
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
	<?php echo $this->element('admin_options'); ?>
</div>
