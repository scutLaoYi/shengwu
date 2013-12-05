<div class="companyIntroduces view">
<h2><?php echo __('公司介绍'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('公司主页图片'); ?></dt>
		<dd>
			<?php echo $this->Html->image('./'.$companyIntroduce['CompanyIntroduce']['picture_url'],array('width'=>'300','height'=>'300')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('企业经济性质'); ?></dt>
		<dd>
			<?php echo h($nature[$companyIntroduce['CompanyIntroduce']['economic_nature']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('企业经营模式'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['business_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('法人'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['legal_representative']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('企业经营范围'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['business_scope']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('注册资金'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['registered_capital']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('公司员工'); ?></dt>
		<dd>
			<?php echo h($number[$companyIntroduce['CompanyIntroduce']['employees_number']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('公司介绍'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['introduce']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('创建时间'); ?></dt>
		<dd>
			<?php echo h($companyIntroduce['CompanyIntroduce']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('状态');?></dt>
		<dd>
			<?php echo h($allStatus[$companyIntroduce['CompanyIntroduce']['status']]); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
<?php echo $this->element('admin_options');?>
</div>
