<?php echo $this->Form->create('Recruitment'); ?>
<h2><?php echo __('招聘信息列表'); ?></h2>
<table cellpadding="0" cellspacing="0">
<?php foreach($recruitments as $recruitment):?>
<tr>
	<td>
		<?php echo $this->Html->link($recruitment['Recruitment']['job_title'],array('controller'=>'Recruitments','action'=>'recruitment_view',$recruitment['Recruitment']['id'])); 
		?>
	</td>
	<td>
		<?php echo $this->Html->link($recruitment['CompanyUserInfo']['company'],array('controller'=>'CompanyDescriptions','action'=>'view_recruitment',$recruitment['CompanyUserInfo']['id']) );?>
	</td>
	<td>
		<?php echo '工作地点:'.$allProvince[$recruitment['Recruitment']['working_area']];?>
	</td>
	<td>
		<?php echo '招聘人数:'.$recruitment['Recruitment']['number'];?>
	</td>
	<td>
		<?php echo '发布时间:'.$recruitment['Recruitment']['created'];?>
	</td>
</tr>
<?php endforeach; ?>
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
echo $this->Paginator->prev('< ' . __('previous'),array(),null,array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('next') . ' >',array(),null,array('class'=>'next disabled'));
?>
</div>
