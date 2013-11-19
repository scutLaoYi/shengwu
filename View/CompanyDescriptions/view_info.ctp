<div class="CompanyDescriptions_view_info index">
<?php 

if(isset($isCurrentCompany))
	echo $this->Html->link('编辑', array('controller'=>'CompanyUserInfos', 'action'=>'company_edit'));
?>

<p>公司名称：<?php echo $company_info['company']; ?> </p>
<p>联 系 人：<?php echo $company_info['contact_person']; ?> </p>
<p>联系方式：<?php echo $company_info['contact_number']; ?> </p>
<p>传    真：<?php echo $company_info['tax']; ?></p>
<p>所在省份：<?php echo $company_info['province']; ?></p>
<p>详细地址：<?php echo $company_info['address']; ?></p>
<p>邮    编：<?php echo $company_info['code']; ?></p>
<p>网    址：<?php echo $company_info['website']; ?></p>
<p>联 系 QQ：<?php echo $company_info['qq']; ?></p>

</div>

<?php echo $this->element('company_description_option', array(
		'currentId' => $company_info['id']));?>
