<div id="leftBox">
<div id="company_third_title"></div>
<?php echo $this->element('company_description_option', array(
		'currentId' => $company_id));?>
</div>
<div id="rightBox">
<ul id="company_3_ul">
<?php if(!isset($introduce))
	{
?>
	<li id="company_3_li">暂无记录</li>
<?php
	}
else
{
	if(isset($isCurrentCompany))
		echo $this->Html->link('编辑', array('controller'=>'CompanyIntroduces', 'action'=>'company_introduce_submit'));
?>
		<?php echo $this->Html->image('./'.$introduce['picture_url'],array('width'=>'200','height'=>'200'));?>
	<li id="company_3_li">
		<span id="companry_3_span">【企业经济性质】</span>
		<?php echo h($companyEconomicNature[$introduce['economic_nature']]);?> 
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【企业经营模式】</span>
		<?php echo h($introduce['business_type']); ?>
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【法人代表】</span>
		<?php echo h($introduce['legal_representative']); ?>
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【商业范围】</span>
		<?php echo h($introduce['business_scope']); ?>
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【注册资金】</span>
		<?php echo h($introduce['registered_capital']); ?> 
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【员工人数】</span>
		<?php echo h($companyNumber[$introduce['employees_number']]); ?>
	</li>
	<li id="company_3_li">
		<span id="companry_3_span">【企业介绍】</span>
		<?php echo h($introduce['introduce']); ?>
	</li>
<?php 
}
?>
</div>
