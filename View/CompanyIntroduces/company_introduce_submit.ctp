<div id="anotherPageBox">
<?php echo $this->Form->create('CompanyIntroduce',array('type'=>'file')); ?>
<fieldset>
	<div class="inputLine">
		<ul>
			<li id="inputField_li">
				<div id="inputField">
				<?php echo $this->Form->hidden('id');
				if($this->request->data!=null&&$this->request->data['CompanyIntroduce']['picture_url']!=null)
				{
					 echo $this->Html->image('./'.$this->request->data['CompanyIntroduce']['picture_url'],array('width'=>'300','height'=>'300'));
				}?>
			</div>
			</li>
		</ul>
	</div>
<div class="inputLine">
		<ul>
			<li id="inputField_li">
				<div id="inputField">
				<?php echo $this->Form->input('company_image',array('type'=>'file','label'=>'上传公司主页图片'));?>
				</div>
			</li>
		</ul>
	</div>
<div class="inputLine">
		<ul>
			<li id="inputTest_li"><p>公司经济类型</p></li>
			<li id="inputField_li">
				<div id="inputField">
				<?php echo $this->Form->input('economic_nature',array('options'=>$nature,'label'=>''));?>
				</div>
			</li>
		</ul>
	</div>
<div class="inputLine">
		<ul>
			<li id="inputTest_li"><p>公司经营模式</p></li>
			<li id="inputField_li">
				<div id="inputField">
				<?php echo $this->Form->input('business_type',array('label'=>''));?>
				</div>
			</li>
		</ul>
	</div>
<div class="inputLine">
		<ul>
			<li id="inputTest_li"><p>法人代表</p></li>
			<li id="inputField_li">
				<div id="inputField">
				<?php echo $this->Form->input('legal_representative',array('label'=>''));?>
				</div>
			</li>
		</ul>
	</div>
<div class="inputLine">
		<ul>
			<li id="inputTest_li"><p>公司经营范围</p></li>
			<li id="inputField_li">
				<div id="inputField">
				<?php echo $this->Form->input('business_scope',array('label'=>''));?>
				</div>
			</li>
		</ul>
	</div>
<div class="inputLine">
		<ul>
			<li id="inputTest_li"><p>注册资金</p></li>
			<li id="inputField_li">
				<div id="inputField">
				<?php echo $this->Form->input('registered_capital',array('label'=>''));?>
				</div>
			</li>
		</ul>
	</div>
<div class="inputLine">
		<ul>
			<li id="inputTest_li"><p>公司员工人数</p></li>
			<li id="inputField_li">
				<div id="inputField">
				<?php echo $this->Form->input('employees_number',array('options'=>$number,'label'=>''));?>
				</div>
			</li>
		</ul>
	</div>
<div class="inputLine">
		<ul>
			<li id="inputTest_li"><p>公司介绍</p></li>
			<li id="inputField_li">
				<div id="inputField">
				<?php echo $this->Form->input('introduce',array('label'=>'','rows'=>1));?>
				</div>
			</li>
		</ul>
	</div>
	<?php echo $this->Form->end(__('提交')); ?>
</fieldset>
</div>
