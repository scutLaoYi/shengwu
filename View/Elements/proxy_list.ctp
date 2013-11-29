
<!-- begin of index -->
<div>
	<h2><?php 
echo __('代理信息');
?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('product_name'); ?></th>
			<th><?php echo $this->Paginator->sort('product_area'); ?></th>

			<th><?php echo $this->Paginator->sort('product_type'); ?></th>
			<th><?php echo $this->Paginator->sort('function'); ?></th>
			<th><?php echo $this->Paginator->sort('department'); ?></th>
			<th><?php echo $this->Paginator->sort('material'); ?></th>
			<th><?php echo $this->Paginator->sort('product_introduce'); ?></th>
	</tr>
	<?php foreach ($proxyInfos as $proxyInfo): ?>
	<tr>
		<td><?php echo $this->Html->link($proxyInfo['ProxyInfo']['product_name'], 
array('controller'=>'ProxyInfos','action'=>'proxy_view', $proxyInfo['ProxyInfo']['id'])); ?>&nbsp;</td>
		<td><?php echo h($allProvinces[$proxyInfo['ProxyInfo']['product_area']]); ?>&nbsp;</td>

		<td><?php echo h($proxyInfo['ProxyInfo']['product_type']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['function']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['department']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['material']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_introduce']); ?>&nbsp;</td>
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
if(isset($isAjax))
	$this->Paginator->options(array('update'=>'#ajax', 'evalScripts'=>true));
echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
	</div>
</div>



</div>
