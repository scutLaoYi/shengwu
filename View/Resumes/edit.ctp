<div class="resumes form">
<?php echo $this->Form->create('Resume'); ?>
	<fieldset>
		<legend><?php echo __('Edit Resume'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('name');
		echo $this->Form->input('sex');
		echo $this->Form->input('age');
		echo $this->Form->input('ethnic');
		echo $this->Form->input('hometown');
		echo $this->Form->input('political');
		echo $this->Form->input('height');
		echo $this->Form->input('weight');
		echo $this->Form->input('picture_url');
		echo $this->Form->input('address');
		echo $this->Form->input('cellphone');
		echo $this->Form->input('email');
		echo $this->Form->input('code');
		echo $this->Form->input('qq');
		echo $this->Form->input('salary');
		echo $this->Form->input('working_type');
		echo $this->Form->input('post');
		echo $this->Form->input('working_area');
		echo $this->Form->input('working_time');
		echo $this->Form->input('institutions');
		echo $this->Form->input('graduation');
		echo $this->Form->input('educational');
		echo $this->Form->input('profession');
		echo $this->Form->input('foreign_language');
		echo $this->Form->input('education_experience');
		echo $this->Form->input('working_experience');
		echo $this->Form->input('working_result');
		echo $this->Form->input('professional_technique');
		echo $this->Form->input('self_evaluate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Resume.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Resume.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
