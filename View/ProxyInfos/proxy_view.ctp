<div class="proxyInfos view">
<h2><?php echo __('代理信息'); ?></h2>
	<dl>
		<?php
			if($proxyInfo['ProxyInfo']['picture_url']!=null)
			{
		?>
		<dt>	<?php echo __('产品图片'); ?></dt>
		<dd>
			<?php echo $this->Html->image('./proxy_image/'.$proxyInfo['ProxyInfo']['picture_url'],array('width'=>'200','height'=>'200')); ?>
			&nbsp;
		<?php   } ?>
		</dd>
		<dt><?php echo __('产品名称'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('公司名称'); ?></dt>
		<dd>
			<?php echo h($company['CompanyUserInfo']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('产品注册号'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('代理区域'); ?></dt>
		<dd>
			<?php echo h($allCountry[$proxyInfo['ProxyInfo']['product_area']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('产品单位'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_unit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('产品介绍'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_introduce']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('对代理商的要求'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_claim']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('对代理商的支持'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_support']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('联系方式'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('QQ'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['qq']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('产品类型'); ?></dt>
		<dd>
			<?php echo h($allProduct[$proxyInfo['ProxyInfo']['product_type']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('功能分类'); ?></dt>
		<dd>
			<?php echo h($allFunction[$proxyInfo['ProxyInfo']['function']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('科室分类'); ?></dt>
		<dd>
			<?php echo h($allDepartment[$proxyInfo['ProxyInfo']['department']]); ?>
			&nbsp;
		</dd>
		<dt>
		<?php 
			if($proxyInfo['ProxyInfo']['material']!='0')
			{
			echo __('卫生材料分类'); 
		?></dt>
		<dd>
			<?php echo h($allMaterial[$proxyInfo['ProxyInfo']['material']]); 
		?>
			&nbsp;
		<?php
			}
			?>
			
		</dd>
		<dt><?php echo __('截止时间'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['deadline']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('投放时间'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['created']); ?>
			&nbsp;
		</dd>
		<?php echo $this->Html->link('返回公司介绍', array('controller'=>'CompanyDescriptions', 'action'=>'view_proxy', $company['CompanyUserInfo']['id'])); ?>
	
	</dl>
</div>
