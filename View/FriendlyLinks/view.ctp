<div class="friendlyLinks view">
<h2><?php echo __('Friendly Link'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($friendlyLink['FriendlyLink']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link Name'); ?></dt>
		<dd>
			<?php echo h($friendlyLink['FriendlyLink']['link_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link Url'); ?></dt>
		<dd>
			<?php echo h($friendlyLink['FriendlyLink']['link_url']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Friendly Link'), array('action' => 'edit', $friendlyLink['FriendlyLink']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Friendly Link'), array('action' => 'delete', $friendlyLink['FriendlyLink']['id']), null, __('Are you sure you want to delete # %s?', $friendlyLink['FriendlyLink']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Friendly Links'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friendly Link'), array('action' => 'add')); ?> </li>
	</ul>
</div>
