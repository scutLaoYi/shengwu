<div class="recruitments view">
<h2><?php echo __('Recruitment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company User Info'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recruitment['CompanyUserInfo']['id'], array('controller' => 'company_user_infos', 'action' => 'view', $recruitment['CompanyUserInfo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Job Title'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['job_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Educational'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['educational']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Working Type'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['working_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Working Time'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['working_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Working Area'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['working_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Required'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['account_required']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language Acquired'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['language_acquired']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salary'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['salary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deadline'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['deadline']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detail'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['detail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recruitment'), array('action' => 'edit', $recruitment['Recruitment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recruitment'), array('action' => 'delete', $recruitment['Recruitment']['id']), null, __('Are you sure you want to delete # %s?', $recruitment['Recruitment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recruitments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recruitment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Company User Infos'), array('controller' => 'company_user_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company User Info'), array('controller' => 'company_user_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
