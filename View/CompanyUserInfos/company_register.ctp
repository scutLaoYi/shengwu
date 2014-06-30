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
	<div id="action_box">
		<div id="leftBox">
		<?php ?>
			<div id="c_register_title"></div>
		</div>
		<div id="moving_ad"></div>
	</div>
	<div id="rightBox">
	<div id="c_register_box">
	<?php echo $this->Form->create('CompanyUserInfo_for'); ?>
	<fieldset>
		<ul id="inputLine">
			<li id="inputTest_li">用户名</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('User.username',array('label'=>''));?>
			</li>
			<li id="inputTest_li">密码</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('User.password',array('label'=>''));?>
			</li>
			<li id="inputTest_li">确认密码</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('User.confirm_password',array('label'=>'','type'=>'password'));?>
			</li>
			<li id="inputTest_li">电子邮箱</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('User.email',array('label'=>''));	?>
			</li>
			<li id="inputTest_li">公司名称</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.company',array('label'=>''));?>
			</li>
			<li id="inputTest_li">联系人</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.contact_person',array('label'=>''));?>
			</li>
			<li id="inputTest_li">联系电话</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.contact_number',array('label'=>''));?>
			</li>
			<li id="inputTest_li">传真号码</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.tax',array('label'=>''));?>
			</li>
			<li id="inputTest_li">省份</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.province',array(
		'options'=>$allProvince,
		'label'=>''
));?>
			</li>
			<li id="inputTest_li">地址</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.address',array('label'=>''));?>
			</li>
			<li id="inputTest_li">邮编</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.code',array('label'=>''));?>
			</li>
			<li id="inputTest_li">网站</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.website',array('label'=>'','value'=>'http://'));?>
			</li>
			<li id="inputTest_li">QQ</li>
			<li id="inputField_li2">
				<?php echo $this->Form->input('CompanyUserInfo.qq',array('label'=>''));
		
	?>
			</li>
			<li id="inputTest_li">验证码</li>
			<li id="inputField_li2">
					<?php $this->Captcha->render($captchaSettings);?>
			</li>
			<li id="button_li">
				<?php echo $this->Form->end(__('提交')); ?>
			</li>
		</ul>
	</fieldset>
	</div>
</div>
</div>
