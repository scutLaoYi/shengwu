<div class="proxyInfos index">
<?php
echo $this->Html->link('待审核 ', array('action'=>'index', 1)); 
echo $this->Html->link('已上线 ', array('action'=>'index', 2)); 
echo $this->Html->link('已过期 ', array('action'=>'index', 3)); 
?>
	<h2><?php echo __('所有代理信息'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('product_name', '产品名称'); ?></th>
			<th><?php echo $this->Paginator->sort('created', '公司名称'); ?></th>
			<th><?php echo $this->Paginator->sort('endtime', '到期时间'); ?></th>
			<th><?php echo $this->Paginator->sort('status', '状态'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($proxyInfos as $proxyInfo): ?>
	<tr>
		<td><?php echo $this->Html->link($proxyInfo['ProxyInfo']['product_name'], array(
				'controller'=>'ProxyInfos', 'action'=>'proxy_view', $proxyInfo['ProxyInfo']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($proxyInfo['CompanyUserInfo']['company'], array('controller'=>'CompanyDescriptions', 'action'=>'view_info', $proxyInfo['CompanyUserInfo']['id'])); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['endtime']); ?>&nbsp;</td>
		<td><?php echo $allStatus[$proxyInfo['ProxyInfo']['status']]; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('编辑'), array('action' => 'edit', $proxyInfo['ProxyInfo']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $proxyInfo['ProxyInfo']['id']), null, __('确定删除 %s 吗?', $proxyInfo['ProxyInfo']['product_name'])); ?>
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
