<div class="companyIntroduces form">
<?php echo $this->Form->create('CompanyIntroduce'); ?>
	<fieldset>
		<legend><?php echo __('公司介绍提交表单'); ?></legend>
	<?php
		echo $this->Form->input('economic_nature',array('options'=>$nature,'label'=>'公司经济类型'));
		echo $this->Form->input('business_type',array('label'=>'公司经营模式'));
		echo $this->Form->input('legal_representative',array('label'=>'法人代表'));
		echo $this->Form->input('business_scope',array('label'=>'公司经营范围'));
		echo $this->Form->input('registered_capital',array('label'=>'注册资金'));
		echo $this->Form->input('employees_number',array('options'=>$number,'label'=>'公司员工人数'));
		echo $this->Form->input('introduce',array('label'=>'公司介绍','rows'=>10));
	?>
	</fieldset>
<?php echo $this->Form->end(__('提交')); ?>
