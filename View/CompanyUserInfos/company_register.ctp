<script language="JavaScript" type="text/javascript">
function change(obj) {
            var text = obj.value;   // 获取input的值
            if (text.match(/^http/gi) == null) {   // 判断是否以http开头
                obj.value = "http://" + text;  // 不以http开头，则http:// + 文本
            }
        }
</script>
<div class="companyUserInfos form">
<?php echo $this->Form->create('CompanyUserInfo_for'); ?>
	<fieldset>
		<legend><?php echo __('企业注册信息'); ?></legend>
	<?php
		
	echo $this->Form->input('User.username',array('label'=>'用户名'));
	echo $this->Form->input('User.password',array('label'=>'密码'));
	echo $this->Form->input('User.confirm_password',array('label'=>'确认密码','type'=>'password'));
	echo $this->Form->input('User.email',array('label'=>'电子邮箱'));	
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
	echo $this->Form->input('CompanyUserInfo.website',array('label'=>'网站','value'=>'http://'));
	echo $this->Form->input('CompanyUserInfo.qq',array('label'=>'QQ'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('提交')); ?>
</div>
