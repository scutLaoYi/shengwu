<div class="users index">
	<?php
echo $this->Html->link('个人用户 ', array('action'=>'index', 2)); 
echo $this->Html->link('企业用户 ', array('action'=>'index', 1)); 
echo $this->Html->link('管理员帐号', array('action'=>'index', 3)); 
?>
	<h2><?php echo __('用户列表'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('用户id'); ?></th>
			<th><?php echo $this->Paginator->sort('用户名'); ?></th>
			<th><?php echo $this->Paginator->sort('用户邮箱'); ?></th>
			<th><?php echo $this->Paginator->sort('用户类型'); ?></th>
			<th><?php echo $this->Paginator->sort('创建时间'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($allUserType[$user['User']['type']]); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('编辑'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $user['User']['id']), null, __('确定删除用户 %s吗?', $user['User']['username'])); ?>
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
	<?php echo $this->element('admin_options'); ?>
</div>
