<div id="dlxc"></div>
<div>
<!-- begin of index -->
	<?php foreach ($proxyInfos as $proxyInfo): ?>
	<ul id="proxy_list">
		<li id="proxy_list_li_img"><?php echo $this->Html->image('./'.$proxyInfo['ProxyInfo']['picture_url'],array('width'=>'100','height'=>'100')); ?>&nbsp;</li>

		<li id="proxy_list_li_1">【产品名称】<?php echo $this->Html->link($proxyInfo['ProxyInfo']['product_name'], 
array('controller'=>'ProxyInfos','action'=>'proxy_view', $proxyInfo['ProxyInfo']['id'])); ?>&nbsp;</li>

		<li id="proxy_list_li_1">【公司名称】<?php echo $this->Html->link($proxyInfo['CompanyUserInfo']['company'], 
array('controller'=>'CompanyDescriptions','action'=>'view_proxy', $proxyInfo['CompanyUserInfo']['id'])); ?>&nbsp;</li>

		<li id="proxy_list_li_1">【代理区域】<?php echo h($allCountrys[$proxyInfo['ProxyInfo']['product_area']]); ?>&nbsp;</li>

		<li id="proxy_list_li_1">【产品类型】<?php echo h($allProduct[$proxyInfo['ProxyInfo']['product_type']]); ?>&nbsp;</li>

		<li id="proxy_list_li_1">【发布时间】<?php echo h($proxyInfo['ProxyInfo']['created']); ?>&nbsp;</li>

		<?php 
		$str_introduce=$proxyInfo['ProxyInfo']['product_introduce'];
		if(mb_strlen($str_introduce)>100)
		{
			$str_introduce=mb_substr($str_introduce,0,97).'...';
		}
		?>
		<li id="proxy_list_li_2">【内容简介】<?php echo h($str_introduce); ?>&nbsp;</li>
	</ul>
	<?php endforeach; ?>

	
	<div class="paging">
<p>
<?php
echo $this->Paginator->counter(array(
	'format' => __('第{:page}页， 共{:pages}页')
));
?>	</p>
<?php
if(isset($isAjax))
	$this->Paginator->options(array('update'=>'#ajax', 'evalScripts'=>true));
echo $this->Paginator->prev('< ' . __('上一页'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('下一页') . ' >', array(), null, array('class' => 'next disabled'));
?>
	</div>



