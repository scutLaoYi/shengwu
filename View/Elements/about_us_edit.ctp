<div class="action_menu">
<?php echo $this->element('admin_options');?>
</div>
<div class="manage_fieldset">
<?php echo $this->Form->create('AboutUs'); ?>
	<fieldset>
		<legend><?php echo __($head); ?></legend>
	<?php
		echo $this->Form->input('content',array('label'=>'','rows'=>'10'));
	?>
<?php echo $this->Form->end(__('提交')); ?>
	</fieldset>

</div>

