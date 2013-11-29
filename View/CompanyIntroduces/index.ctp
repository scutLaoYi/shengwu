<div class="companyIntroduces index">
	<h2><?php echo __('Company Introduces'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_user_info_id'); ?></th>
			<th><?php echo $this->Paginator->sort('economic_nature'); ?></th>
			<th><?php echo $this->Paginator->sort('business_type'); ?></th>
			<th><?php echo $this->Paginator->sort('legal_representative'); ?></th>
			<th><?php echo $this->Paginator->sort('business_scope'); ?></th>
			<th><?php echo $this->Paginator->sort('registered_capital'); ?></th>
			<th><?php echo $this->Paginator->sort('employees_number'); ?></th>
			<th><?php echo $this->Paginator->sort('introduce'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('picture_url'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($companyIntroduces as $companyIntroduce): ?>
	<tr>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($companyIntroduce['CompanyUserInfo']['id'], array('controller' => 'company_user_infos', 'action' => 'view', $companyIntroduce['CompanyUserInfo']['id'])); ?>
		</td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['economic_nature']); ?>&nbsp;</td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['business_type']); ?>&nbsp;</td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['legal_representative']); ?>&nbsp;</td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['business_scope']); ?>&nbsp;</td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['registered_capital']); ?>&nbsp;</td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['employees_number']); ?>&nbsp;</td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['introduce']); ?>&nbsp;</td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['created']); ?>&nbsp;</td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['picture_url']); ?>&nbsp;</td>
		<td><?php echo h($companyIntroduce['CompanyIntroduce']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $companyIntroduce['CompanyIntroduce']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $companyIntroduce['CompanyIntroduce']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $companyIntroduce['CompanyIntroduce']['id']), null, __('Are you sure you want to delete # %s?', $companyIntroduce['CompanyIntroduce']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Company Introduce'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Company User Infos'), array('controller' => 'company_user_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company User Info'), array('controller' => 'company_user_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
