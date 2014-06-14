<div class="action_menu">
	<?php echo $this->element('admin_options'); ?>
</div>

<h2><?php echo __('公司用户信息'); ?></h2>

<div class="container_box">
	<div class="table_box">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('username', '用户名'); ?></th>
			<th><?php echo $this->Paginator->sort('company', '公司名称'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_person', '联系人'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_number', '联系电话'); ?></th>
			<th><?php echo $this->Paginator->sort('province', '省份'); ?></th>
			<th><?php echo $this->Paginator->sort('address', '地址'); ?></th>
			<th><?php echo $this->Paginator->sort('code', '邮编'); ?></th>
			<th><?php echo $this->Paginator->sort('qq'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($companyUserInfos as $companyUserInfo): ?>
	<tr>
		<td><?php echo $this->Html->link($companyUserInfo['User']['username'],array('controller'=>'Users','action'=>'view',$companyUserInfo['User']['id'])); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['company']); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['contact_person']); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['contact_number']); ?>&nbsp;</td>
		<td><?php echo h($allProvince[$companyUserInfo['CompanyUserInfo']['province']]); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['address']); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['code']); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['qq']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('编辑'), array('action' => 'edit', $companyUserInfo['CompanyUserInfo']['id'])); ?>
			<?php //echo $this->Form->postLink(__('删除'), array('action' => 'delete', $companyUserInfo['CompanyUserInfo']['id']), null, __('确定删除公司: %s?', $companyUserInfo['CompanyUserInfo']['company'])); ?>
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

