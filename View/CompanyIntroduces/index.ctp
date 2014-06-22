<div class="action_menu">
	<?php echo $this->element('admin_options'); ?>
</div>

<h2><?php echo __('公司推广信息'); ?></h2>

<div class="container_box">
<?php 
	echo $this->Html->link('待审核  ',array('action'=>'index','1'));
	echo $this->Html->link('已上线  ',array('action'=>'index','2'));
	echo $this->Html->link('已过期  ',array('action'=>'index','3'));
?>
	<div class="table_box">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('company', '公司名称'); ?></th>
			<th><?php echo $this->Paginator->sort('CompanyIntroduce.legal_representative', '法人代表'); ?></th>
			<th><?php echo $this->Paginator->sort('CompanyIntroduce.created', '创建时间'); ?></th>
			<th><?php echo $this->Paginator->sort('CompanyIntroduce.endtime', '到期时间'); ?></th>
			<th><?php echo $this->Paginator->sort('CompanyIntroduce.status', '状态'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($companyIntroduces as $companyIntroduce): ?>
	<tr>
		<td><?php echo $this->Html->link($companyIntroduce['CompanyUserInfo']['company'], array('controller'=>'CompanyDescriptions','action' => 'view_info', $companyIntroduce['CompanyUserInfo']['id'])); ?>&nbsp; </td>
		<td><?php echo $this->Html->link($companyIntroduce['CompanyIntroduce']['legal_representative'],array('action'=>'view',$companyIntroduce['CompanyIntroduce']['id'])); ?>&nbsp;</td>
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

