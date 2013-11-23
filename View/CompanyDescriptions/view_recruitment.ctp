<div class="proxy_list index">
	<h2>该公司的招聘信息</h2>
	<table >
	<tr>	
		<th><?php echo $this->Paginator->sort('job_title');?> </th>
		<th><?php echo $this->Paginator->sort('number');?> </th>
		<th><?php echo $this->Paginator->sort('working_area');?> </th>
	</tr>
	<?php foreach($Recruitments as $Recruitment): ?>
	<tr>
		<td><?php echo $this->Html->link($Recruitment['Recruitment']['job_title'], array('controller'=>'Recruitments', 'action'=>'recruitment_view', $Recruitment['Recruitment']['id'])); ?> </td>
		<td><?php echo $Recruitment['Recruitment']['number']; ?> </td>
		<td><?php echo $Recruitment['Recruitment']['working_area']; ?> </td>
	</tr>
	<?php endforeach;?>	
</table>

	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

<?php echo $this->element('company_description_option', array(
		'currentId' => $company_id));?>
