<div class="recruitments form">
<?php echo $this->Form->create('Recruitment'); ?>
	<fieldset>
		<legend><?php echo __('编辑该招聘状态'); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->input('endtime', array('label'=>'到期时间', 'type'=>'date', 'monthNames'=>$allMonth));
		echo $this->Form->input('status', array('label'=>'状态', 'options'=>$allStatus));
	?>
	</fieldset>
<?php echo $this->Form->end(__('提交')); ?>
</div>
<div class="actions">
	<?php echo $this->element('admin_options');?>
</div>
