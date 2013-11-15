<div class="resumes view">
<h2><?php echo __('Resume'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resume['User']['id'], array('controller' => 'users', 'action' => 'view', $resume['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ethnic'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['ethnic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hometown'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['hometown']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Political'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['political']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Picture Url'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['picture_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cellphone'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['cellphone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qq'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['qq']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salary'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['salary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Working Type'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['working_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['post']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Working Area'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['working_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Working Time'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['working_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institutions'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['institutions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Graduation'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['graduation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Educational'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['educational']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profession'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['profession']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Language'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['foreign_language']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Education Experience'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['education_experience']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Working Experience'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['working_experience']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Working Result'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['working_result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Professional Technique'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['professional_technique']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Self Evaluate'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['self_evaluate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resume'), array('action' => 'edit', $resume['Resume']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Resume'), array('action' => 'delete', $resume['Resume']['id']), null, __('Are you sure you want to delete # %s?', $resume['Resume']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
