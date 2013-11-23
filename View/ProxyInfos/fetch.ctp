<div class="proxyInfos index">
	<h2><?php echo __('Proxy Infos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_user_info_id'); ?></th>
			<th><?php echo $this->Paginator->sort('picture_url'); ?></th>
			<th><?php echo $this->Paginator->sort('product_name'); ?></th>
			<th><?php echo $this->Paginator->sort('product_code'); ?></th>
			<th><?php echo $this->Paginator->sort('product_area'); ?></th>
			<th><?php echo $this->Paginator->sort('product_unit'); ?></th>
			<th><?php echo $this->Paginator->sort('product_introduce'); ?></th>
			<th><?php echo $this->Paginator->sort('product_claim'); ?></th>
			<th><?php echo $this->Paginator->sort('product_support'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('qq'); ?></th>
			<th><?php echo $this->Paginator->sort('product_type'); ?></th>
			<th><?php echo $this->Paginator->sort('function'); ?></th>
			<th><?php echo $this->Paginator->sort('department'); ?></th>
			<th><?php echo $this->Paginator->sort('material'); ?></th>
			<th><?php echo $this->Paginator->sort('deadline'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($proxyInfos as $proxyInfo): ?>
	<tr>
		<td><?php echo h($proxyInfo['ProxyInfo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($proxyInfo['CompanyUserInfo']['id'], array('controller' => 'company_user_infos', 'action' => 'view', $proxyInfo['CompanyUserInfo']['id'])); ?>
		</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['picture_url']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_name']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_code']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_area']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_unit']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_introduce']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_claim']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_support']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['phone']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['qq']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_type']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['function']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['department']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['material']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['deadline']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['created']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $proxyInfo['ProxyInfo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $proxyInfo['ProxyInfo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $proxyInfo['ProxyInfo']['id']), null, __('Are you sure you want to delete # %s?', $proxyInfo['ProxyInfo']['id'])); ?>
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
