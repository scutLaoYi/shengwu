<div class="companyUserInfos view">
<h2><?php echo __('Company User Info'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($companyUserInfo['CompanyUserInfo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($companyUserInfo['User']['id'], array('controller' => 'users', 'action' => 'view', $companyUserInfo['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($companyUserInfo['CompanyUserInfo']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Person'); ?></dt>
		<dd>
			<?php echo h($companyUserInfo['CompanyUserInfo']['contact_person']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Number'); ?></dt>
		<dd>
			<?php echo h($companyUserInfo['CompanyUserInfo']['contact_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax'); ?></dt>
		<dd>
			<?php echo h($companyUserInfo['CompanyUserInfo']['tax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Province'); ?></dt>
		<dd>
			<?php echo h($companyUserInfo['CompanyUserInfo']['province']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($companyUserInfo['CompanyUserInfo']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($companyUserInfo['CompanyUserInfo']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($companyUserInfo['CompanyUserInfo']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qq'); ?></dt>
		<dd>
			<?php echo h($companyUserInfo['CompanyUserInfo']['qq']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company User Info'), array('action' => 'edit', $companyUserInfo['CompanyUserInfo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Company User Info'), array('action' => 'delete', $companyUserInfo['CompanyUserInfo']['id']), null, __('Are you sure you want to delete # %s?', $companyUserInfo['CompanyUserInfo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Company User Infos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company User Info'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Company Introduces'), array('controller' => 'company_introduces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company Introduce'), array('controller' => 'company_introduces', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proxy Infos'), array('controller' => 'proxy_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proxy Info'), array('controller' => 'proxy_infos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recruitments'), array('controller' => 'recruitments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recruitment'), array('controller' => 'recruitments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ad Lists'), array('controller' => 'ad_lists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ad List'), array('controller' => 'ad_lists', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Company Introduces'); ?></h3>
	<?php if (!empty($companyUserInfo['CompanyIntroduce'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $companyUserInfo['CompanyIntroduce']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Company User Info Id'); ?></dt>
		<dd>
	<?php echo $companyUserInfo['CompanyIntroduce']['company_user_info_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Economic Nature'); ?></dt>
		<dd>
	<?php echo $companyUserInfo['CompanyIntroduce']['economic_nature']; ?>
&nbsp;</dd>
		<dt><?php echo __('Business Type'); ?></dt>
		<dd>
	<?php echo $companyUserInfo['CompanyIntroduce']['business_type']; ?>
&nbsp;</dd>
		<dt><?php echo __('Legal Representative'); ?></dt>
		<dd>
	<?php echo $companyUserInfo['CompanyIntroduce']['legal_representative']; ?>
&nbsp;</dd>
		<dt><?php echo __('Business Scope'); ?></dt>
		<dd>
	<?php echo $companyUserInfo['CompanyIntroduce']['business_scope']; ?>
&nbsp;</dd>
		<dt><?php echo __('Registered Capital'); ?></dt>
		<dd>
	<?php echo $companyUserInfo['CompanyIntroduce']['registered_capital']; ?>
&nbsp;</dd>
		<dt><?php echo __('Employees Number'); ?></dt>
		<dd>
	<?php echo $companyUserInfo['CompanyIntroduce']['employees_number']; ?>
&nbsp;</dd>
		<dt><?php echo __('Introduce'); ?></dt>
		<dd>
	<?php echo $companyUserInfo['CompanyIntroduce']['introduce']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $companyUserInfo['CompanyIntroduce']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Picture Url'); ?></dt>
		<dd>
	<?php echo $companyUserInfo['CompanyIntroduce']['picture_url']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Company Introduce'), array('controller' => 'company_introduces', 'action' => 'edit', $companyUserInfo['CompanyIntroduce']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related Proxy Infos'); ?></h3>
	<?php if (!empty($companyUserInfo['ProxyInfo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company User Info Id'); ?></th>
		<th><?php echo __('Picture Url'); ?></th>
		<th><?php echo __('Product Name'); ?></th>
		<th><?php echo __('Product Code'); ?></th>
		<th><?php echo __('Product Area'); ?></th>
		<th><?php echo __('Product Unit'); ?></th>
		<th><?php echo __('Product Introduce'); ?></th>
		<th><?php echo __('Product Claim'); ?></th>
		<th><?php echo __('Product Support'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Qq'); ?></th>
		<th><?php echo __('Product Type'); ?></th>
		<th><?php echo __('Function'); ?></th>
		<th><?php echo __('Department'); ?></th>
		<th><?php echo __('Material'); ?></th>
		<th><?php echo __('Deadline'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($companyUserInfo['ProxyInfo'] as $proxyInfo): ?>
		<tr>
			<td><?php echo $proxyInfo['id']; ?></td>
			<td><?php echo $proxyInfo['company_user_info_id']; ?></td>
			<td><?php echo $proxyInfo['picture_url']; ?></td>
			<td><?php echo $proxyInfo['product_name']; ?></td>
			<td><?php echo $proxyInfo['product_code']; ?></td>
			<td><?php echo $proxyInfo['product_area']; ?></td>
			<td><?php echo $proxyInfo['product_unit']; ?></td>
			<td><?php echo $proxyInfo['product_introduce']; ?></td>
			<td><?php echo $proxyInfo['product_claim']; ?></td>
			<td><?php echo $proxyInfo['product_support']; ?></td>
			<td><?php echo $proxyInfo['phone']; ?></td>
			<td><?php echo $proxyInfo['qq']; ?></td>
			<td><?php echo $proxyInfo['product_type']; ?></td>
			<td><?php echo $proxyInfo['function']; ?></td>
			<td><?php echo $proxyInfo['department']; ?></td>
			<td><?php echo $proxyInfo['material']; ?></td>
			<td><?php echo $proxyInfo['deadline']; ?></td>
			<td><?php echo $proxyInfo['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'proxy_infos', 'action' => 'view', $proxyInfo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'proxy_infos', 'action' => 'edit', $proxyInfo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'proxy_infos', 'action' => 'delete', $proxyInfo['id']), null, __('Are you sure you want to delete # %s?', $proxyInfo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Proxy Info'), array('controller' => 'proxy_infos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Recruitments'); ?></h3>
	<?php if (!empty($companyUserInfo['Recruitment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company User Info Id'); ?></th>
		<th><?php echo __('Job Title'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Educational'); ?></th>
		<th><?php echo __('Working Type'); ?></th>
		<th><?php echo __('Working Time'); ?></th>
		<th><?php echo __('Working Area'); ?></th>
		<th><?php echo __('Account Required'); ?></th>
		<th><?php echo __('Language Acquired'); ?></th>
		<th><?php echo __('Salary'); ?></th>
		<th><?php echo __('Deadline'); ?></th>
		<th><?php echo __('Detail'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($companyUserInfo['Recruitment'] as $recruitment): ?>
		<tr>
			<td><?php echo $recruitment['id']; ?></td>
			<td><?php echo $recruitment['company_user_info_id']; ?></td>
			<td><?php echo $recruitment['job_title']; ?></td>
			<td><?php echo $recruitment['number']; ?></td>
			<td><?php echo $recruitment['sex']; ?></td>
			<td><?php echo $recruitment['age']; ?></td>
			<td><?php echo $recruitment['educational']; ?></td>
			<td><?php echo $recruitment['working_type']; ?></td>
			<td><?php echo $recruitment['working_time']; ?></td>
			<td><?php echo $recruitment['working_area']; ?></td>
			<td><?php echo $recruitment['account_required']; ?></td>
			<td><?php echo $recruitment['language_acquired']; ?></td>
			<td><?php echo $recruitment['salary']; ?></td>
			<td><?php echo $recruitment['deadline']; ?></td>
			<td><?php echo $recruitment['detail']; ?></td>
			<td><?php echo $recruitment['email']; ?></td>
			<td><?php echo $recruitment['phone']; ?></td>
			<td><?php echo $recruitment['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'recruitments', 'action' => 'view', $recruitment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'recruitments', 'action' => 'edit', $recruitment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'recruitments', 'action' => 'delete', $recruitment['id']), null, __('Are you sure you want to delete # %s?', $recruitment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recruitment'), array('controller' => 'recruitments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Ad Lists'); ?></h3>
	<?php if (!empty($companyUserInfo['AdList'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Pic Url'); ?></th>
		<th><?php echo __('Company User Info Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($companyUserInfo['AdList'] as $adList): ?>
		<tr>
			<td><?php echo $adList['id']; ?></td>
			<td><?php echo $adList['pic_url']; ?></td>
			<td><?php echo $adList['company_user_info_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ad_lists', 'action' => 'view', $adList['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ad_lists', 'action' => 'edit', $adList['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ad_lists', 'action' => 'delete', $adList['id']), null, __('Are you sure you want to delete # %s?', $adList['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ad List'), array('controller' => 'ad_lists', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
