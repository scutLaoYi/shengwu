<div class="aboutUs form">
<?php echo $this->Form->create('AboutUs'); ?>
	<fieldset>
		<legend><?php echo __($head); ?></legend>
	<?php
		echo $this->Form->input('content',array('label'=>'内容','rows'=>'10'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('提交')); ?>
</div>
<div class="actions">
<?php echo $this->element('admin_options');?>
</div>
