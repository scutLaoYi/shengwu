<div id="bigBox">
	<div id="dltitle">
	</div>
<?php   if(isset($iscurrent))
{
	echo $this->Html->link('编辑',array('controller'=>'ProxyInfos','action'=>'proxy_submit',$proxyInfo['ProxyInfo']['id']));
}
?>
<div id="proxy_3_box">
	<ul id="proxy_3_ul">
		<?php
			if($proxyInfo['ProxyInfo']['picture_url']!=null)
			{
		?>
		<li id="proxy_3_li_0">	<?php echo __('产品图片'); ?></li>
		<li id="proxy_3_li">
			<?php echo $this->Html->image('./'.$proxyInfo['ProxyInfo']['picture_url'],array('wilih'=>'200','height'=>'200')); ?>
			&nbsp;
		<?php   } ?>
		</li>
		<li id="proxy_3_li_0"><?php echo __('产品名称'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($proxyInfo['ProxyInfo']['product_name']); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('公司名称'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($proxyInfo['CompanyUserInfo']['company']); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('产品注册号'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($proxyInfo['ProxyInfo']['product_code']); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('代理区域'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($allCountrys[$proxyInfo['ProxyInfo']['product_area']]); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('产品单位'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($proxyInfo['ProxyInfo']['product_unit']); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('产品介绍'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($proxyInfo['ProxyInfo']['product_introduce']); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('对代理商的要求'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($proxyInfo['ProxyInfo']['product_claim']); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('对代理商的支持'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($proxyInfo['ProxyInfo']['product_support']); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('联系方式'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($proxyInfo['ProxyInfo']['phone']); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('QQ'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($proxyInfo['ProxyInfo']['qq']); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('产品类型'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($allProduct[$proxyInfo['ProxyInfo']['product_type']]); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('功能分类'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($allFunction[$proxyInfo['ProxyInfo']['function']]); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('科室分类'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($allDepartment[$proxyInfo['ProxyInfo']['department']]); ?>
			&nbsp;
		</li>
		<?php 
			if($proxyInfo['ProxyInfo']['material']!='0')
			{
			?>
			<li id="proxy_3_li_0">
			<?php echo __('卫生材料分类');?> 
			</li>
			<li id="proxy_3_li">
				<?php echo h($allMaterial[$proxyInfo['ProxyInfo']['material']]); 
			?>
				&nbsp;
			</li>
		<?php
			}
			?>
			
		<li id="proxy_3_li_0"><?php echo __('截止时间'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($proxyInfo['ProxyInfo']['deadline']); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_0"><?php echo __('投放时间'); ?></li>
		<li id="proxy_3_li">
			<?php echo h($proxyInfo['ProxyInfo']['created']); ?>
			&nbsp;
		</li>
		<li id="proxy_3_li_return">
				<?php echo $this->Html->link('返回',$referer);?>
		</li>
	</ul> 
	</div>
</div>
