<div id="anotherPageBox">
	<div id="dlxx">
		<?php ?>
		<div id="dlxx_1"></div>
		<div id="dlxx_2"></div>
	</div>
<?php   if(isset($iscurrent))
{
	echo $this->Html->link('编辑',array('controller'=>'ProxyInfos','action'=>'proxy_submit',$proxyInfo['ProxyInfo']['id']));
}
?>
	<dl id="proxy_dl">
		<?php
			if($proxyInfo['ProxyInfo']['picture_url']!=null)
			{
		?>
		<dt id="proxy_dt">	<?php echo __('产品图片'); ?></dt>
		<dd id="proxy_dd">
			<?php echo $this->Html->image('./'.$proxyInfo['ProxyInfo']['picture_url'],array('width'=>'200','height'=>'200')); ?>
			&nbsp;
		<?php   } ?>
		</dd>
		<dt id="proxy_dt"><?php echo __('产品名称'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($proxyInfo['ProxyInfo']['product_name']); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('公司名称'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($proxyInfo['CompanyUserInfo']['company']); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('产品注册号'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($proxyInfo['ProxyInfo']['product_code']); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('代理区域'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($allCountrys[$proxyInfo['ProxyInfo']['product_area']]); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('产品单位'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($proxyInfo['ProxyInfo']['product_unit']); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('产品介绍'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($proxyInfo['ProxyInfo']['product_introduce']); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('对代理商的要求'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($proxyInfo['ProxyInfo']['product_claim']); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('对代理商的支持'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($proxyInfo['ProxyInfo']['product_support']); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('联系方式'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($proxyInfo['ProxyInfo']['phone']); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('QQ'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($proxyInfo['ProxyInfo']['qq']); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('产品类型'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($allProduct[$proxyInfo['ProxyInfo']['product_type']]); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('功能分类'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($allFunction[$proxyInfo['ProxyInfo']['function']]); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('科室分类'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($allDepartment[$proxyInfo['ProxyInfo']['department']]); ?>
			&nbsp;
		</dd>
		<?php 
			if($proxyInfo['ProxyInfo']['material']!='0')
			{
			?>
			<dt id="proxy_dt">
			<?php echo __('卫生材料分类');?> 
			</dt>
			<dd id="proxy_dd">
				<?php echo h($allMaterial[$proxyInfo['ProxyInfo']['material']]); 
			?>
				&nbsp;
			</dd>
		<?php
			}
			?>
			
		<dt id="proxy_dt"><?php echo __('截止时间'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($proxyInfo['ProxyInfo']['deadline']); ?>
			&nbsp;
		</dd>
		<dt id="proxy_dt"><?php echo __('投放时间'); ?></dt>
		<dd id="proxy_dd">
			<?php echo h($proxyInfo['ProxyInfo']['created']); ?>
			&nbsp;
		</dd>
	<?php echo $this->Html->link('返回',$referer);?>
	</dl> 

</div>
<div id="girl_div"></div>
