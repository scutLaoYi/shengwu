<div class="adLists form">
<?php echo $this->Form->create('AdList'); ?>
	<fieldset>
		<legend><?php echo __('Add Ad List'); ?></legend>
	<?php
		echo $this->Form->input('pic_url');
		echo $this->Form->input('company_user_info_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ad Lists'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Company User Infos'), array('controller' => 'company_user_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company User Info'), array('controller' => 'company_user_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
