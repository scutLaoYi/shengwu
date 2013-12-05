
<!-- begin of index -->
	<h2><?php 
echo __('代理信息');
?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo '产品名称'; ?></th>
			<th><?php echo '公司名称'; ?></th>	
			<th><?php echo '产品图片'; ?></th>	
			<th><?php echo '代理区域'; ?></th>

			<th><?php echo '产品分类'; ?></th>
			<th><?php echo '代理介绍'; ?></th>
	</tr>
	<?php foreach ($proxyInfos as $proxyInfo): ?>
	<tr>
		<td><?php echo $this->Html->link($proxyInfo['ProxyInfo']['product_name'], 
array('controller'=>'ProxyInfos','action'=>'proxy_view', $proxyInfo['ProxyInfo']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($proxyInfo['CompanyUserInfo']['company'], 
array('controller'=>'CompanyDescriptions','action'=>'view_proxy', $proxyInfo['CompanyUserInfo']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->image('./'.$proxyInfo['ProxyInfo']['picture_url'],array('width'=>'100','height'=>'100')); ?>&nbsp;</td>
		<td><?php echo h($allCountrys[$proxyInfo['ProxyInfo']['product_area']]); ?>&nbsp;</td>

		<td><?php echo h($allProduct[$proxyInfo['ProxyInfo']['product_type']]); ?>&nbsp;</td>
<?php 
$str_introduce=$proxyInfo['ProxyInfo']['product_introduce'];
if(strlen($str_introduce)>100)
{
	$str_introduce=substr($str_introduce,0,97).'...';
}
?>
		<td><?php echo h($str_introduce); ?>&nbsp;</td>
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



