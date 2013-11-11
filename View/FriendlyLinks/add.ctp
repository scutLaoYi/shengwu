<div class="friendlyLinks form">
<?php echo $this->Form->create('FriendlyLink'); ?>
	<fieldset>
		<legend><?php echo __('Add Friendly Link'); ?></legend>
	<?php
		echo $this->Form->input('link_name');
		echo $this->Form->input('link_url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Friendly Links'), array('action' => 'index')); ?></li>
	</ul>
</div>
