<div id="anotherPageBox">

<?php echo $this->Form->create('Recruitment'); ?>
<fieldset>
	<legend><?php echo __('招聘提交表单'); ?></legend>
<?php 
echo $this->Form->input('job_title',array('label'=>'工作名称'));
echo $this->Form->input('number',array('label'=>'招聘人数'));
echo $this->Form->input('sex',array('label'=>'性别要求','options'=>$allSexs));
echo $this->Form->input('age',array('label'=>'年龄要求'));
echo $this->Form->input('educational',array('label'=>'教育程度','options'=>$allEducational));
echo $this->Form->input('working_type',array('label'=>'工作类型','options'=>$allWorkingType));
echo $this->Form->input('working_time',array('label'=>'工作经验'));
echo $this->Form->input('working_area',array('label'=>'工作地区','options'=>$allProvince));
echo $this->Form->input('account_required',array('label'=>'户口要求'));
echo $this->Form->input('language_acquired',array('label'=>'外语要求'));
echo $this->Form->input('salary',array('label'=>'职位月薪'));
echo $this->Form->input('deadline',array('label'=>'到期时间','type'=>'date','monthNames'=>$allMonth));
echo $this->Form->input('email',array('label'=>'联系邮箱'));
echo $this->Form->input('phone',array('label'=>'联系电话'));
echo $this->Form->input('detail',array('label'=>'具体要求','rows'=>'5'));
?>
</fieldset>

<?php echo $this->Form->end(__('提交')); ?>
</div>
