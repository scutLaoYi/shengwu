<div class="action_menu">
<?php echo $this->element('admin_options');?>
</div>

<div class="manage_fieldset">
<h2><?php echo __('公司介绍'); ?></h2>
	<ul>
		<li id="manage_li1"><?php echo __('Id'); ?></li>
		<li id="manage_li2">
			<?php echo h($companyIntroduce['CompanyIntroduce']['id']); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('公司主页图片'); ?></li>
		<li id="manage_li2">
			<?php echo $this->Html->image('./'.$companyIntroduce['CompanyIntroduce']['picture_url'],array('wilih'=>'300','height'=>'300')); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('企业经济性质'); ?></li>
		<li id="manage_li2">
			<?php echo h($nature[$companyIntroduce['CompanyIntroduce']['economic_nature']]); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('企业经营模式'); ?></li>
		<li id="manage_li2">
			<?php echo h($companyIntroduce['CompanyIntroduce']['business_type']); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('法人'); ?></li>
		<li id="manage_li2">
			<?php echo h($companyIntroduce['CompanyIntroduce']['legal_representative']); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('企业经营范围'); ?></li>
		<li id="manage_li2">
			<?php echo h($companyIntroduce['CompanyIntroduce']['business_scope']); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('注册资金'); ?></li>
		<li id="manage_li2">
			<?php echo h($companyIntroduce['CompanyIntroduce']['registered_capital']); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('公司员工'); ?></li>
		<li id="manage_li2">
			<?php echo h($number[$companyIntroduce['CompanyIntroduce']['employees_number']]); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('公司介绍'); ?></li>
		<li id="manage_li2">
			<?php echo h($companyIntroduce['CompanyIntroduce']['introduce']); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('创建时间'); ?></li>
		<li id="manage_li2">
			<?php echo h($companyIntroduce['CompanyIntroduce']['created']); ?>
			&nbsp;
		</li>
		<li id="manage_li1"><?php echo __('状态');?></li>
		<li id="manage_li2">
			<?php echo h($allStatus[$companyIntroduce['CompanyIntroduce']['status']]); ?>
			&nbsp;
		</li>
	</ul>
</div>

