<div>
	<?php echo $this->Form->create('Forum');?>
	<?php echo $this->Form->input('title',array('label'=>'标题'));?>
	<?php echo $this->Form->input('message',array('label'=>'内容','rows'=>'10'));?>
	<?php echo $this->Form->end('提交');?>
</div>
