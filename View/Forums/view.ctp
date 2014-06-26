<div id="anotherPageBox">
<?php echo $this->Html->script('tiny_mce/tiny_mce.js');?>
<script type="text/javascript">
    tinyMCE.init({
		width : "1024",
        theme : "advanced",
        mode : "textareas",
        convert_urls : false
    });
</script> 
<?php echo $this->Html->link('论坛首页',array('action'=>'index'));?>
<?php echo ('>>');?>
<?php echo $this->Html->link($title.'_'.$subtitle,array('action'=>'posting_list',$forum['Forum']['type'],$forum['Forum']['typesub']));?>
<?php echo ('>>');?>
<?php echo $forum['Forum']['title'];?>
</div>
<!--显示贴头-->
	<h1 id="titleH1"><?php echo h($forum['Forum']['title']);?> </h1>

	<div id="pagingDiv">
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('第 {:page} 页，共 {:pages} 页')
	));
	?>	
	</p>
	<div class="paging">
	<?php
	echo $this->Paginator->prev('< ' . __('上页'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('下页') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>	
	</div>

	<h2 id="titleH2"><?php echo '作者: ' . $forum['User']['username'];?> </h2> 
	<div id="contentDiv"><?php echo $forum['Forum']['message'];?></div>

<!--显示回复-->

	<table id="tableDiv">
	<?php foreach($remarks as $remark):?>
	<tr id="authorDiv">
		<td> 
			<p id="pBlue"><?php echo $remark['Remark']['level'].'楼   ';?>
			<?php echo '用户: '.$remark['User']['username'].'  ';?>
			<?php echo '发表时间: '.$remark['Remark']['created'];?></p>
		<?php 
			if($isAdmin)
			{
				echo $this->Html->link('删除',array('action'=>'deleteRemark',$remark['Remark']['id']));
			}
		?>
		</td>
	</tr>
	<tr>
		<td id="trContent"><?php echo $remark['Remark']['message'];?></td>
	</tr>
	<?php endforeach;?>
	</table>

	<div id="pagingDiv">
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('第 {:page} 页，共 {:pages} 页')
	));
	?>	
	</p>
	<div class="paging">
	<?php
	echo $this->Paginator->prev('< ' . __('上页'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('下页') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>	
	</div>
<!--回复编辑器-->
<div id="tableDiv">
	<?php echo $this->Form->create('Remark',array('url'=>array('controller'=>'Remarks','action'=>'save',$forum['Forum']['id'])));?>
	<?php echo $this->Form->input('content',array('rows'=>4,'label'=>'快速回复该主题'));?>
	<?php echo $this->Form->end('发表回复');?>
</div>
