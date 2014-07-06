
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
	<?php echo $this->Html->link($title.'_'.$subtitle,array('action'=>'posting_list',$forum['Forum']['type'],$forum['Forum']['typesub']));?>
	<?php echo ('>>');?>
	<?php echo h($forum['Forum']['title']);?>
	</div>
<!--显示贴头-->
	<div id="forum_header"><?php echo h($forum['Forum']['title']);?></div>


	<div id="forum_in">
		<p id="p_author">作者</p><p id="p_normal">:</p>
		<p id="p_name"><?php echo h($forum['User']['username']);?> </p>
		<p id="p_normal">发表时间:</p>
		<p id="p_normal"><?php echo h($forum['User']['created']);?></p>
	</div> 
	<div id="forum_box">
		<div id="forum_item">
			<?php echo $forum['Forum']['message'];?>
		</div>
	</div>

<!--显示回复-->

	<?php foreach($remarks as $remark):?>
	<div id="forum_in">
		<p id="p_normal"><?php echo $remark['Remark']['level'].'楼   ';?></p>
		<p id="p_normal">用户:</p>
		<p id="p_name"><?php echo h($remark['User']['username']);?></p>
		<p id="p_normal"><?php echo '发表时间: '.$remark['Remark']['created'];?></p>
		<?php 
			if($isAdmin)
			{
				echo $this->Html->link('删除',array('action'=>'deleteRemark',$remark['Remark']['id']));
			}
		?>
	</div>
	<div id="forum_box">
		<div id="forum_item">
			<?php echo $remark['Remark']['message'];?>
		</div>
	</div>
	<?php endforeach;?>

	<div class="paging">
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('第 {:page} 页，共 {:pages} 页')
	));
	?>	
	</p>
	<?php
	echo $this->Paginator->prev('< ' . __('上页'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('下页') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>	
<!--回复编辑器-->
	<div id="huifu">回复主题</div>
	<div id="huifu_input">
	<?php echo $this->Form->create('Remark',array('url'=>array('controller'=>'Remarks','action'=>'save',$forum['Forum']['id'])));?>
	<?php echo $this->Form->input('content',array('rows'=>4,'label'=>''));?>
	<div id="huifu_yanzheng">验证码:</div>
	<div id="huifu_yanzheng_input"><?php $this->Captcha->render($captchaSettings);?>
	</div>
	<div id="huifu_button">
		<?php echo $this->Form->end('发表回复');?>
	</div>
	</div>
</div>
