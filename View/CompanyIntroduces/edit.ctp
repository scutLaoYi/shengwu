<div class="companyIntroduces form">
<?php echo $this->Form->create('CompanyIntroduce'); ?>
	<fieldset>
		<legend><?php echo __('Edit Company Introduce'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden('company_user_info_id');
		echo $this->Form->input('economic_nature', array('label'=>'经济性质', 'options'=>$nature));
		echo $this->Form->input('business_type', array('label'=>'商业模式'));
		echo $this->Form->input('legal_representative', array('label'=>'法人代表'));
		echo $this->Form->input('business_scope', array('label'=>'商业范围'));
		echo $this->Form->input('registered_capital', array('label'=>'注册资金'));
		echo $this->Form->input('employees_number', array('label'=>'员工规模'));
		echo $this->Form->input('introduce', array('label'=>'公司介绍'));
		echo $this->Form->input('picture_url', array('label'=>'图片链接'));
		echo $this->Form->input('endtime', array('label'=>'到期时间', 'type'=>'date'));
		echo $this->Form->input('status', array('label'=>'状态','options'=>$allStatus));
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
