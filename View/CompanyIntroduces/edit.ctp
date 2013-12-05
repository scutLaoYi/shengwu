<div class="companyIntroduces form">
<?php echo $this->Form->create('CompanyIntroduce'); ?>
	<fieldset>
		<legend><?php echo __('公司推广信息编辑'); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->hidden('company_user_info_id');
		echo $this->Form->input('endtime', array('label'=>'到期时间', 'type'=>'date','monthNames'=>$allMonth));
		echo $this->Form->input('status', array('label'=>'状态','options'=>$allStatus));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<?php echo $this->element('admin_options'); ?>
</div>
