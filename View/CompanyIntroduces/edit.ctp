<div class="companyIntroduces form">
<?php echo $this->Form->create('CompanyIntroduce'); ?>
	<fieldset>
		<legend><?php echo __('Edit Company Introduce'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('company_user_info_id');
		echo $this->Form->input('economic_nature');
		echo $this->Form->input('business_type');
		echo $this->Form->input('legal_representative');
		echo $this->Form->input('business_scope');
		echo $this->Form->input('registered_capital');
		echo $this->Form->input('employees_number');
		echo $this->Form->input('introduce');
		echo $this->Form->input('picture_url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CompanyIntroduce.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CompanyIntroduce.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Company Introduces'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Company User Infos'), array('controller' => 'company_user_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company User Info'), array('controller' => 'company_user_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
