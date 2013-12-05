<div id="anotherPageBox">
<h2><?php echo __($resume['Resume']['name'].'的简历'); ?> &nbsp;&nbsp;&nbsp; 
		<?php 
if($this->Session->read('type') == 2)
	echo $this->Html->link('编辑',array('controller'=>'Resumes','action'=>'edit_resumes')) 
?>
 </h2>
	<dl>
		<dt><?php echo __('头像');?></dt>
		<?php if($resume['Resume']['picture_url']!=null)
		{
			echo $this->Html->image('./'.$resume['Resume']['picture_url'],array('width'=>'200','height'=>'200'));
		}
		?>
		
		<dt><?php echo __('姓名'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('性别'); ?></dt>
		<dd>
			<?php echo h($allSex[$resume['Resume']['sex']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('年龄'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('民族'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['ethnic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('籍贯'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['hometown']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('政治面貌'); ?></dt>
		<dd>
			<?php echo h($allPolitical[$resume['Resume']['political']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('身高'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['height'] . 'cm'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('体重'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['weight'] . 'kg'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('地址'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('手机号码'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['cellphone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('电子邮箱'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('邮政编码'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('QQ'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['qq']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('薪水要求'); ?></dt>
		<dd>
			<?php echo h($allSalary[$resume['Resume']['salary']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('工作类型'); ?></dt>
		<dd>
			<?php echo h($allWorkingType[$resume['Resume']['working_type']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('寻求职位类型'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['post']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('工作地点'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['working_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('工作时间'); ?></dt>
		<dd>
			<?php echo h($allWorkingTime[$resume['Resume']['working_time']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('毕业院校'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['institutions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('毕业时间'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['graduation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('学历'); ?></dt>
		<dd>
			<?php echo h($allEducational[$resume['Resume']['educational']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('专业名称'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['profession']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('外语水平'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['foreign_language']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('教育经历'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['education_experience']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('工作经历'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['working_experience']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('工作业绩'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['working_result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('工作技能'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['professional_technique']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('自我评价'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['self_evaluate']); ?>
			&nbsp;
		</dd>
	</dl>
<?php echo $this->Html->link('返回', $referer); ?>
</div>
