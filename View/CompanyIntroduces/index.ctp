<div class="companyIntroduces index">
	<h2><?php echo __('公司推广信息'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('company', '公司名称'); ?></th>
			<th><?php echo $this->Paginator->sort('legal_representative', '法人代表'); ?></th>
			<th><?php echo $this->Paginator->sort('created', '创建时间'); ?></th>
			<th><?php echo $this->Paginator->sort('endtime', '到期时间'); ?></th>
			<th><?php echo $this->Paginator->sort('status', '状态'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($companyIntroduces as $companyIntroduce): ?>
	<tr>
		<td><?php echo $this->Html->link($companyIntroduce['CompanyUserInfo']['company'], array('controller'=>'CompanyDescriptions','action' => 'view_info', $companyIntroduce['CompanyUserInfo']['id'])); ?>&nbsp; </td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['legal_representative']); ?>&nbsp;</td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['created']); ?>&nbsp;</td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['endtime']); ?>&nbsp;</td>
		<td><?php echo h($allStatus[$companyIntroduce['CompanyIntroduce']['status']]); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('编辑'), array('action' => 'edit', $companyIntroduce['CompanyIntroduce']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $companyIntroduce['CompanyIntroduce']['id']), null, __('确定删除 %s 推广信息吗？', $companyIntroduce['CompanyUserInfo']['company'])); ?>
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
