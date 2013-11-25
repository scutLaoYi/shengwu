<!-- 导入外部的选项内容 -->
<?php echo $this->Html->script('allSelections'); ?>
<?php echo $this->Html->script('proxySelection'); ?>
<script>
<!--
//搜索函数，根据条件发送ajax请求并更新结果到div中
function search()
{
	area = document.getElementById("product_area");
	type = document.getElementById("product_type");
	func = document.getElementById("function");
	depart = document.getElementById("department");
	material = document.getElementById("material");

	ajaxUrl ='<?php echo Router::url(array(
				'controller'=>'ProxyInfos',
				'action'=>'proxy_list')); ?>/'+
				area.selectedIndex+'/';

	ajaxUrl = ajaxUrl.concat(type.selectedIndex, '/', 
		func.selectedIndex,'/', 
		depart.selectedIndex, '/', 
		material.selectedIndex);

	document.getElementById("debugDiv").innerHTML = ajaxUrl;
	$.ajax({
		dataType:"HTML",
			cache:false,
			type:"GET",
			url:ajaxUrl,
			evalScripts:true,
			data: ({type:'original'}),
			success:function(data, textStatus){
					$("#index").html(data);
				}
	});
}

function setAndSearch(option)
{
setOption(option, "全部")
	search();
}
-->

</script>
<!-- end of scripts -->

<!-- actions for filter -->
<!-- beginning of actions -->
<div class="actions">
<?php
echo $this->Form->input('product_area', array('id'=>'product_area', 'label'=>'代理地区', 'options'=>$allCountrys,'onchange'=>'search()'));
echo $this->Form->input('product_type',array('id'=>'product_type', 'label'=>'产品分类','onchange'=>'setAndSearch(this.selectedIndex);','options'=>$allProduct));
	echo $this->Form->input('function',array('id'=>'function','label'=>'功能分类','onchange'=>'search()','options'=>array('-全部-')));
	echo $this->Form->input('department',array('id'=>'department','label'=>'产品适用分类','onchange'=>'search()','options'=>array('-全部-')));
?>
		<label id="material_label">卫生材料分类</label>
<?php
	echo $this->Form->input('material',array('id'=>'material','label'=>false,'onchange'=>'search()','options'=>array('-全部-')));		
?>
</div>

<!-- data of ajax -->
<div class="index" id="index">
</div>
<div id="debugDiv">
</div>
