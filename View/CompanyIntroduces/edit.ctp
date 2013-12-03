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
	<?php echo $this->element('admin_options'); ?>
</div>
