<div class="companyUserInfos form">
<?php echo $this->Form->create('CompanyUserInfo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Company User Info'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden('user_id');
		echo $this->Form->input('company', array('label'=>'公司名称'));
		echo $this->Form->input('contact_person',array('label'=>'联系人'));
		echo $this->Form->input('contact_number');
		echo $this->Form->input('tax');
		echo $this->Form->input('province');
		echo $this->Form->input('address');
		echo $this->Form->input('code');
		echo $this->Form->input('website');
		echo $this->Form->input('qq');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CompanyUserInfo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CompanyUserInfo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Company User Infos'), array('action' => 'index')); ?></li>
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
