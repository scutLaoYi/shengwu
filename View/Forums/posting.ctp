<div>
	
	<?php echo $this->Form->create('Forum');?>
	<?php echo $this->Form->input('title',array('label'=>'标题'));?>
	<?php echo $this->Form->input('message',array('label'=>'内容','rows'=>5));?>
	<?php echo $this->Form->end('提交',array('onClick'=>'abcEdit_save()'));?>
</div>
