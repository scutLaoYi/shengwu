<div class="resumes index">
	<h2><?php echo __('简历列表'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('User.username','用户名');?></th>
			<th><?php echo $this->Paginator->sort('name', '姓名'); ?></th>
			<th><?php echo $this->Paginator->sort('sex', '性别'); ?></th>
			<th><?php echo $this->Paginator->sort('age', '年龄'); ?></th>
			<th><?php echo $this->Paginator->sort('cellphone', '电话'); ?></th>
			<th><?php echo $this->Paginator->sort('email', '邮箱'); ?></th>
			<th><?php echo $this->Paginator->sort('qq','QQ'); ?></th>
			<th><?php echo $this->Paginator->sort('created', '创建时间'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($resumes as $resume): ?>
	<tr>
		<td><?php echo $this->Html->link($resume['User']['username'], array('controller'=>'Users','action'=>'view', $resume['User']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($resume['Resume']['name'], array('action'=>'view', $resume['Resume']['id'])); ?>&nbsp;</td>
		<td><?php echo h($allSex[$resume['Resume']['sex']]); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['age']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['cellphone']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['email']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['qq']); ?>&nbsp;</td>
		<td><?php echo h($resume['Resume']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $resume['Resume']['id']), null, __('确定删除用户 %s的简历?', $resume['Resume']['name'])); ?>
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
	<?php echo $this->element('admin_options');?>
</div>
