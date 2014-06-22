<div id="bigBox">
	<div id="leftBox">
	<?php ?>
	<div id="aboutUs_title"></div>
	<ul id="listUl">
		<li>
			<?php echo $this->Html->link('了解我们',array('controller'=>'AboutUs','action'=>'pre_know_us_view'));?>
	&nbsp;
		</li>
		<li>
		<?php echo $this->Html->link('服务项目',array('controller'=>'AboutUs','action'=>'pre_service_view'));?>
	&nbsp;
		</li>
		<li>
		<?php echo $this->Html->link('法律声明',array('controller'=>'AboutUs','action'=>'pre_legal_notice_view'));?>
	&nbsp;
		</li>
		<li>
		<?php echo $this->Html->link('联系我们',array('controller'=>'AboutUs','action'=>'pre_link_us_view'));?>
	&nbsp;
		</li>
		<li>
		<?php echo $this->Html->link('友情提示',array('controller'=>'AboutUs','action'=>'pre_friend_message_view'));?>
	&nbsp;
		</li>

	</div>
	<div id="aboutUsBox">
	<?php $message=ereg_replace("\n","</br>\n",$content);?>
	<div id="aboutUs_content">
	<?php echo __($message);?>
	</div>
	</div>
</div>

