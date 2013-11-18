<div class="recruitments form">
<?php echo $this->Form->create('Recruitment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Recruitment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('company_user_info_id');
		echo $this->Form->input('job_title');
		echo $this->Form->input('number');
		echo $this->Form->input('sex');
		echo $this->Form->input('age');
		echo $this->Form->input('educational');
		echo $this->Form->input('working_type');
		echo $this->Form->input('working_time');
		echo $this->Form->input('working_area');
		echo $this->Form->input('account_required');
		echo $this->Form->input('language_acquired');
		echo $this->Form->input('salary');
		echo $this->Form->input('deadline');
		echo $this->Form->input('detail');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Recruitment.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Recruitment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Recruitments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Company User Infos'), array('controller' => 'company_user_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company User Info'), array('controller' => 'company_user_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
