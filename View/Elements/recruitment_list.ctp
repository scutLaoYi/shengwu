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
		<?php echo h('工作地点:'.$allProvince[$recruitment['Recruitment']['working_area']]);?>
	</td>
	<td>
		<?php echo h('招聘人数:'.$recruitment['Recruitment']['number']);?>
	</td>
	<td>
		<?php echo h('发布时间:'.$recruitment['Recruitment']['created']);?>
	</td>
</tr>
<?php endforeach; ?>
</table>

<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('第{:page}页， 共{:pages}页')
	));
	?>
</p>	
<div class="paging">
<?php 
echo $this->Paginator->prev('< ' . __('上一页'),array(),null,array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('下一页') . ' >',array(),null,array('class'=>'next disabled'));
?>
</div>
