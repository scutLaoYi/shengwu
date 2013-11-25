<!-- 导入外部的选项内容 -->
<?php echo $this->Html->script('allSelections'); ?>
<script language="JavaScript" type="text/javascript">
<!--

/*
 * 说明：将指定下拉列表的选项值清空
 * 作者：CodeBit.cn ( http://www.CodeBit.cn )
 *
 * @param {String || Object]} selectObj 目标下拉选框的名称或对象，必须
 */
function removeOptions(selectObj)
{
	if (typeof selectObj != 'object')
	{
		selectObj = document.getElementById(selectObj);
	}

	// 原有选项计数
	var len = selectObj.options.length;

	for (var i=0; i < len; i++)
	{
		// 移除当前选项
		selectObj.options[0] = null;
	}
}

/*
 * 说明：设置传入的选项值到指定的下拉列表中
 * 作者：CodeBit.cn ( http://www.CodeBit.cn )
 *
 * @param {String || Object]} selectObj 目标下拉选框的名称或对象，必须
 * @param {Array} optionList 选项值设置 格式：[{txt:'北京', val:'010'}, {txt:'上海', val:'020'}] ，必须
 * @param {String} firstOption 第一个选项值，如：“请选择”，可选，值为空
 * @param {String} selected 默认选中值，可选
 */
function setSelectOption(selectObj, optionList, firstOption, selected)
{
	if (typeof selectObj != 'object')
	{
		selectObj = document.getElementById(selectObj);
	}

	// 清空选项
	removeOptions(selectObj);

	// 选项计数
	var start = 0;

	// 如果需要添加第一个选项
	if (firstOption)
	{
		selectObj.options[0] = new Option(firstOption, '');

		// 选项计数从 1 开始
		start ++;
	}

	var len = optionList.length;

	for (var i=0; i < len; i++)
	{
		// 设置 option
		selectObj.options[start] = new Option(optionList[i].txt, optionList[i].val);

		// 选中项
		if(selected == optionList[i].val)
		{
			selectObj.options[start].selected = true;
		}

		// 计数加 1
		start ++;
	}

}

//显示或隐藏三级选择框及其文本(只有医疗耗材存在卫生材料选择)
function show(is)
{
	if(is)
	{
		document.getElementById('material').style.display='block';
		document.getElementById('material_label').style.display='block';
	}
	else
	{
		document.getElementById('material').style.display='none';
		document.getElementById('material_label').style.display='none';
	}
}

//更新选项内容的函数,每次产品分类选择框选项变化通过该函数自动处理其他选择框的内容
//为便于复用，在此加入第二个参数设定首个选项的内容
function setOption(index, firstOption)
{  

	setSelectOption('department', Department[index], firstOption);
	setSelectOption('function', Functions[index], firstOption);
	if(index==3)
	{	
		show(1);
		setSelectOption('material',Material[index],firstOption);
	}
	else 
		show(0);

}

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
		type.selectedIndex, '/', 
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


//-->
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
	echo $this->Form->input('material',array('id'=>'material','label'=>false,'options'=>array('-全部-')));		
?>
</div>

<!-- data of ajax -->
<div class="index" id="index">
</div>
