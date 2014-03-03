<div id="leftBox">
<?php echo $this->element('company_description_option', array(
		'currentId' => $company_id));?>
</div>
<div id="rightBox">

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
	<p>企业经济性质：<?php echo h($companyEconomicNature[$introduce['economic_nature']]);?> </p>
	<p>企业经营模式： <?php echo h($introduce['business_type']); ?> </p>
	<p>法人代表： <?php echo h($introduce['legal_representative']); ?> </p>
	<p>商业范围： <?php echo h($introduce['business_scope']); ?> </p>
	<p>注册资金： <?php echo h($introduce['registered_capital']); ?> </p>
	<p>员工人数： <?php echo h($companyNumber[$introduce['employees_number']]); ?> </p>
	<p>企业介绍： <?php echo h($introduce['introduce']); ?> </p>
<?php 
}
?>
</div>
