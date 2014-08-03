
<div class="c_modify">
	<?php echo $this->Form->create('CompanyUserInfo'); ?>
		<ul id="inputLine">
		<?php echo $this->Form->hidden('CompanyUserInfo.id'); ?>
		<?php echo $this->Form->hidden('CompanyUserInfo.user_id'); ?>
		<li id="c_modify_li1">公司名称</li>
		<li id="c_modify_li2">
		<?php echo $this->Form->input('CompanyUserInfo.company',array('label'=>'')); ?>
		</li>
		<li id="c_modify_li1">联系人</li>
		<li id="c_modify_li2">
		<?php echo $this->Form->input('CompanyUserInfo.contact_person',array('label'=>'')); ?>
		</li>
		<li id="c_modify_li1">联系电话</li>
		<li id="c_modify_li2">
		<?php echo $this->Form->input('CompanyUserInfo.contact_number',array('label'=>'')); ?>
		</li>
		<li id="c_modify_li1">传真号码</li>
		<li id="c_modify_li2">
		<?php echo $this->Form->input('CompanyUserInfo.tax',array('label'=>'')); ?>
		<li id="c_modify_li1">省份</li>
		<li id="c_modify_li2">
		<?php echo $this->Form->input('CompanyUserInfo.province',array(
	'options'=>$allProvince,
	'label'=>''
)); ?>
		</li>
		<li id="c_modify_li1">地址</li>
		<li id="c_modify_li2">
		<?php echo $this->Form->input('CompanyUserInfo.address',array('label'=>'')); ?>
		</li>
		<li id="c_modify_li1">邮编</li>
		<li id="c_modify_li2">
		<?php echo $this->Form->input('CompanyUserInfo.code',array('label'=>'')); ?>
		</li>
		<li id="c_modify_li1">网站</li>
		<li id="c_modify_li2">
		<?php echo $this->Form->input('CompanyUserInfo.website',array('label'=>'')); ?>
		</li>
		<li id="c_modify_li1">QQ</li>
		<li id="c_modify_li2">
		<?php echo $this->Form->input('CompanyUserInfo.qq',array('label'=>'')); ?>
		</li>
		<li id="c_modify_li3">
		<?php echo $this->Form->end(__('提交')); ?>
		</li>
		<li id="c_modify_li4">
		<?php echo $this->Html->link('返回', $referer); ?>
		</li>
		</ul>
</div>
