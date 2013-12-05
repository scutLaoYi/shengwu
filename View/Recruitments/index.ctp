<div class="recruitments index">
<?php
echo $this->Html->link('待审核 ', array('action'=>'index', 1));
echo $this->Html->link('已上线 ', array('action'=>'index', 2));
echo $this->Html->link('已过期 ', array('action'=>'index', 3));
?>
	<h2><?php echo __('招聘信息'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('job_title', '招聘职位'); ?></th>
			<th><?php echo $this->Paginator->sort('CompanyUserInfo.company', '公司名称'); ?></th>
			<th><?php echo $this->Paginator->sort('endtime', '到期时间'); ?></th>
			<th><?php echo $this->Paginator->sort('status', '状态'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($recruitments as $recruitment): ?>
	<tr>
		<td><?php echo $this->Html->link($recruitment['Recruitment']['job_title'], array('action'=>'recruitment_view', $recruitment['Recruitment']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($recruitment['CompanyUserInfo']['company'], array('controller'=>'CompanyDescriptions', 'action'=>'view_info', $recruitment['CompanyUserInfo']['id'])); ?>&nbsp;</td>
		<td><?php echo h($recruitment['Recruitment']['endtime']); ?>&nbsp;</td>
		<td><?php echo h($allStatus[$recruitment['Recruitment']['status']]); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('编辑'), array('action' => 'edit', $recruitment['Recruitment']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $recruitment['Recruitment']['id']), null, __('确定删除该招聘信息?')); ?>
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
