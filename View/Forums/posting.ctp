<div>
<?php echo $this->Html->link('论坛首页',array('action'=>'index'));?>
<?php echo ('>>');?>
<?php echo $this->Html->link($title.'_'.$subtitle,array('action'=>'posting_list',$type,$typesub));?>
<?php echo ('>>发帖');?>
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
