<div id="Title"><?php echo $subtitle;?></div>
<div id="anotherPageBox">
<?php echo $this->Html->link('论坛首页',array('action'=>'index'));?>
<?php echo ('>>'.$title.'>>'.$subtitle);?>
<div class="paging">
<?php
echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>
<div id="forumDiv">
<div id="btnDiv"><div id="btn"><?php echo $this->Html->link('发贴',array('controller'=>'Forums','action'=>'posting',$type,$typesub));?></div></div>	
	<table cellpadding="0" cellspacing ="0">
	<tr>
	<th id="Left"><?php echo '标题'?></th>
	<th><?php echo '作者'?></th>
	<th><?php echo '发布时间'?></th>
	<th></th>
	</tr>
	<?php foreach($forums as $forum):?>
	<tr>
		<td id="Left">	
			<?php 
			 echo $this->Html->link($forum['Forum']['title'],array('controller'=>'Forums','action'=>'view',$forum['Forum']['id']));?>
		</td>
		<td>
			<?php echo $forum['User']['username'];?>
		</td>
		<td>
			<?php echo $forum['Forum']['created'];?>
		</td>
		<td>	
		<?php
		if($isAdmin)
		{
			echo $this->html->link('删除',array('action'=>'deletePost',$forum['Forum']['id']));
		}
		?>
		</td>
	</tr>
	<?php endforeach;?>
</table>

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
</div>
