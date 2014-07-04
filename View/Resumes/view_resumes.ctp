<div id="bigBox">
	<div id="jltitle">
	</div>
		<?php 
if($this->Session->read('type') == 2)
	echo $this->Html->link('编辑',array('controller'=>'Resumes','action'=>'edit_resumes')) 
?>
<div id="resume_box">
	<ul id="resume_ul">
		<?php if($resume['Resume']['picture_url']!=null)
		{?>
		<li id="resume_li0"><?php echo __('头像');?></li>
		<li id="resume_li">
			<?php echo $this->Html->image('./'.$resume['Resume']['picture_url'],array('width'=>'200','height'=>'200'));
		}
		?>
		
		<li id="resume_li0"><?php echo __('姓名'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['name']); ?>
		</li>
		<li id="resume_li0"><?php echo __('性别'); ?></li>
		<li id="resume_li">
			<?php echo h($allSex[$resume['Resume']['sex']]); ?>
		</li>
		<li id="resume_li0"><?php echo __('年龄'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['age']); ?>
		</li>
		<li id="resume_li0"><?php echo __('民族'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['ethnic']); ?>
		</li>
		<li id="resume_li0"><?php echo __('籍贯'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['hometown']); ?>
		</li>
		<li id="resume_li0"><?php echo __('政治面貌'); ?></li>
		<li id="resume_li">
			<?php echo h($allPolitical[$resume['Resume']['political']]); ?>
		</li>
		<li id="resume_li0"><?php echo __('身高'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['height'] . 'cm'); ?>
		</li>
		<li id="resume_li0"><?php echo __('体重'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['weight'] . 'kg'); ?>
		</li>
		<li id="resume_li0"><?php echo __('地址'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['address']); ?>
		</li>
		<li id="resume_li0"><?php echo __('手机号码'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['cellphone']); ?>
		</li>
		<li id="resume_li0"><?php echo __('电子邮箱'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['email']); ?>
		</li>
		<li id="resume_li0"><?php echo __('邮政编码'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['code']); ?>
		</li>
		<li id="resume_li0"><?php echo __('QQ'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['qq']); ?>
		</li>
		<li id="resume_li0"><?php echo __('薪水要求'); ?></li>
		<li id="resume_li">
			<?php echo h($allSalary[$resume['Resume']['salary']]); ?>
		</li>
		<li id="resume_li0"><?php echo __('工作类型'); ?></li>
		<li id="resume_li">
			<?php echo h($allWorkingType[$resume['Resume']['working_type']]); ?>
		</li>
		<li id="resume_li0"><?php echo __('寻求职位类型'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['post']); ?>
		</li>
		<li id="resume_li0"><?php echo __('工作地点'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['working_area']); ?>
		</li>
		<li id="resume_li0"><?php echo __('工作时间'); ?></li>
		<li id="resume_li">
			<?php echo h($allWorkingTime[$resume['Resume']['working_time']]); ?>
		</li>
		<li id="resume_li0"><?php echo __('毕业院校'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['institutions']); ?>
			&nbsp;
		</li>
		<li id="resume_li0"><?php echo __('毕业时间'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['graduation']); ?>
		</li>
		<li id="resume_li0"><?php echo __('学历'); ?></li>
		<li id="resume_li">
			<?php echo h($allEducational[$resume['Resume']['educational']]); ?>
		</li>
		<li id="resume_li0"><?php echo __('专业名称'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['profession']); ?>
		</li>
		<li id="resume_li0"><?php echo __('外语水平'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['foreign_language']); ?>
		</li>
		<li id="resume_li0"><?php echo __('教育经历'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['education_experience']); ?>
		</li>
		<li id="resume_li0"><?php echo __('工作经历'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['working_experience']); ?>
		</li>
		<li id="resume_li0"><?php echo __('工作业绩'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['working_result']); ?>
		</li>
		<li id="resume_li0"><?php echo __('工作技能'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['professional_technique']); ?>
		</li>
		<li id="resume_li0"><?php echo __('自我评价'); ?></li>
		<li id="resume_li">
			<?php echo h($resume['Resume']['self_evaluate']); ?>
		</li>
		<li id="resume_li_return">
		<?php echo $this->Html->link('返回', $referer); ?>
		</li>
	</ul>
	</div>
</div>
