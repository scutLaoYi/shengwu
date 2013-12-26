<div class="view form">
	<?php echo $this->Html->link('了解我们',array('controller'=>'AboutUs','action'=>'know_us_view'));?>
	&nbsp;
	<?php echo $this->Html->link('服务项目',array('controller'=>'AboutUs','action'=>'service_view'));?>
	&nbsp;
	<?php echo $this->Html->link('法律声明',array('controller'=>'AboutUs','action'=>'legal_notice_view'));?>
	&nbsp;
	<?php echo $this->Html->link('联系我们',array('controller'=>'AboutUs','action'=>'link_us_view'));?>
	&nbsp;
	<?php echo $this->Html->link('友情提示',array('controller'=>'AboutUs','action'=>'friend_message_view'));?>
	&nbsp;
	<?php echo $this->Html->link('广告位招租注意事项',array('controller'=>'AboutUs','action'=>'ad_notice_view'));?>
	&nbsp;
	</br>
	<?php echo $this->Html->link('编辑'.$head,array('action'=>$url));?>
	</br>
	<?php $message=ereg_replace("\n","</br>\n",$content);?>
	<?php echo ($message);?>
</div>
<div class="actions">
<?php echo $this->element('admin_options');?>
</div>
