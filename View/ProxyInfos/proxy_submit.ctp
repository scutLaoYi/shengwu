<?php echo $this->Html->script('allSelections'); ?>
<?php echo $this->Html->script('proxySelection'); ?>
<!-- end of script -->

<div id="bigBox">
	<div id="action_box">
		<div id="leftBox">
		<?php ?>
			<div id="proxy_submit_title"></div>
		</div>
		<div id="moving_ad"></div>
	</div>
	<div id="rightBox">
	<div id="c_register_box">
	<?php echo $this->Form->create('ProxyInfo',array('type'=>'file')); ?>
	<div id="dlxx_submit"></div>
	<ul id="list_box">
		<li id="company_img">
			<?php	
		    if($this->request->data!=null&&$this->request->data['ProxyInfo']['picture_url']!=null)
			{
				echo $this->Html->image('./'.$this->request->data['ProxyInfo']['picture_url'],array('whidth'=>'300','height'=>'300'));
			}?>
		</li>
			<li id="list_test_li">代理产品图片</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('picture_url',array('type'=>'file','label'=>''));?>
		</li>
			<li id="list_test_li">产品名称</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('product_name',array('label'=>''));?>
			</li>
			<li id="list_test_li">产品注册号</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('product_code',array('label'=>''));?>
			</li>
			<li id="list_test_li">代理地区</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('product_area',array('label'=>'','options'=>$allCountrys));?>
			</li>
			<li id="list_test_li">产品单位</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('product_unit',array('label'=>''));?>
			</li>
			<li id="list_test_li">联系方式</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('phone',array('label'=>''));?>
			</li>
			<li id="list_test_li">qq</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('qq',array('label'=>''));?>
			</li>
			<li id="list_test_li">截至时间</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('deadline',array('label'=>'','type'=>'date','monthNames'=>$allMonth));?>
			</li>
		<?php echo $this->Form->input('product_type',array('id'=>'product_type', 'label'=>'产品分类','onchange'=>'setOption(this.options[this.selectedIndex].value, "请选择", true);','options'=>$allProduct));
		if($this->request->data!=null)
		{
		echo $this->Form->hidden('id');
		echo $this->Form->input('department',array('id'=>'department','label'=>'产品适用分类','options'=>$allDepartment));
		echo $this->Form->input('function',array('id'=>'function','label'=>'功能分类','options'=>$allFunction));
			if($this->request->data['ProxyInfo']['product_type'] == '3')
			{
?>
				<label id="material_label">卫生材料分类</label>
<?php
				echo $this->Form->input('material', array('id'=>'material', 'label'=>false,'options'=>$allMaterial));
			}
			else
			{
?>
				<label for ="material" id="material_label" style="display:none">卫生材料分类</label>
<?php
				echo $this ->Form->input('material', array('id'=>'material','label'=>false, 'style'=>'display:none','options'=>$allMaterial));
			}
		}
		else
		{
		echo $this->Form->input('department',array('id'=>'department','label'=>'产品适用分类','options'=>array('请选择')));
		echo $this->Form->input('function',array('id'=>'function','label'=>'功能分类','options'=>array('请选择')));
?>
		<label id="material_label">卫生材料分类</label>
<?php
		echo $this->Form->input('material', array('id'=>'material', 'label'=>false,'options'=>array('请选择')));
		}  
		?>
			<li id="list_test_li">对代理商的要求</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('product_claim',array('label'=>''));?>
			</li>
			<li id="list_test_li">对代理商的支持</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('product_support',array('label'=>''));?>
			</li>
			<li id="list_test_li">产品介绍</li>
			<li id="list_input_li">
		<?php echo $this->Form->input('product_introduce',array('label'=>'','rows'=>'5'));?>
			</li>
			<li id="list_input_button">
		<?php echo $this->Form->end(__('提交')); ?>
			</li>
		</ul>
	</div>
</div>
</div>




