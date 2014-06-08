
<div id="leftBox">
<div id="company_third_title"></div>
<?php echo $this->element('company_description_option', array(
		'currentId' => $company_info['id']));
?>
</div>
<div id="rightBox">
<?php 

if(isset($isCurrentCompany))
	echo $this->Html->link('编辑', array('controller'=>'CompanyUserInfos', 'action'=>'company_edit'));
?>
<ul id="company_3_ul">
	<li id="company_3_li">
		<span id="companry_3_span">【公司名称】</span>
		<?php echo h($company_info['company']); ?>
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【联 系 人】</span>
		<?php echo h($company_info['contact_person']); ?>
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【联系方式】</span>
			<?php echo h($company_info['contact_number']); ?>
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【传    真】</span>
			<?php echo h($company_info['tax']); ?>
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【所在省份】</span>
			<?php echo h($allProvince[$company_info['province']]); ?>
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【详细地址】</span>
			<?php echo h($company_info['address']); ?>
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【邮    编】</span>
			<?php echo h($company_info['code']); ?>
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【网    址】</span>
			<?php echo h($company_info['website']); ?>
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【联 系 QQ】</span>
			<?php echo h($company_info['qq']); ?>
	</li>
</ul>
</div>



