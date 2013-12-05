<div class="inviteBids form">
<?php echo $this->Form->create('InviteBid'); ?>
	<fieldset>
		<legend><?php echo __('修改招标中标'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('content',array('label'=>'内容'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('提交')); ?>
</div>
<div class="actions">
<?php echo $this->element('admin_options');?>
</div>
