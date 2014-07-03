<div id="bigBox">
	<?php ?>
	<div id="action_box">
		<div id="leftBox">
		<div id="company_submit_title"></div>
	</div>
	<div id="moving_ad"></div>
	</div>
	<div id="rightBox">
		<div id="gsxx_submit"></div>
		<div id="c_register_box">
		<?php echo $this->Form->create('CompanyIntroduce',array('type'=>'file')); ?>
		<ul id="list_box">
			<li id="company_img">
				<?php echo $this->Form->hidden('id');
				if($this->request->data!=null&&$this->request->data['CompanyIntroduce']['picture_url']!=null)
				{
					 echo $this->Html->image('./'.$this->request->data['CompanyIntroduce']['picture_url'],array('width'=>'700','height'=>'200'));
				}?>
			</li>
			<li id="list_test_li">上传公司主页图片</li>
			<li id="list_input_li">
				<?php echo $this->Form->input('company_image',array('type'=>'file','label'=>''));?>
			</li>
			<li id="list_test_li">公司经济类型</li>
			<li id="list_input_li">
				<?php echo $this->Form->input('economic_nature',array('options'=>$nature,'label'=>''));?>
			</li>
			<li id="list_test_li">公司经营模式</li>
			<li id="list_input_li">
				<?php echo $this->Form->input('business_type',array('label'=>''));?>
			</li>
			<li id="list_test_li">法人代表</li>
			<li id="list_input_li">
				<?php echo $this->Form->input('legal_representative',array('label'=>''));?>
			</li>
			<li id="list_test_li">公司经营范围</li>
			<li id="list_input_li">
				<?php echo $this->Form->input('business_scope',array('label'=>''));?>
			</li>
			<li id="list_test_li">注册资金</li>
			<li id="list_input_li">
				<?php echo $this->Form->input('registered_capital',array('label'=>''));?>
			</li>
			<li id="list_test_li">公司员工人数</li>
			<li id="list_input_li">
				<?php echo $this->Form->input('employees_number',array('options'=>$number,'label'=>''));?>
			</li>
			<li id="list_test_li">公司介绍</li>
			<li id="list_input_li">
				<?php echo $this->Form->input('introduce',array('label'=>'','rows'=>1));?>
			</li>
			<li id="list_input_button">
				<?php echo $this->Form->end(__('提交')); ?>
			</li>
		</ul>
	</div>
</div>
</div>
