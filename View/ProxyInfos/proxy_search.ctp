<!-- 导入外部的选项内容 -->
<?php echo $this->Html->script('allSelections'); ?>
<?php echo $this->Html->script('proxySelection'); ?>
<script>
<!--
//搜索函数，根据条件发送ajax请求并更新结果到div中
function search()
{
	var area = document.getElementById("product_area");
	var type = document.getElementById("product_type");
	var func = document.getElementById("function");
	var depart = document.getElementById("department");
	var material = document.getElementById("material");

	var ajaxUrl ='<?php echo Router::url(array(
				'controller'=>'ProxyInfos',
				'action'=>'proxy_list')); ?>/'+
				area.selectedIndex+'/';

	ajaxUrl = ajaxUrl.concat(type.selectedIndex, '/', 
		func.selectedIndex,'/', 
		depart.selectedIndex, '/', 
		material.selectedIndex);

	//document.getElementById("debugDiv").innerHTML = ajaxUrl;
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
	echo $this->Form->input('department',array('id'=>'department','label'=>'产品适用分类','onchange'=>'search()','options'=>array('-全部-')));
	echo $this->Form->input('function',array('id'=>'function','label'=>'功能分类','onchange'=>'search()','options'=>array('-全部-')));
?>
		<label id="material_label">卫生材料分类</label>
<?php
	echo $this->Form->input('material',array('id'=>'material','label'=>false,'onchange'=>'search()','options'=>array('-全部-')));		
?>
</div>

<!-- data of ajax -->
<div class="index" id="index">
<?php
	//这里调用element避免重复编写界面显示内容.
	//初次调用该页面时控制器proxy_search直接搜索并显示结果，
	//在页面中通过ajax调用proxy_list搜索并更新结果
echo $this->element('proxy_list', array('proxyInfos'=>$result));

?>
</div>
<div id="debugDiv">
</div>
