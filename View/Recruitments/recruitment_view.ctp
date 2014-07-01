<div id="bigBox">
	<div id="recuriment_3_title"></div>
	<?php ?>
	<div id="recuriment_3_box">
	<ul id="recuriment_3_ul">
		<li id="recuriment_3_li_0">工作名称</li>
		<li id="recuriment_3_li_1">
			<?php echo h($recruitment['Recruitment']['job_title']); ?>
		</li>
		<li id="recuriment_3_li_0">公司名称</li>
		<li id="recuriment_3_li_1">
			<?php echo h($recruitment['CompanyUserInfo']['company']); ?>
		</li>
		<li id="recuriment_3_li_0">招聘人数</li>
		<li id="recuriment_3_li_1">
			<?php echo h($recruitment['Recruitment']['number']); ?>
		</li>
		<li id="recuriment_3_li_0">性别要求</li>
		<li id="recuriment_3_li_1">
			<?php echo h($allSexs[$recruitment['Recruitment']['sex']]); ?>
		</li>
		<li id="recuriment_3_li_0">年龄要求</li>
		<li id="recuriment_3_li_1">
			<?php echo h($recruitment['Recruitment']['age']); ?>
		</li>
		<li id="recuriment_3_li_0">教育程度</li>
		<li id="recuriment_3_li_1">
			<?php echo h($allEducational[$recruitment['Recruitment']['educational']]); ?>
		</li>
		<li id="recuriment_3_li_0">工作类型</li>
		<li id="recuriment_3_li_1">
			<?php echo h($allWorkingType[$recruitment['Recruitment']['working_type']]); ?>
		</li>
		<li id="recuriment_3_li_0">工作时间</li>
		<li id="recuriment_3_li_1">
			<?php echo h($recruitment['Recruitment']['working_time']); ?>
		</li>
		<li id="recuriment_3_li_0">工作地区</li>
		<li id="recuriment_3_li_1">
			<?php echo h($allProvince[$recruitment['Recruitment']['working_area']]); ?>
		</li>
		<li id="recuriment_3_li_0">户口要求</li>
		<li id="recuriment_3_li_1">
			<?php echo h($recruitment['Recruitment']['account_required']); ?>
		</li>
		<li id="recuriment_3_li_0">外语要求</li>
		<li id="recuriment_3_li_1">
			<?php echo h($recruitment['Recruitment']['language_acquired']); ?>
		</li>
		<li id="recuriment_3_li_0">职位月薪</li>
		<li id="recuriment_3_li_1">
			<?php echo h($recruitment['Recruitment']['salary']); ?>
		</li>
		<li id="recuriment_3_li_0">截至日期</li>
		<li id="recuriment_3_li_1">
			<?php echo h($recruitment['Recruitment']['deadline']); ?>
		</li>
		<li id="recuriment_3_li_0">联系邮箱</li>
		<li id="recuriment_3_li_1">
			<?php echo h($recruitment['Recruitment']['email']); ?>
		</li>
		<li id="recuriment_3_li_0">联系电话</li>
		<li id="recuriment_3_li_1">
			<?php echo h($recruitment['Recruitment']['phone']); ?>
		</li>
	</ul>
	</div>

	<div class="request_content ">
	<span class="request_title ">具体要求</span>
		<div class="request_item_box">
		<div class="request_item">
			<?php echo h($recruitment['Recruitment']['detail']); ?>
		</div>
		</div>
	</span>
	</div>
	<div class="recuriment_return">
	<?php echo $this->Html->link('我要发简历', array('controller'=>'Resumes','action'=>'post_resume',$recruitment['Recruitment']['id']));?>
	<?php echo $this->Html->link('返回', $referer);?>
	</div>
</div>
