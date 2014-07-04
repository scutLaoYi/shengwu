<div class="action_menu">
<?php echo $this->element('admin_options');?>
</div>

<div class="manage_fieldset">
<?php echo $this->Form->create('FriendlyLink'); ?>
	<fieldset>
		<legend><?php echo __('编辑友情链接'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('link_name',array('label'=>'链接名称'));
		echo $this->Form->input('link_url',array('label'=>'链接'));
	?>
<?php echo $this->Form->end(__('提交')); ?>
	</fieldset>

</div>

