<div class="companyIntroduces view">
<h2><?php echo __('Company Introduce'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company User Info'); ?></dt>
		<dd>
			<?php echo $this->Html->link($companyIntroduce['CompanyUserInfo']['id'], array('controller' => 'company_user_infos', 'action' => 'view', $companyIntroduce['CompanyUserInfo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Economic Nature'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['economic_nature']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Type'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['business_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Legal Representative'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['legal_representative']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Scope'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['business_scope']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registered Capital'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['registered_capital']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employees Number'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['employees_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Introduce'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['introduce']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Picture Url'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['picture_url']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company Introduce'), array('action' => 'edit', $companyIntroduce['CompanyIntroduce']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Company Introduce'), array('action' => 'delete', $companyIntroduce['CompanyIntroduce']['id']), null, __('Are you sure you want to delete # %s?', $companyIntroduce['CompanyIntroduce']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Company Introduces'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company Introduce'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Company User Infos'), array('controller' => 'company_user_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company User Info'), array('controller' => 'company_user_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
