<!-- 导入外部的选项内容 -->

<?php echo $this->Html->script('allSelections'); ?>
<?php echo $this->Html->script('proxySelection'); ?>
<script charset="utf-8">
<!--
function encoding(str)
{
	return encodeURI(str);
}
//搜索函数，根据条件发送ajax请求并更新结果到div中
function searching()
{
	var area = document.getElementById("product_area");
	var type = document.getElementById("product_type");
	var func = document.getElementById("function");
	var depart = document.getElementById("department");
	var material = document.getElementById("material");
	var str = document.getElementById("str");

	var ajaxUrl ='<?php echo Router::url(array(
				'controller'=>'ProxyInfos',
				'action'=>'proxy_list')); ?>/'+
				area.selectedIndex+'/';

	ajaxUrl = ajaxUrl.concat(type.selectedIndex, '/', 
		func.selectedIndex,'/', 
		depart.selectedIndex, '/', 
		material.selectedIndex, '/',
		encoding(str.value));

	//document.getElementById("debugDiv").innerHTML = ajaxUrl;
	$.ajax({
		dataType:"HTML",
			cache:false,
			type:"GET",
			url:ajaxUrl,
			evalScripts:true,
			data: ({type:'original'}),
			success:function(data, textStatus){
					$("#rightBox").html(data);
				}
});
}

function setAndSearch(option)
{
	setOption(option, "全部", false);
	searching();
}

-->
</script>
<!-- end of scripts -->

<!-- actions for filter -->
<!-- beginning of actions -->
<div id="bigBox">
<div id="action_box">
	<div id="leftBox">
	<div id="proxy_title"></div>
<div class="py_ajax">
<?php
?>
<ul>
	<li>
	<?php
	echo $this->Form->input('product_area', array('id'=>'product_area', 'label'=>'代理地区', 'options'=>$allCountrys,'onchange'=>'searching();'));
	?>
	</li>
</ul>
<ul>
	<li>
	<?php
echo $this->Form->input('product_type',array('id'=>'product_type', 'label'=>'产品分类','onchange'=>'setAndSearch(this.selectedIndex);','options'=>$allProduct));?>
	</li>
</ul>
<ul>
	<li>
	<?php
	echo $this->Form->input('department',array('id'=>'department','label'=>'产品适用','onchange'=>'searching();','options'=>array('-全部-')));?>
	</li>
</ul>
<ul>
	<li>
	<?php
	echo $this->Form->input('function',array('id'=>'function','label'=>'功能分类','onchange'=>'searching();','options'=>array('-全部-')));?>
	</li>
</ul>
<ul>
	<li>
	<!--<label id="material_label">材料分类</label> -->
	<?php
	echo $this->Form->input('material',array('id'=>'material','label'=>"材料分类",'onchange'=>'searching();','options'=>array('全部')));		?>
	</li>
</ul>
<ul>
	<li>
	<?php
	echo $this->Form->input('str', array('id'=>'str','label'=>false));?>
	</li>
</ul>
<ul>
	<li>
	<?php
	//	echo $this->Form->end('搜索', array('onclick'=>'searching();'));
	?>
		<input type="submit" value=" " onclick="searching()" />
	</li>
</ul>
</div>
</div>
<div id="moving_ad"></div>
</div>

<!-- data of ajax -->
<div id="rightBox">
</div>
<script>

window.onload = setAndSearch(document.getElementById("product_type").selectedIndex);
</script>
</div>


