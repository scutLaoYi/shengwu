<div class="resumes index">
	<h2><?php echo __('Resumes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('sex'); ?></th>
			<th><?php echo $this->Paginator->sort('age'); ?></th>
			<th><?php echo $this->Paginator->sort('ethnic'); ?></th>
			<th><?php echo $this->Paginator->sort('hometown'); ?></th>
			<th><?php echo $this->Paginator->sort('political'); ?></th>
			<th><?php echo $this->Paginator->sort('height'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('picture_url'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('cellphone'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('qq'); ?></th>
			<th><?php echo $this->Paginator->sort('salary'); ?></th>
			<th><?php echo $this->Paginator->sort('working_type'); ?></th>
			<th><?php echo $this->Paginator->sort('post'); ?></th>
			<th><?php echo $this->Paginator->sort('working_area'); ?></th>
			<th><?php echo $this->Paginator->sort('working_time'); ?></th>
			<th><?php echo $this->Paginator->sort('institutions'); ?></th>
			<th><?php echo $this->Paginator->sort('graduation'); ?></th>
			<th><?php echo $this->Paginator->sort('educational'); ?></th>
			<th><?php echo $this->Paginator->sort('profession'); ?></th>
			<th><?php echo $this->Paginator->sort('foreign_language'); ?></th>
			<th><?php echo $this->Paginator->sort('education_experience'); ?></th>
			<th><?php echo $this->Paginator->sort('working_experience'); ?></th>
			<th><?php echo $this->Paginator->sort('working_result'); ?></th>
			<th><?php echo $this->Paginator->sort('professional_technique'); ?></th>
			<th><?php echo $this->Paginator->sort('self_evaluate'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($resumes as $resume): ?>
	<tr>
		<td><?php echo h($resume['Resume']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resume['User']['id'], array('controller' => 'users', 'action' => 'view', $resume['User']['id'])); ?>
		</td>
		<td><?php echo h($resume['Resume']['name']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['sex']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['age']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['ethnic']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['hometown']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['political']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['height']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['weight']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['picture_url']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['address']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['cellphone']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['email']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['code']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['qq']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['salary']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['working_type']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['post']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['working_area']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['working_time']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['institutions']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['graduation']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['educational']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['profession']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['foreign_language']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['education_experience']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['working_experience']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['working_result']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['professional_technique']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['self_evaluate']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resume['Resume']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resume['Resume']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $resume['Resume']['id']), null, __('Are you sure you want to delete # %s?', $resume['Resume']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Resume'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
