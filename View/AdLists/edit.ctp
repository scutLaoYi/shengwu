<div class="adLists form">
<?php echo $this->Form->create('AdList',array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('添加广告位'); ?></legend>
	<?php
		echo $this->Form->input('pic_url',array('type'=>'file','label'=>'图片'));
		echo $this->Form->input('username');
		echo $this->Form->input('deadline',array('type'=>'date','label'=>'截至时间'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('提交')); ?>
<?php echo $this->Html->link('返回',array('controller'=>'AdLists','action'=>'index'));?>
