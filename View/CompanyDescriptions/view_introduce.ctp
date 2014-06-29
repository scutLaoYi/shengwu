<div id="action_box">
<?php ?>
<div id="leftBox">
<div id="company_third_title"></div>
<?php echo $this->element('company_description_option', array(
		'currentId' => $company_id));?>
</div>
<div id="moving_ad"></div>
</div>
<div id="rightBox">
<div id="gsjs"></div>
<ul id="company_3_ul">
	<li id="company_img">
			<?php echo $this->Html->image('./'.$introduce['picture_url'],array('width'=>'700','height'=>'200'));?>
	</li>
	<li id="company_3_li_0">企业经济性质</li>
	<li id="company_3_li">
		<?php echo h($companyEconomicNature[$introduce['economic_nature']]);?> 
	</li>
	<li id="company_3_li_0">企业经营模式</li>
	<li id="company_3_li">
		<?php echo h($introduce['business_type']); ?>
	</li>
	<li id="company_3_li_0">法人代表</li>
	<li id="company_3_li">
		<?php echo h($introduce['legal_representative']); ?>
	</li>
	<li id="company_3_li_0">商业范围</li>
	<li id="company_3_li">
		<?php echo h($introduce['business_scope']); ?>
	</li>
	<li id="company_3_li_0">注册资金</li>
	<li id="company_3_li">
		<?php echo h($introduce['registered_capital']); ?> 
	</li>
	<li id="company_3_li_0">员工人数</li>
	<li id="company_3_li">
		<?php echo h($companyNumber[$introduce['employees_number']]); ?>
	</li>
	<li id="company_3_li_0">企业介绍</li>
	<li id="company_3_li">
		<?php echo h($introduce['introduce']); ?>
	</li>
	<?php if(!isset($introduce))
	{
?>
	<li id="company_3_li">暂无记录</li>
<?php
	}
else
{
	if(isset($isCurrentCompany))
	{ ?>
		<li id="company_3_edit">
		<?php 
		echo $this->Html->link('编辑', array('controller'=>'CompanyIntroduces', 'action'=>'company_introduce_submit'));
		?>
		</li>
<?php
	}
}
?>
</div>
