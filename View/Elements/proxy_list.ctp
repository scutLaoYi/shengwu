<div>
<!-- begin of index -->
	<h2><?php 
echo __('代理信息');
?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th id="tdForHead"><?php echo __('产品名称'); ?></th>
			<th id="tdForHead"><?php echo __('公司名称'); ?></th>	
			<th id="tdForHead"><?php echo __('产品图片'); ?></th>	
			<th id="tdForHead"><?php echo __('代理区域'); ?></th>
			<th id="tdForHead"><?php echo __('产品分类'); ?></th>
			<th id="tdForHead"><?php echo __('发布时间'); ?></th>
			<th id="tdForHead"><?php echo __('代理介绍'); ?></th>
	</tr>
	<?php foreach ($proxyInfos as $proxyInfo): ?>
	<tr>
		<td id="tdForProxy"><?php echo $this->Html->link($proxyInfo['ProxyInfo']['product_name'], 
array('controller'=>'ProxyInfos','action'=>'proxy_view', $proxyInfo['ProxyInfo']['id'])); ?>&nbsp;</td>
		<td id="tdForProxy"><?php echo $this->Html->link($proxyInfo['CompanyUserInfo']['company'], 
array('controller'=>'CompanyDescriptions','action'=>'view_proxy', $proxyInfo['CompanyUserInfo']['id'])); ?>&nbsp;</td>
		<td id="tdForProxy"><?php echo $this->Html->image('./'.$proxyInfo['ProxyInfo']['picture_url'],array('width'=>'100','height'=>'100')); ?>&nbsp;</td>
		<td id="tdForProxy"><?php echo h($allCountrys[$proxyInfo['ProxyInfo']['product_area']]); ?>&nbsp;</td>


		<td id="tdForProxy"><?php echo h($allProduct[$proxyInfo['ProxyInfo']['product_type']]); ?>&nbsp;</td>
		<td id="tdForProxy"><?php echo h($proxyInfo['ProxyInfo']['created']); ?>&nbsp;</td>

<?php 
$str_introduce=$proxyInfo['ProxyInfo']['product_introduce'];
if(strlen($str_introduce)>100)
{
	$str_introduce=substr($str_introduce,0,97).'...';
}
?>
		<td id="tdForProxy"><?php echo h($str_introduce); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
	<p>
<?php
echo $this->Paginator->counter(array(
	'format' => __('第{:page}页， 共{:pages}页')
));
?>	</p>
	<div class="paging">
<?php
if(isset($isAjax))
	$this->Paginator->options(array('update'=>'#ajax', 'evalScripts'=>true));
echo $this->Paginator->prev('< ' . __('上一页'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('下一页') . ' >', array(), null, array('class' => 'next disabled'));
?>
	</div>



