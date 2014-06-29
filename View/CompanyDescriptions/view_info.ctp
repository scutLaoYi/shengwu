<div id="action_box">
<?php ?>
<div id="leftBox">
<div id="company_third_title"></div>
<?php echo $this->element('company_description_option', array(
		'currentId' => $company_info['id']));
?>
</div>
<div id="moving_ad"></div>
</div>
<div id="rightBox">
<div id="jbxx"></div>
<ul id="company_3_ul">
	<li id="company_3_li_0">公司名称</li>
	<li id="company_3_li">
		<?php echo h($company_info['company']); ?>
	</li>
	<li id="company_3_li_0">联 系 人</li>
	<li id="company_3_li">
		<?php echo h($company_info['contact_person']); ?>
	</li>
	<li id="company_3_li_0">联系方式</li>
	<li id="company_3_li">
			<?php echo h($company_info['contact_number']); ?>
	</li>
	<li id="company_3_li_0">传    真</li>
	<li id="company_3_li">
			<?php echo h($company_info['tax']); ?>
	</li>
	<li id="company_3_li_0">所在省份</li>
	<li id="company_3_li">
			<?php echo h($allProvince[$company_info['province']]); ?>
	</li>
	<li id="company_3_li_0">详细地址</li>
	<li id="company_3_li">
			<?php echo h($company_info['address']); ?>
	</li>
	<li id="company_3_li_0">邮    编</li>
	<li id="company_3_li">
			<?php echo h($company_info['code']); ?>
	</li>
	<li id="company_3_li_0">网    址</li>
	<li id="company_3_li">
			<?php echo h($company_info['website']); ?>
	</li>
	<li id="company_3_li_0">联 系 QQ</li>
	<li id="company_3_li">
			<?php echo h($company_info['qq']); ?>
	</li>
	<?php 
	if(isset($isCurrentCompany))
	{?>
		<li id="company_3_edit">
		<?php 
		echo $this->Html->link('编辑', array('controller'=>'CompanyUserInfos', 'action'=>'company_edit'));
		?>
		</li>
	<?php
	}
?>
</ul>
</div>



