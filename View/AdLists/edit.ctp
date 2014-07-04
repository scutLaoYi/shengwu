<div class="action_menu">
	<?php echo $this->element('admin_options');?>
</div>

<div class="manage_fieldset">
<?php echo $this->Form->create('AdList',array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('添加广告位'); ?></legend>
	<?php
		echo $this->Form->input('pic_url',array('type'=>'file','label'=>'图片'));
		echo $this->Form->input('username',array('label'=>'用户名'));
		echo $this->Form->input('deadline',array('type'=>'date','label'=>'截至时间','monthNames'=>$allMonth));
	?>
<?php echo $this->Form->end(__('提交')); ?>
<?php echo $this->Html->link('返回',array('controller'=>'AdLists','action'=>'index'));?>
	</fieldset>

</div>


