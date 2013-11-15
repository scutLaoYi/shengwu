<div class="companyUserInfos index">
	<h2><?php echo __('Company User Infos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('company'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_person'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_number'); ?></th>
			<th><?php echo $this->Paginator->sort('tax'); ?></th>
			<th><?php echo $this->Paginator->sort('province'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('qq'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($companyUserInfos as $companyUserInfo): ?>
	<tr>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($companyUserInfo['User']['id'], array('controller' => 'users', 'action' => 'view', $companyUserInfo['User']['id'])); ?>
		</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['company']); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['contact_person']); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['contact_number']); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['tax']); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['province']); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['address']); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['code']); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['website']); ?>&nbsp;</td>
		<td><?php echo h($companyUserInfo['CompanyUserInfo']['qq']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $companyUserInfo['CompanyUserInfo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $companyUserInfo['CompanyUserInfo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $companyUserInfo['CompanyUserInfo']['id']), null, __('Are you sure you want to delete # %s?', $companyUserInfo['CompanyUserInfo']['id'])); ?>
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
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Company User Info'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Company Introduces'), array('controller' => 'company_introduces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company Introduce'), array('controller' => 'company_introduces', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proxy Infos'), array('controller' => 'proxy_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proxy Info'), array('controller' => 'proxy_infos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recruitments'), array('controller' => 'recruitments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recruitment'), array('controller' => 'recruitments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ad Lists'), array('controller' => 'ad_lists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad List'), array('controller' => 'ad_lists', 'action' => 'add')); ?> </li>
	</ul>
</div>
