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
	<div class="list_submit">
		<ul>
				<?php echo $this->Form->create('CompanyUserInfo_for'); ?>
			<li id="color_title">一：填写用户信息</li>
			<li id="submit_content">
				<ul id="submit_ul">
					<li id="submit_li1">用户名</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('User.username',array('label'=>''));?>
					</li>
					<li id="submit_li1">密码</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('User.password',array('label'=>''));?>
					</li>
					<li id="submit_li1">确认密码</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('User.confirm_password',array('label'=>'','type'=>'password'));?>
					</li>
					<li id="submit_li1">电子邮箱</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('User.email',array('label'=>''));	?>
					</li>
				</ul>
			</li>
			<li id="color_title">二：填写企业信息</li>
			<li id="submit_content">
				<ul id="submit_ul">
					
					<li id="submit_li1">公司名称</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('CompanyUserInfo.company',array('label'=>''));?>
					</li>
					<li id="submit_li1">联系人</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('CompanyUserInfo.contact_person',array('label'=>''));?>
					</li>
					<li id="submit_li1">联系电话</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('CompanyUserInfo.contact_number',array('label'=>''));?>
					</li>
					<li id="submit_li1">传真号码</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('CompanyUserInfo.tax',array('label'=>''));?>
					</li>
					<li id="submit_li1">省份</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('CompanyUserInfo.province',array(
		'options'=>$allProvince,
		'label'=>''
));?>
					</li>
					<li id="submit_li1">地址</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('CompanyUserInfo.address',array('label'=>''));?>
					</li>
					<li id="submit_li1">邮编</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('CompanyUserInfo.code',array('label'=>''));?>
					</li>
					<li id="submit_li1">网站</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('CompanyUserInfo.website',array('label'=>'','value'=>'http://'));?>
					</li>
					<li id="submit_li1">QQ</li>
					<li id="submit_li2">
						<?php echo $this->Form->input('CompanyUserInfo.qq',array('label'=>''));
		
	?>
					</li>
					<li id="submit_li1">验证码</li>
					<li id="submit_li2">
							<?php $this->Captcha->render($captchaSettings);?>
					</li>
					<li id="submit_button">
						<?php echo $this->Form->end(__('提交')); ?>
					</li>
				</ul>
			</li>
		</ul>
		</div>
	</div>
</div>
