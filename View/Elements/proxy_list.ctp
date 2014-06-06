<div>
<!-- begin of index -->
	<?php foreach ($proxyInfos as $proxyInfo): ?>
	<ul id="content_list">
		<li id="content_list_li"><?php echo $this->Html->image('./'.$proxyInfo['ProxyInfo']['picture_url'],array('width'=>'100','height'=>'100')); ?>&nbsp;</li>

		<li id="content_list_li_1"><?php echo $this->Html->link($proxyInfo['ProxyInfo']['product_name'], 
array('controller'=>'ProxyInfos','action'=>'proxy_view', $proxyInfo['ProxyInfo']['id'])); ?>&nbsp;</li>

		<li id="content_list_li_1"><?php echo $this->Html->link($proxyInfo['CompanyUserInfo']['company'], 
array('controller'=>'CompanyDescriptions','action'=>'view_proxy', $proxyInfo['CompanyUserInfo']['id'])); ?>&nbsp;</li>

		<li id="content_list_li_1"><?php echo h($allCountrys[$proxyInfo['ProxyInfo']['product_area']]); ?>&nbsp;</li>

		<li id="content_list_li_1"><?php echo h($allProduct[$proxyInfo['ProxyInfo']['product_type']]); ?>&nbsp;</li>

		<li id="content_list_li_1"><?php echo h($proxyInfo['ProxyInfo']['created']); ?>&nbsp;</li>

		<?php 
		$str_introduce=$proxyInfo['ProxyInfo']['product_introduce'];
		if(strlen($str_introduce)>100)
		{
			$str_introduce=substr($str_introduce,0,97).'...';
		}
		?>
		<li id="content_list_li_2"><?php echo h($str_introduce); ?>&nbsp;</li>
	</ul>
	<?php endforeach; ?>

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



