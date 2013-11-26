<div class="recruitments view">
<h2><?php echo __('招聘详细'); ?> </h2>
	<dl>
		<dt><?php echo __('工作名称'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['job_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('公司名称'); ?></dt>
		<dd>
			<?php echo h($recruitment['CompanyUserInfo']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('招聘人数'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('性别要求'); ?></dt>
		<dd>
			<?php echo h($allSexs[$recruitment['Recruitment']['sex']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('年龄要求'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('教育程度'); ?></dt>
		<dd>
			<?php echo h($allEducational[$recruitment['Recruitment']['educational']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('工作类型'); ?></dt>
		<dd>
			<?php echo h($allWorkingType[$recruitment['Recruitment']['working_type']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('工作时间'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['working_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('工作地区'); ?></dt>
		<dd>
			<?php echo h($allProvince[$recruitment['Recruitment']['working_area']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('户口要求'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['account_required']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('外语要求'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['language_acquired']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('职位月薪'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['salary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('截至日期'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['deadline']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('具体要求'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['detail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('联系邮箱'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('联系电话'); ?></dt>
		<dd>
			<?php echo h($recruitment['Recruitment']['phone']); ?>
			&nbsp;
		</dd>
	</dl>
	<?php echo $this->Html->link('返回', $referer);?>
	&nbsp;&nbsp;&nbsp;
	<?php echo $this->Html->link('我要发简历', array('controller'=>'Resumes','action'=>'post_resume',$recruitment['Recruitment']['id']));?>
</div>
