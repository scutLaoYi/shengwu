<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($user['User']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Company User Infos'), array('controller' => 'company_user_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company User Info'), array('controller' => 'company_user_infos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('controller' => 'resumes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume'), array('controller' => 'resumes', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Company User Infos'); ?></h3>
	<?php if (!empty($user['CompanyUserInfo'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $user['CompanyUserInfo']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
	<?php echo $user['CompanyUserInfo']['user_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
	<?php echo $user['CompanyUserInfo']['company']; ?>
&nbsp;</dd>
		<dt><?php echo __('Contact Person'); ?></dt>
		<dd>
	<?php echo $user['CompanyUserInfo']['contact_person']; ?>
&nbsp;</dd>
		<dt><?php echo __('Contact Number'); ?></dt>
		<dd>
	<?php echo $user['CompanyUserInfo']['contact_number']; ?>
&nbsp;</dd>
		<dt><?php echo __('Tax'); ?></dt>
		<dd>
	<?php echo $user['CompanyUserInfo']['tax']; ?>
&nbsp;</dd>
		<dt><?php echo __('Province'); ?></dt>
		<dd>
	<?php echo $user['CompanyUserInfo']['province']; ?>
&nbsp;</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
	<?php echo $user['CompanyUserInfo']['address']; ?>
&nbsp;</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
	<?php echo $user['CompanyUserInfo']['code']; ?>
&nbsp;</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
	<?php echo $user['CompanyUserInfo']['website']; ?>
&nbsp;</dd>
		<dt><?php echo __('Qq'); ?></dt>
		<dd>
	<?php echo $user['CompanyUserInfo']['qq']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Company User Info'), array('controller' => 'company_user_infos', 'action' => 'edit', $user['CompanyUserInfo']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php echo __('Related Resumes'); ?></h3>
	<?php if (!empty($user['Resume'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $user['Resume']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
	<?php echo $user['Resume']['user_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
	<?php echo $user['Resume']['name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
	<?php echo $user['Resume']['sex']; ?>
&nbsp;</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
	<?php echo $user['Resume']['age']; ?>
&nbsp;</dd>
		<dt><?php echo __('Ethnic'); ?></dt>
		<dd>
	<?php echo $user['Resume']['ethnic']; ?>
&nbsp;</dd>
		<dt><?php echo __('Hometown'); ?></dt>
		<dd>
	<?php echo $user['Resume']['hometown']; ?>
&nbsp;</dd>
		<dt><?php echo __('Political'); ?></dt>
		<dd>
	<?php echo $user['Resume']['political']; ?>
&nbsp;</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
	<?php echo $user['Resume']['height']; ?>
&nbsp;</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
	<?php echo $user['Resume']['weight']; ?>
&nbsp;</dd>
		<dt><?php echo __('Picture Url'); ?></dt>
		<dd>
	<?php echo $user['Resume']['picture_url']; ?>
&nbsp;</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
	<?php echo $user['Resume']['address']; ?>
&nbsp;</dd>
		<dt><?php echo __('Cellphone'); ?></dt>
		<dd>
	<?php echo $user['Resume']['cellphone']; ?>
&nbsp;</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
	<?php echo $user['Resume']['email']; ?>
&nbsp;</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
	<?php echo $user['Resume']['code']; ?>
&nbsp;</dd>
		<dt><?php echo __('Qq'); ?></dt>
		<dd>
	<?php echo $user['Resume']['qq']; ?>
&nbsp;</dd>
		<dt><?php echo __('Salary'); ?></dt>
		<dd>
	<?php echo $user['Resume']['salary']; ?>
&nbsp;</dd>
		<dt><?php echo __('Working Type'); ?></dt>
		<dd>
	<?php echo $user['Resume']['working_type']; ?>
&nbsp;</dd>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
	<?php echo $user['Resume']['post']; ?>
&nbsp;</dd>
		<dt><?php echo __('Working Area'); ?></dt>
		<dd>
	<?php echo $user['Resume']['working_area']; ?>
&nbsp;</dd>
		<dt><?php echo __('Working Time'); ?></dt>
		<dd>
	<?php echo $user['Resume']['working_time']; ?>
&nbsp;</dd>
		<dt><?php echo __('Institutions'); ?></dt>
		<dd>
	<?php echo $user['Resume']['institutions']; ?>
&nbsp;</dd>
		<dt><?php echo __('Graduation'); ?></dt>
		<dd>
	<?php echo $user['Resume']['graduation']; ?>
&nbsp;</dd>
		<dt><?php echo __('Educational'); ?></dt>
		<dd>
	<?php echo $user['Resume']['educational']; ?>
&nbsp;</dd>
		<dt><?php echo __('Profession'); ?></dt>
		<dd>
	<?php echo $user['Resume']['profession']; ?>
&nbsp;</dd>
		<dt><?php echo __('Foreign Language'); ?></dt>
		<dd>
	<?php echo $user['Resume']['foreign_language']; ?>
&nbsp;</dd>
		<dt><?php echo __('Education Experience'); ?></dt>
		<dd>
	<?php echo $user['Resume']['education_experience']; ?>
&nbsp;</dd>
		<dt><?php echo __('Working Experience'); ?></dt>
		<dd>
	<?php echo $user['Resume']['working_experience']; ?>
&nbsp;</dd>
		<dt><?php echo __('Working Result'); ?></dt>
		<dd>
	<?php echo $user['Resume']['working_result']; ?>
&nbsp;</dd>
		<dt><?php echo __('Professional Technique'); ?></dt>
		<dd>
	<?php echo $user['Resume']['professional_technique']; ?>
&nbsp;</dd>
		<dt><?php echo __('Self Evaluate'); ?></dt>
		<dd>
	<?php echo $user['Resume']['self_evaluate']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $user['Resume']['created']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Resume'), array('controller' => 'resumes', 'action' => 'edit', $user['Resume']['id'])); ?></li>
			</ul>
		</div>
	</div>
	