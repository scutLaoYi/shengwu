<div class="companyUserInfos form">
<?php echo $this->Form->create('CompanyUserInfo'); ?>
	<fieldset>
		<legend><?php echo __('编辑企业信息'); ?></legend>
<?php
echo $this->Html->link('修改密码', array('action'=>'company_pass_edit'));
echo $this->Form->hidden('User.id');
echo $this->Form->hidden('User.username');
echo $this->Form->hidden('User.password');
echo $this->Form->input('User.email',array('label'=>'电子邮箱'));	
echo $this->Form->hidden('CompanyUserInfo.id');
echo $this->Form->input('CompanyUserInfo.company',array('label'=>'公司名称'));
echo $this->Form->input('CompanyUserInfo.contact_person',array('label'=>'联系人'));
echo $this->Form->input('CompanyUserInfo.contact_number',array('label'=>'联系电话'));
echo $this->Form->input('CompanyUserInfo.tax',array('label'=>'传真号码'));
echo $this->Form->input('CompanyUserInfo.province',array(
	'options'=>$allProvince,
	'label'=>'省份'
));
echo $this->Form->input('CompanyUserInfo.address',array('label'=>'地址'));
echo $this->Form->input('CompanyUserInfo.code',array('label'=>'邮编'));
echo $this->Form->input('CompanyUserInfo.website',array('label'=>'网站'));
echo $this->Form->input('CompanyUserInfo.qq',array('label'=>'QQ'));
?>
	</fieldset>
<?php echo $this->Form->end(__('提交')); ?>
</div>
