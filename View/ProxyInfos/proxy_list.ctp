
<!-- begin of index -->

<div>
	<h2><?php 
echo __('Proxy Infos');
?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('product_name'); ?></th>
			<th><?php echo $this->Paginator->sort('product_area'); ?></th>
			<th><?php echo $this->Paginator->sort('product_introduce'); ?></th>
	</tr>
	<?php foreach ($proxyInfos as $proxyInfo): ?>
	<tr>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_name']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_area']); ?>&nbsp;</td>
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

$this->Paginator->options(array('update'=>'#ajax', 'evalScripts'=>true));
echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
	</div>
</div>



</div>
