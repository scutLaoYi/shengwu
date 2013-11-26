<div class="Resumes form">

<?php echo $this->Form->create('Resume'); ?>

<fieldset>
	<legend><?php echo __('填写简历'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label'=>'姓名'));
		echo $this->Form->input('sex',array('label'=>'性别','options'=>$allSex));
		echo $this->Form->input('age',array('label'=>'年龄'));
		echo $this->Form->input('ethnic',array('label'=>'民族'));
		echo $this->Form->input('hometown',array('label'=>'籍贯'));
		echo $this->Form->input('political',array('label'=>'政治面貌','options'=>$allPolitical));
		echo $this->Form->input('height',array('label'=>'身高:cm'));
		echo $this->Form->input('weight',array('label'=>'体重:kg'));
		echo $this->Form->input('picture_url');
		echo $this->Form->input('address',array('label'=>'地址'));
		echo $this->Form->input('cellphone',array('label'=>'手机号码'));
		echo $this->Form->input('email',array('label'=>'电子邮箱'));
		echo $this->Form->input('code',array('label'=>'邮政编码'));
		echo $this->Form->input('qq',array('label'=>'QQ'));
		echo $this->Form->input('salary',array('label'=>'薪水要求','options'=>$allSalary));
		echo $this->Form->input('working_type',array('label'=>'工作类型','options'=>$allWorkingType));
		echo $this->Form->input('post',array('label'=>'寻求职位类型'));
		echo $this->Form->input('working_area',array('label'=>'工作地点'));
		echo $this->Form->input('working_time',array('label'=>'工作时间','options'=>$allWorkingTime));
		echo $this->Form->input('institutions',array('label'=>'毕业院校'));
		echo $this->Form->input('graduation',array('label'=>'毕业时间'));
		echo $this->Form->input('educational',array('label'=>'学历','options'=>$allEducational));
		echo $this->Form->input('profession',array('label'=>'专业名称'));
		echo $this->Form->input('foreign_language',array('label'=>'外语水平'));
		echo $this->Form->input('education_experience',array('label'=>'教育经历','rows'=>'3'));
		echo $this->Form->input('working_experience',array('label'=>'工作经历','rows'=>'3'));
		echo $this->Form->input('working_result',array('label'=>'工作业绩','rows'=>'3'));
		echo $this->Form->input('professional_technique',array('label'=>'工作技能','rows'=>'3'));
		echo $this->Form->input('self_evaluate',array('label'=>'自我评价','rows'=>'3'));
	?>
</fieldset>

<?php echo $this->Form->end(__('发布简历')); ?>

</div>
