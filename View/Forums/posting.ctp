<?php echo $this->Html->script('tiny_mce/tiny_mce.js');?>
<script type="text/javascript">
    tinyMCE.init({
		width : "1000",
        theme : "advanced",
        mode : "textareas",
		invalid_elements : "script",
        convert_urls : false
    });
</script> 

<div id="bigBox">
	<div id="Title_bottom">
		<?php echo $this->Html->link('论坛首页',array('action'=>'index'));?>
		<?php echo ('>>');?>
		<?php echo $this->Html->link($title.'_'.$subtitle,array('action'=>'posting_list',$type,$typesub));?>
		<?php echo ('>>发帖');?>
	</div>

	<?php echo $this->Form->create('Forum');?>
	<div id="fatie_title">
		<?php echo $this->Form->input('title',array('label'=>' 标题 '));?>
	</div>
	<div id="fatie_content">
		<?php echo $this->Form->input('content',array('label'=>' 内容 ','rows'=>5));?>
	</div>
	<div id="huifu_yanzheng">验证码:</div>
	<div id="huifu_yanzheng_input">
			<?php $this->Captcha->render($captchaSettings);?>
	</div>
	<div id="huifu_button">
		<?php echo $this->Form->end('提交');?>
	</div>
</div>
