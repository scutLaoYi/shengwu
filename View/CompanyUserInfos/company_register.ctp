<?php ?>
<script language="JavaScript" type="text/javascript">
function change(obj) {
            var text = obj.value;   // 获取input的值
            if (text.match(/^http/gi) == null) {   // 判断是否以http开头
                obj.value = "http://" + text;  // 不以http开头，则http:// + 文本
            }
        }
</script>
<div id="bigBox">
<?php echo $this->Form->create('CompanyUserInfo_for'); ?>
<fieldset>
		<ul id="inputLine">
			<li id="inputTest_li"><p>用户名</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('User.username',array('label'=>''));?>
			</li>
			<li id="inputTest_li"><p>密码</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('User.password',array('label'=>''));?>
			</li>
			<li id="inputTest_li"><p>确认密码</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('User.confirm_password',array('label'=>'','type'=>'password'));?>
			</li>
			<li id="inputTest_li"><p>电子邮箱</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('User.email',array('label'=>''));	?>
			</li>
			<li id="inputTest_li"><p>公司名称</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.company',array('label'=>''));?>
			</li>
			<li id="inputTest_li"><p>联系人</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.contact_person',array('label'=>''));?>
			</li>
			<li id="inputTest_li"><p>联系电话</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.contact_number',array('label'=>''));?>
			</li>
			<li id="inputTest_li"><p>传真号码</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.tax',array('label'=>''));?>
			</li>
			<li id="inputTest_li"><p>省份</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.province',array(
		'options'=>$allProvince,
		'label'=>''
));?>
			</li>
			<li id="inputTest_li"><p>地址</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.address',array('label'=>''));?>
			</li>
			<li id="inputTest_li"><p>邮编</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.code',array('label'=>''));?>
			</li>
			<li id="inputTest_li"><p>网站</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.website',array('label'=>'','value'=>'http://'));?>
			</li>
			<li id="inputTest_li"><p>QQ</p></li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.qq',array('label'=>''));
		
	?>
			</li>
			<li id="inputTest_li"><p>验证码</p></li>
			<li id="inputField_li">
				<div id="inputField2">
					<?php $this->Captcha->render($captchaSettings);?>
				</div>
			</li>
			<li id="button_li">
				<?php echo $this->Form->end(__('提交')); ?>
			</li>
		</ul>
</fieldset>

</div>
