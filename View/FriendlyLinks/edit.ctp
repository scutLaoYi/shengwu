<div class="friendlyLinks form">
<?php echo $this->Form->create('FriendlyLink'); ?>
	<fieldset>
		<legend><?php echo __('编辑友情链接'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('link_name',array('label'=>'链接名称'));
		echo $this->Form->input('link_url',array('label'=>'链接'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
<?php echo $this->element('admin_options');?>
</div>
