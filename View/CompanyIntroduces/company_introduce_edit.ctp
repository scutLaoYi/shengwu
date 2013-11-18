<div class="companyIntroduces form">
<?php echo $this->Form->create('CompanyIntroduce',array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('公司介绍修改'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden('company_user_info_id');
		if($this->request->data['CompanyIntroduce']['picture_url']!=null)
		 echo $this->Html->image('./company_image/'.$this->request->data['CompanyIntroduce']['picture_url'],array('width'=>'300','height'=>'300'));
		echo $this->Form->input('picture_url',array('type'=>'file','label'=>'公司主页图片'));
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
</div>
