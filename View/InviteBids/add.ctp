<div class="inviteBids form">
<?php echo $this->Form->create('InviteBid'); ?>
	<fieldset>
		<legend><?php echo __('Add Invite Bid'); ?></legend>
	<?php
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Invite Bids'), array('action' => 'index')); ?></li>
	</ul>
</div>
