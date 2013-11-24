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
//-->
</script>
<script language="JavaScript" type="text/javascript">

var Functions = [];
Functions['0'] = [];
Functions['1'] = [
{txt:'外科器械', val:'1'},
{txt:'康复护理设备及器具', val:'2'},
{txt:'能量治疗器械', val:'3'},
{txt:'消毒清洁器械', val:'4'},
{txt:'诊断监护仪及试剂医用高分子材料及制品', val:'5'},
{txt:'手术室', val:'6'},
{txt:'诊疗室设备', val:'7'},
{txt:'口腔科设备', val:'8'},
{txt:'植入器械', val:'9'},
{txt:'医用敷料', val:'10'},
{txt:'避孕计生器械', val:'11'},
{txt:'注射穿刺器械', val:'12'},
{txt:'药液输送保存器械', val:'13'},
{txt:'进口医疗器械', val:'14'},
{txt:'一次性医疗用品', val:'15'},
{txt:'其他器械', val:'16'},
{txt:'其他', val:'17'}
];
Functions['2'] = [
{txt:'癌症', val:'1'},
{txt:'补钙', val:'2'},
{txt:'补血', val:'3'},
{txt:'补肾', val:'4'},
{txt:'鼻炎', val:'5'},
{txt:'不孕不育', val:'6'},
{txt:'避孕', val:'7'},
{txt:'便秘', val:'8'},
{txt:'痤疮', val:'9'},
{txt:'肠炎', val:'10'},
{txt:'胆囊炎', val:'11'},
{txt:'冻疮', val:'12'},
{txt:'低血压', val:'13'},
{txt:'儿科', val:'14'},
{txt:'妇科', val:'15'},
{txt:'妇科洗液', val:'16'},
{txt:'肥胖症', val:'17'},
{txt:'防辐射', val:'18'},
{txt:'腹泻', val:'19'},
{txt:'肺炎', val:'20'},
{txt:'肝炎', val:'21'},
{txt:'高血压', val:'22'},
{txt:'感冒', val:'23'},
{txt:'感染', val:'24'},
{txt:'高血脂', val:'25'},
{txt:'更年期', val:'26'},
{txt:'颈椎病', val:'27'},
{txt:'脚气', val:'28'},
{txt:'结石', val:'29'},
{txt:'结膜炎', val:'30'},
{txt:'减肥降脂', val:'31'},
{txt:'抗生素', val:'32'},
{txt:'抗菌', val:'33'},
{txt:'痢疾', val:'34'},
{txt:'疱疹', val:'35'},
{txt:'皮肤病', val:'36'},
{txt:'皮炎', val:'37'},
{txt:'贫血', val:'38'},
{txt:'前列腺', val:'39'},
{txt:'神经衰弱', val:'40'},
{txt:'肾结石', val:'41'},
{txt:'失眠', val:'42'},
{txt:'湿疹', val:'43'},
{txt:'肾炎', val:'44'},
{txt:'调节血糖', val:'45'},
{txt:'糖尿病', val:'46'},
{txt:'痛风', val:'47'},
{txt:'痛经', val:'48'},
{txt:'提高免疫力', val:'49'},
{txt:'胃病', val:'50'},
{txt:'维生素', val:'51'},
{txt:'胃溃疡', val:'52'},
{txt:'心脏病', val:'53'},
{txt:'消炎', val:'54'},
{txt:'哮喘', val:'55'},
{txt:'牙痛', val:'56'},
{txt:'咽炎', val:'57'},
{txt:'阴道炎', val:'58'},
{txt:'腰椎', val:'59'},
{txt:'药妆', val:'60'},
{txt:'止血', val:'61'},
{txt:'止咳', val:'62'},
{txt:'止痛', val:'63'},
{txt:'痔疮', val:'64'},
{txt:'中风', val:'65'},
{txt:'其他', val:'66'}
];
Functions['3'] = [
{txt:'手术包', val:'1'},
{txt:'组织钳', val:'2'},
{txt:'敷料包', val:'3'},
{txt:'手术刀', val:'4'},
{txt:'医用胶布', val:'5'},
{txt:'呼吸机', val:'6'},
{txt:'内窥镜', val:'7'},
{txt:'镇痛泵', val:'8'},
{txt:'医用试管', val:'9'},
{txt:'医用手套', val:'10'},
{txt:'咬骨钳', val:'11'},
{txt:'手术台', val:'12'},
{txt:'取样钳', val:'13'},
{txt:'手术剪', val:'14'},
{txt:'止血钳', val:'15'},
{txt:'产包', val:'16'},
{txt:'换药包', val:'17'},
{txt:'鼻氧管', val:'18'},
{txt:'试剂盒', val:'19'},
{txt:'压舌板', val:'20'},
{txt:'修复体', val:'21'},
{txt:'缝线', val:'22'},
{txt:'成像系统', val:'23'},
{txt:'医用胶带', val:'24'},
{txt:'医用药杯', val:'25'},
{txt:'乳胶手套', val:'26'},
{txt:'氧气面罩', val:'27'},
{txt:'婴儿保育设备', val:'28'},
{txt:'总蛋白试剂盒', val:'29'},
{txt:'淀粉酶试剂盒', val:'30'},
{txt:'白蛋白试剂盒', val:'31'},
{txt:'胆固醇试剂盒', val:'32'},
{txt:'检测试剂盒', val:'33'},
{txt:'诊断试剂盒', val:'34'},
{txt:'手术灯', val:'35'},
{txt:'其他', val:'36'}
];
var Department = [];
Department['0'] = [];
Department['1']=[
{txt:'内科', val:'1'},
{txt:'血液科', val:'2'},
{txt:'呼吸科', val:'3'},
{txt:'心内科', val:'4'},
{txt:'神经科', val:'5'},
{txt:'消化科', val:'6'},
{txt:'内分泌', val:'7'},
{txt:'妇产科', val:'8'},
{txt:'儿科', val:'9'},
{txt:'计生科', val:'10'},
{txt:'康复护理科', val:'11'},
{txt:'注射/输液室', val:'12'},
{txt:'实验/化验室', val:'13'},
{txt:'影像/放射/B超室', val:'14'},
{txt:'外科', val:'15'},
{txt:'口腔科', val:'16'},
{txt:'五官科', val:'17'},
{txt:'皮肤科', val:'18'},
{txt:'肛肠科', val:'19'},
{txt:'心胸科', val:'20'},
{txt:'泌尿科', val:'21'},
{txt:'骨伤科', val:'22'},
{txt:'中医科', val:'23'},
{txt:'麻醉科', val:'24'},
{txt:'美容整形科', val:'25'},
{txt:'消毒/清洁室', val:'26'},
{txt:'手术室/ICU', val:'27'},
{txt:'医院系统', val:'28'},
{txt:'其他', val:'29'}
];
Department['2']=[
{txt:'妇科', val:'1'},
{txt:'儿科', val:'2'},
{txt:'骨科', val:'3'},
{txt:'眼科', val:'4'},
{txt:'口腔科', val:'5'},
{txt:'内分泌', val:'6'},
{txt:'皮肤科', val:'7'},
{txt:'呼吸', val:'8'},
{txt:'消化', val:'9'},
{txt:'五官科', val:'10'},
{txt:'泌尿科', val:'11'},
{txt:'外科心脑血管', val:'12'},
{txt:'其他', val:'13'}
];
Department['3']=[
{txt:'检验耗材', val:'1'},
{txt:'诊断试剂', val:'2'},
{txt:'医用消毒', val:'3'},
{txt:'基础外科用具', val:'4'},
{txt:'注射穿刺', val:'5'},
{txt:'非临床医用耗材', val:'6'},
{txt:'介入耗材', val:'7'},
{txt:'独家专利耗材', val:'8'},
{txt:'配件', val:'9'},
{txt:'其他', val:'10'}
];
var Material=[];
Material['0'] = [];
Material['3']=[
{txt:'创面损伤', val:'1'},
{txt:'功能敷料', val:'2'},
{txt:'生物材料', val:'3'},
{txt:'手术用品', val:'4'},
{txt:'粘贴材料', val:'5'},
{txt:'护创材料', val:'6'},
{txt:'医用纺织品', val:'7'},
{txt:'医用非织造布', val:'8'},
{txt:'敷料机械', val:'9'},
{txt:'其他', val:'10'}

]

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
function setOption(index)
{  
	setSelectOption('department', Department[index], '-全部-');
	setSelectOption('function', Functions[index], '-全部-' );
	if(index==3)
	{	
		show(1);
		setSelectOption('material',Material[index],'-全部-')
	}
	else 
		show(0);


}

