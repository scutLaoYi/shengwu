
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
<div class="company_dl">
<dl>
	<dt>公司名称</dt>
	<dd><?php echo h($company_info['company']); ?></dd>
	<dt>联 系 人</dt>
	<dd><?php echo h($company_info['contact_person']); ?></dd>
	<dt>联系方式</dt>
	<dd><?php echo h($company_info['contact_number']); ?> </dd>
	<dt>传    真</dt>
	<dd><?php echo h($company_info['tax']); ?></dd>
	<dt>所在省份</dt>
	<dd><?php echo h($allProvince[$company_info['province']]); ?></dd>
	<dt>详细地址</dt>
	<dd><?php echo h($company_info['address']); ?></dd>
	<dt>邮    编</dt>
	<dd><?php echo h($company_info['code']); ?></dd>
	<dt>网    址</dt>
	<dd><?php echo h($company_info['website']); ?></dd>
	<dt>联 系 QQ</dt>
	<dd><?php echo h($company_info['qq']); ?></dd>
</dl>
</div>
</div>



