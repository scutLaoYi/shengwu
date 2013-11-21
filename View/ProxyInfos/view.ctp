<div class="proxyInfos view">
<h2><?php echo __('Proxy Info'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company User Info'); ?></dt>
		<dd>
			<?php echo $this->Html->link($proxyInfo['CompanyUserInfo']['id'], array('controller' => 'company_user_infos', 'action' => 'view', $proxyInfo['CompanyUserInfo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Picture Url'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['picture_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Name'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Code'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Area'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Unit'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_unit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Introduce'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_introduce']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Claim'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_claim']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Support'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_support']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qq'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['qq']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Type'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['product_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Function'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['function']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['department']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Material'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['material']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deadline'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['deadline']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($proxyInfo['ProxyInfo']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Proxy Info'), array('action' => 'edit', $proxyInfo['ProxyInfo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Proxy Info'), array('action' => 'delete', $proxyInfo['ProxyInfo']['id']), null, __('Are you sure you want to delete # %s?', $proxyInfo['ProxyInfo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Proxy Infos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proxy Info'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Company User Infos'), array('controller' => 'company_user_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company User Info'), array('controller' => 'company_user_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