</script>

<div class="index">
</div>

<!-- end of scripts -->

<!-- begin of index -->

<div class="proxyInfos index">
	<h2><?php echo __('Proxy Infos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('product_name'); ?></th>
			<th><?php echo $this->Paginator->sort('product_area'); ?></th>
			<th><?php echo $this->Paginator->sort('product_introduce'); ?></th>
	</tr>
	<?php foreach ($proxyInfos as $proxyInfo): ?>
	<tr>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_name']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_area']); ?>&nbsp;</td>
		<td><?php echo h($proxyInfo['ProxyInfo']['product_introduce']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
<?php
echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
));
?>	</p>
	<div class="paging">
<?php
echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
	</div>
</div>


<!-- beginning of actions -->

<div class="actions">
<?php
echo $this->Form->create('filter');

	echo $this->Form->input('product_area', array('id'=>'product_area', 'label'=>'代理地区', 'options'=>$allCountrys));
	echo $this->Form->input('product_type',array('id'=>'product_type', 'label'=>'产品分类','onchange'=>'setOption(this.options[this.selectedIndex].value);','options'=>$allProduct));
if(!$this->request->data)
{
	echo $this->Form->input('function',array('id'=>'function','label'=>'功能分类','options'=>array('全部')));
	echo $this->Form->input('department',array('id'=>'department','label'=>'产品适用分类','options'=>array('全部')));
?>
		<label id="material_label">卫生材料分类</label>
<?php
	echo $this->Form->input('material',array('id'=>'material','label'=>false,'options'=>array('全部')));		
}
else
{
	echo $this->Form->input('function',array('id'=>'function','label'=>'功能分类','options'=>$allFunction));
	echo $this->Form->input('department',array('id'=>'department','label'=>'产品适用分类','options'=>$allDepartment));
?>
		<label id="material_label">卫生材料分类</label>
<?php
	echo $this->Form->input('material',array('id'=>'material','label'=>false,'options'=>$allMaterial));

}
echo $this->Form->end('筛选');

?>
</div>
