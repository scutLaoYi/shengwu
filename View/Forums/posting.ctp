<div>
<?php echo $this->Html->script('tiny_mce/tiny_mce.js');?>
<script type="text/javascript">
    tinyMCE.init({
        theme : "advanced",
        mode : "textareas",
        convert_urls : false
    });
</script> 
	<?php echo $this->Form->create('Forum');?>
	<?php echo $this->Form->input('title',array('label'=>'标题'));?>
	<?php echo $this->Form->input('content',array('label'=>'内容','rows'=>5));?>
	<?php echo $this->Form->end('提交');?>
</div>
