<div class="inviteBids view">
<h2><?php echo __('Invite Bid'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($inviteBid['InviteBid']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($inviteBid['InviteBid']['content']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Invite Bid'), array('action' => 'edit', $inviteBid['InviteBid']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Invite Bid'), array('action' => 'delete', $inviteBid['InviteBid']['id']), null, __('Are you sure you want to delete # %s?', $inviteBid['InviteBid']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Invite Bids'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invite Bid'), array('action' => 'add')); ?> </li>
	</ul>
</div>
