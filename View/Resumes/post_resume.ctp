<div id="bigBox">
	<?php ?>
	<div id="action_box">
		<div id="leftBox">
		<div id="resume_submit_title"></div>
	</div>
	<div id="moving_ad"></div>
	</div>
<div id="rightBox">
		<div id="jlxx_submit"></div>
		<div id="c_register_box">
		<?php echo $this->Form->create('Resume',array('type'=>'file')); ?>
		<ul id="list_box">
			<li id="company_img">
			<?php
			if($this->request->data!=null&&$this->request->data['Resume']['picture_url']!=null)
			{
				echo $this->Html->image('./'.$this->request->data['Resume']['picture_url'],array('width'=>'200','height'=>'200'));
			}?>
			</li>
			<li id="list_test_li"></li>
			<li id="list_input_li">
			<?php echo $this->Form->hidden('id');?>
			</li>
			<li id="list_test_li">头像</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('picture_url',array('type'=>'file','label'=>''));?>
			</li>
			<li id="list_test_li">姓名</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('name',array('label'=>''));?>
			</li>
			<li id="list_test_li">性别</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('sex',array('label'=>'','options'=>$allSex));?>
			</li>
			<li id="list_test_li">年龄</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('age',array('label'=>''));?>
			</li>
			<li id="list_test_li">民族</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('ethnic',array('label'=>''));?>
			</li>
			<li id="list_test_li">籍贯</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('hometown',array('label'=>''));?>
			</li>
			<li id="list_test_li">政治面貌</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('political',array('label'=>'','options'=>$allPolitical));?>
			</li>
			<li id="list_test_li">身高:cm</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('height',array('label'=>''));?>
			</li>
			<li id="list_test_li">体重:kg</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('weight',array('label'=>''));?>
			</li>
			<li id="list_test_li">地址</li>
			<li id="list_input_li">

			<?php echo $this->Form->input('address',array('label'=>''));?>
			</li>
			<li id="list_test_li">手机号码</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('cellphone',array('label'=>''));?>
			</li>
			<li id="list_test_li">电子邮箱</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('email',array('label'=>''));?>
			</li>
			<li id="list_test_li">邮政编码</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('code',array('label'=>''));?>
			</li>
			<li id="list_test_li">QQ</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('qq',array('label'=>''));?>
			</li>
			<li id="list_test_li">薪水要求</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('salary',array('label'=>'','options'=>$allSalary));?>
			</li>
			<li id="list_test_li">工作类型</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('working_type',array('label'=>'','options'=>$allWorkingType));?>
			</li>
			<li id="list_test_li">寻求职位类型</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('post',array('label'=>''));?>
			</li>
			<li id="list_test_li">工作地点</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('working_area',array('label'=>''));?>
			</li>
			<li id="list_test_li">工作时间</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('working_time',array('label'=>'','options'=>$allWorkingTime));?>
			</li>
			<li id="list_test_li">毕业院校</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('institutions',array('label'=>''));?>
			</li>
			<li id="list_test_li">毕业时间</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('graduation',array('label'=>''));?>
			</li>
			<li id="list_test_li">学历</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('educational',array('label'=>'','options'=>$allEducational));?>
			</li>
			<li id="list_test_li">专业名称</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('profession',array('label'=>''));?>
			</li>
			<li id="list_test_li">外语水平</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('foreign_language',array('label'=>''));?>
			</li>
			<li id="list_test_li">教育经历</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('education_experience',array('label'=>'','rows'=>'3'));?>
			</li>
			<li id="list_test_li">工作经历</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('working_experience',array('label'=>'','rows'=>'3'));?>
			</li>
			<li id="list_test_li">工作业绩</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('working_result',array('label'=>'','rows'=>'3'));?>
			</li>
			<li id="list_test_li">工作技能</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('professional_technique',array('label'=>'','rows'=>'3'));?>
			</li>
			<li id="list_test_li">自我评价</li>
			<li id="list_input_li">
			<?php echo $this->Form->input('self_evaluate',array('label'=>'','rows'=>'3'));?>
			</li>
			<li id="list_input_button">
			<?php echo $this->Form->end(__('提交')); ?>
			</li>
		</ul>
	</div>
</div>
</div>
