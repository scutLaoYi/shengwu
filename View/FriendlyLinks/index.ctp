<div class="friendlyLinks index">
	<h2><?php echo __('Friendly Links'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('link_name'); ?></th>
			<th><?php echo $this->Paginator->sort('link_url'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($friendlyLinks as $friendlyLink): ?>
	<tr>
		<td><?php echo h($friendlyLink['FriendlyLink']['id']); ?>&nbsp;</td>
		<td><?php echo h($friendlyLink['FriendlyLink']['link_name']); ?>&nbsp;</td>
		<td><?php echo h($friendlyLink['FriendlyLink']['link_url']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $friendlyLink['FriendlyLink']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $friendlyLink['FriendlyLink']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $friendlyLink['FriendlyLink']['id']), null, __('Are you sure you want to delete # %s?', $friendlyLink['FriendlyLink']['id'])); ?>
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
