<?php echo $this->Html->script('tiny_mce/tiny_mce.js');?>
<script type="text/javascript">
    tinyMCE.init({
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
<!--显示贴头-->
<div>
	<?php echo h($forum['Forum']['title']);?>
	</br>
	<?php echo $forum['User']['username'];?>
	<?php echo $forum['Forum']['message'];?>
</div>
<!--显示回复-->

<div class="list">
	<table cellpadding="0" cellspacing ="0">
	<?php foreach($remarks as $remark):?>
	<tr>
		<td> 
			<?php echo $remark['Remark']['level'].'楼  ';?>
			<?php echo $remark['User']['username'];?>
			</br>
			<?php echo $remark['Remark']['created'];?>
		</td>
		<td>
			<?php echo $remark['Remark']['message'];?>
		</td>
		<td>
		<?php 
			if($isAdmin)
			{
				echo $this->Html->link('删除',array('action'=>'deleteRemark',$remark['Remark']['id']));
			}
		?>
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
<!--回复编辑器-->
<div>
	<?php echo $this->Form->create('Remark',array('url'=>array('controller'=>'Remarks','action'=>'save',$forum['Forum']['id'])));?>
	<?php echo $this->Form->input('content',array('rows'=>4,'label'=>'快速回复该主题'));?>
	<?php echo $this->Form->end('发表回复');?>
</div>
