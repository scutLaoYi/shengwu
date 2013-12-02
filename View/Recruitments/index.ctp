<div class="recruitments index">
	<h2><?php echo __('Recruitments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_user_info_id'); ?></th>
			<th><?php echo $this->Paginator->sort('job_title'); ?></th>
			<th><?php echo $this->Paginator->sort('number'); ?></th>
			<th><?php echo $this->Paginator->sort('sex'); ?></th>
			<th><?php echo $this->Paginator->sort('age'); ?></th>
			<th><?php echo $this->Paginator->sort('educational'); ?></th>
			<th><?php echo $this->Paginator->sort('working_type'); ?></th>
			<th><?php echo $this->Paginator->sort('working_time'); ?></th>
			<th><?php echo $this->Paginator->sort('working_area'); ?></th>
			<th><?php echo $this->Paginator->sort('account_required'); ?></th>
			<th><?php echo $this->Paginator->sort('language_acquired'); ?></th>
			<th><?php echo $this->Paginator->sort('salary'); ?></th>
			<th><?php echo $this->Paginator->sort('deadline'); ?></th>
			<th><?php echo $this->Paginator->sort('detail'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($recruitments as $recruitment): ?>
	<tr>
		<td><?php echo h($recruitment['Recruitment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recruitment['CompanyUserInfo']['id'], array('controller' => 'company_user_infos', 'action' => 'view', $recruitment['CompanyUserInfo']['id'])); ?>
		</td>
		<td><?php echo h($recruitment['Recruitment']['job_title']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['number']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['sex']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['age']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['educational']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['working_type']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['working_time']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['working_area']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['account_required']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['language_acquired']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['salary']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['deadline']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['detail']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['email']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['phone']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['created']); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recruitment['Recruitment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recruitment['Recruitment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recruitment['Recruitment']['id']), null, __('Are you sure you want to delete # %s?', $recruitment['Recruitment']['id'])); ?>
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
