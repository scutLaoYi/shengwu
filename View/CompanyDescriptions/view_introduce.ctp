<div class="CompanyDescriptions_view_introduce index">

<?php if(!isset($introduce))
	{
?>
	<p>暂无记录</p>
<?php
	}
else
{
	if(isset($isCurrentCompany))
		echo $this->Html->link('编辑', array('controller'=>'CompanyIntroduces', 'action'=>'company_introduce_submit'));
?>
		<?php echo $this->Html->image('./'.$introduce['picture_url'],array('width'=>'200','height'=>'200'));?>
	<p>企业经济性质：<?php echo $companyEconomicNature[$introduce['economic_nature']];?> </p>
	<p>企业经营模式： <?php echo $introduce['business_type']; ?> </p>
	<p>法人代表： <?php echo $introduce['legal_representative']; ?> </p>
	<p>商业范围： <?php echo $introduce['business_scope']; ?> </p>
	<p>注册资金： <?php echo $introduce['registered_capital']; ?> </p>
	<p>员工人数： <?php echo $companyNumber[$introduce['employees_number']]; ?> </p>
	<p>企业介绍： <?php echo $introduce['introduce']; ?> </p>
<?php 
}
?>
</div>

<?php echo $this->element('company_description_option', array(
		'currentId' => $company_id));?>
