<div id="anotherPageBox">
	<h2><?php echo __('招聘详细'); ?> </h2>
	<div class="recuitment_class">
	<ul>
		<li>【工作名称】
			<?php echo h($recruitment['Recruitment']['job_title']); ?>
		</li>
		<li>【公司名称】
			<?php echo h($recruitment['CompanyUserInfo']['company']); ?>
		</li>
		<li>【招聘人数】
			<?php echo h($recruitment['Recruitment']['number']); ?>
		</li>
		<li>【性别要求】
			<?php echo h($allSexs[$recruitment['Recruitment']['sex']]); ?>
		</li>
		<li>【年龄要求】
			<?php echo h($recruitment['Recruitment']['age']); ?>
		</li>
		<li>【教育程度】
			<?php echo h($allEducational[$recruitment['Recruitment']['educational']]); ?>
		</li>
		<li>【工作类型】
			<?php echo h($allWorkingType[$recruitment['Recruitment']['working_type']]); ?>
			&nbsp;
		</li>
		<li>【工作时间】
			<?php echo h($recruitment['Recruitment']['working_time']); ?>
		</li>
		<li>【工作地区】
			<?php echo h($allProvince[$recruitment['Recruitment']['working_area']]); ?>
		</li>
		<li>【户口要求】
			<?php echo h($recruitment['Recruitment']['account_required']); ?>
		</li>
		<li>【外语要求】
			<?php echo h($recruitment['Recruitment']['language_acquired']); ?>
		</li>
		<li>【职位月薪】
			<?php echo h($recruitment['Recruitment']['salary']); ?>
		</li>
		<li>【截至日期】
			<?php echo h($recruitment['Recruitment']['deadline']); ?>
		</li>
		<li>【联系邮箱】
			<?php echo h($recruitment['Recruitment']['email']); ?>
		</li>
		<li>【联系电话】
			<?php echo h($recruitment['Recruitment']['phone']); ?>
		</li>
	</ul>
	</div>

	<div class="request_content ">
	<span class="request_title ">具体要求</span>
		<div class="request_item">
			<?php echo h($recruitment['Recruitment']['detail']); ?>
		</div>
	</span>
	</div>
	<?php echo $this->Html->link('返回', $referer);?>
	&nbsp;&nbsp;&nbsp;
	<?php echo $this->Html->link('我要发简历', array('controller'=>'Resumes','action'=>'post_resume',$recruitment['Recruitment']['id']));?>
</div>
