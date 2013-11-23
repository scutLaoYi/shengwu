<div class="proxy_list index">
	<h2>该公司的产品信息</h2>
	<table >
	<tr>	
		<th><?php echo $this->Paginator->sort('product_name');?> </th>
		<th><?php echo $this->Paginator->sort('product_area');?> </th>
		<th><?php echo $this->Paginator->sort('product_introduce');?> </th>
	</tr>
	<?php foreach($proxyInfos as $proxyInfo): ?>
	<tr>
		<td><?php echo $this->Html->link($proxyInfo['ProxyInfo']['product_name'], array('controller'=>'ProxyInfos', 'action'=>'proxy_view', $proxyInfo['ProxyInfo']['id'])); ?> </td>
		<td><?php echo $proxyInfo['ProxyInfo']['product_area']; ?> </td>
		<td><?php echo $proxyInfo['ProxyInfo']['product_introduce']; ?> </td>
	</tr>
	<?php endforeach;?>	
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

<?php echo $this->element('company_description_option', array(
		'currentId' => $company_id));?>
