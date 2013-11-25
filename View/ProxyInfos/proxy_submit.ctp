<?php echo $this->Html->script('allSelections'); ?>
<?php echo $this->Html->script('proxySelection'); ?>
<!-- end of script -->

<div class="proxyInfos form">
<?php echo $this->Form->create('ProxyInfo',array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('公司代理产品提交'); ?></legend>
	<?php
		
	  if($this->request->data!=null&&$this->request->data['ProxyInfo']['picture_url']!=null)
			echo $this->Html->image('./proxy_image/'.$this->request->data['ProxyInfo']['picture_url'],array('whidth'=>'300','height'=>'300'));
		echo $this->Form->input('picture_url',array('type'=>'file','label'=>'代理产品图片'));
		echo $this->Form->input('product_name',array('label'=>'产品名称'));
		echo $this->Form->input('product_code',array('label'=>'产品注册号'));
		echo $this->Form->input('product_area',array('label'=>'代理地区','options'=>$allCountrys));
		echo $this->Form->input('product_unit',array('label'=>'产品单位'));
		echo $this->Form->input('phone',array('label'=>'联系方式'));
		echo $this->Form->input('qq',array('label'=>'qq'));
		echo $this->Form->input('deadline',array('label'=>'截至时间','type'=>'date'));	
		echo $this->Form->input('product_type',array('id'=>'product_type', 'label'=>'产品分类','onchange'=>'setOption(this.options[this.selectedIndex].value, "请选择");','options'=>$allProduct));
		if($this->request->data!=null)
		{
		echo $this->Form->hidden('id');
		echo $this->Form->input('function',array('id'=>'function','label'=>'功能分类','options'=>$allFunction));
		echo $this->Form->input('department',array('id'=>'department','label'=>'产品适用分类','options'=>$allDepartment));
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
				<label for="material" id="material_label" style="display:none">卫生材料分类</label>
<?php
				echo $this->Form->input('material', array('id'=>'material','label'=>false, 'style'=>'display:none','options'=>$allMaterial));
			}
		}
		else
		{
		echo $this->Form->input('function',array('id'=>'function','label'=>'功能分类','options'=>array('请选择')));
		echo $this->Form->input('department',array('id'=>'department','label'=>'产品适用分类','options'=>array('请选择')));
?>
		<label id="material_label">卫生材料分类</label>
<?php
		echo $this->Form->input('material', array('id'=>'material', 'label'=>false,'options'=>array('请选择')));
		}  
		?>
<?php
		echo $this->Form->input('product_claim',array('label'=>'对代理商的要求'));
		echo $this->Form->input('product_support',array('label'=>'对代理商的支持'));
		echo $this->Form->input('product_introduce',array('label'=>'产品介绍','rows'=>'5'));
	?>
	</fieldset>
		<?php echo $this->Form->end(__('提交')); ?>
</div>




