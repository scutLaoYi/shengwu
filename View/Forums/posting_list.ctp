<?php echo $this->Html->link('论坛首页',array('action'=>'index'));?>
<?php echo ('>>'.$title.'_'.$subtitle);?>
<div id="anotherPageBox">
<div class="list">
	<h2><?php echo $subtitle;?></h2>
<?php echo $this->Html->link('发帖',array('controller'=>'Forums','action'=>'posting',$type,$typesub));?>	
	<table cellpadding="0" cellspacing ="0">
	<th><?php echo '标题'?></th>
	<th><?php echo '作者'?></th>
	<th><?php echo '发布时间'?></th>
	<?php foreach($forums as $forum):?>
	<tr>
		<td>	
			<?php 
			 echo $this->Html->link($forum['Forum']['title'],array('controller'=>'Forums','action'=>'view',$forum['Forum']['id']));?>
		</td>
		<td>
			<?php echo $forum['User']['username'];?>
		</td>
		<td>
			<?php echo $forum['Forum']['created'];?>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<p>
<?php
echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
));
?>	
</p>
<div class="paging">
<?php
echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>
</div>
</div>
