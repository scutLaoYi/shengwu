<div id="bigBox">
	<?php ?>
	<div id="action_box">
		<div id="leftBox">
			<?php ?>
			<div id="recuritment_submit_title"></div>
		</div>
		<div id="moving_ad"></div>
	</div>
	<div id="rightBox">
	<div id="c_register_box">
	<?php echo $this->Form->create('Recruitment'); ?>
	<div id="zpxx_submit"></div>
	<ul id="list_box">
			<li id="list_test_li">工作名称</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('job_title',array('label'=>''));?>
			</li>
			<li id="list_test_li">招聘人数</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('number',array('label'=>''));?>
			</li>
			<li id="list_test_li">性别要求</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('sex',array('label'=>'','options'=>$allSexs));?>
			</li>
			<li id="list_test_li">年龄要求</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('age',array('label'=>''));?>
			</li>
			<li id="list_test_li">教育程度</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('educational',array('label'=>'','options'=>$allEducational));?>
			</li>
			<li id="list_test_li">工作类型</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('working_type',array('label'=>'','options'=>$allWorkingType));?>
			</li>
			<li id="list_test_li">工作经验</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('working_time',array('label'=>''));?>
			</li>
			<li id="list_test_li">工作地区</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('working_area',array('label'=>'','options'=>$allProvince));?>
			</li>
			<li id="list_test_li">户口要求</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('account_required',array('label'=>''));?>
			</li>
			<li id="list_test_li">外语要求</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('language_acquired',array('label'=>''));?>
			</li>
			<li id="list_test_li">职位月薪</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('salary',array('label'=>''));?>
			</li>
			<li id="list_test_li">到期时间</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('deadline',array('label'=>'','type'=>'date','monthNames'=>$allMonth));?>
			</li>
			<li id="list_test_li">联系邮箱</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('email',array('label'=>''));?>
			</li>
			<li id="list_test_li">联系电话</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('phone',array('label'=>''));?>
			</li>
			<li id="list_test_li">具体要求</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('detail',array('label'=>'','rows'=>'5'));?>
			</li>
			<li id="list_input_button">
		<?php echo $this->Form->end(__('提交')); ?>
			</li>
		</ul>
	</div>
	</div>
</div>
