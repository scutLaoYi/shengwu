<?php

App::uses('Component', 'Controller');
class ListComponent extends Component {
	//所有省份
    public function allProvince() {
	//waiting for change.
        return array('安徽省','澳门特别行政区','北京市','重庆市','福建省', '甘肃省','广东省','广西壮族自治区',
			'贵州省','海南省','河北省', '河南省' ,'黑龙江省','湖北省','湖南省','吉林省','江苏省','江西省', 
 			'辽宁省','内蒙古','宁夏回族自治区','青海省','山东省','山西省','陕西省', '上海市','四川省',
			 '台湾省','天津市','西藏自治区','香港特别行政区','新疆维吾尔', '云南省', '浙江省'
			 
			);
	}
	//所有省份包括全国
    public function allCountry() {
	
        return array('全国','安徽省','澳门特别行政区','北京市','重庆市','福建省', '甘肃省','广东省','广西壮族自治区',
			'贵州省','海南省','河北省', '河南省' ,'黑龙江省','湖北省','湖南省','吉林省','江苏省','江西省', 
 			'辽宁省','内蒙古','宁夏回族自治区','青海省','山东省','山西省','陕西省', '上海市','四川省',
			 '台湾省','天津市','西藏自治区','香港特别行政区','新疆维吾尔', '云南省', '浙江省');
	}
	//公司经济性质
	public function companyEconomicNature()
	{
		return array('国有经济','集体经济','私营经济','个体经济','联营经济','股份制经济','外商投资','港澳台投资','其他经济');
	}
	//公司人数
	public function companyNumber()
	{
		return array('50人以下','50-100人','100-500人','500-1000人','1000-5000人','5000人以上');
	}
	public function allSex() {
		return array('男','女');
	}

	public function allSexs() {
		return array('男','女','不限');
	}
	public function allPolitical() {
		return array('团员','党员','群众','民主党派');
	}

	public function allSalary() {
		return array('面议','1000~2000','2000~3000','3000~4000','4000~5000','5000~6000','6000~7000','7000~8000','8000~9000','9000~10000','10000以上');
	}

	public function allWorkingType() {
		return array('兼职','全职','实习','临时');
	}

	public function allWorkingTime() {
		return array('无','半年','一年','二年','三年','三年以上');
	}

	public function allEducational() {
		return array('小学','初中','高中','专科','本科','研究生','博士');
	}
	//代理产品分类
	public function allProduct()
	{
		return array('请选择','医疗器械','医药产品','医疗耗材');
	}
	//功能分类
	public function allFunction($type)
	{
		if($type==1)
		return array('请选择','外科器械', '康复护理设备及器具', '能量治疗器械', '消毒清洁器械', '诊断监护仪','试剂医用高分子材料及制品', '手术室', '诊疗室设备', '口腔科设备', '植入器械', '医用敷料', '避孕计生器械', '注射穿刺器械', '药液输送保存器械', '进口医疗器械', '一次性医疗用品', '其他器械');
		else if($type==2)
		return array('请选择','癌症',  '补钙',  '补血',  '补肾',  '鼻炎',  '不孕不育',  '避孕',  '便秘',  '痤疮',  '肠炎',  '胆囊炎',  '冻疮',  '低血压',  '儿科',  '妇科',  '妇科洗液',  '肥胖症',  '防辐射',  '腹泻',  '肺炎',  '肝炎',  '高血压',  '感冒',  '感染',  '高血脂',  '更年期',  '颈椎病',  '脚气',  '结石',  '结膜炎',  '减肥降脂',  '抗生素',  '抗菌',  '痢疾',  '疱疹',  '皮肤病',  '皮炎',  '贫血',  '前列腺',  '神经衰弱',  '肾结石',  '失眠',  '湿疹',  '肾炎',  '调节血糖',  '糖尿病',  '痛风',  '痛经',  '提高免疫力',  '胃病',  '维生素',  '胃溃疡',  '心脏病',  '消炎',  '哮喘',  '牙痛',  '咽炎',  '阴道炎',  '腰椎',  '药妆',  '止血',  '止咳',  '止痛',  '痔疮',  '中风' ,'其他');
		else if($type==3)
		return array('请选择','手术包',  '组织钳',  '敷料包',  '手术刀',  '医用胶布',  '呼吸机',  '内窥镜',  '镇痛泵',  '医用试管',  '医用手套',  '咬骨钳',  '手术台',  '取样钳',  '手术剪',  '止血钳',  '产包',  '换药包',  '鼻氧管',  '试剂盒',  '压舌板',  '修复体',  '缝线',  '成像系统',  '医用胶带',  '医用药杯',  '乳胶手套',  '氧气面罩',  '婴儿保育设备',  '总蛋白试剂盒',  '淀粉酶试剂盒',  '白蛋白试剂盒',  '胆固醇试剂盒',  '检测试剂盒',  '诊断试剂盒',  '手术灯','其他');
	}
	//产品适用分类
	public function allDepartment($type)
	{
		if($type==1)
		return array('请选择','内科', '血液科', '呼吸科', '心内科', '神经科', '消化科', '内分泌', '妇产科', '儿科', '计生科', '康复护理科', '注射/输液室', '实验/化验室', '影像/放射/B超室', '外科', '口腔科', '五官科', '皮肤科', '肛肠科', '心胸科', '泌尿科', '骨伤科', '中医科', '麻醉科', '美容整形科', '消毒/清洁室', '手术室/ICU', '医院系统','其他');
		else if($type==2)
		return array('请选择','妇科',  '儿科',  '骨科',  '眼科',  '口腔科',  '内分泌',  '皮肤科',  '呼吸',  '消化',  '五官科',  '泌尿科',  '外科心脑血管','其他');
		else if($type==3)
		return array('请选择','检验耗材',  '诊断试剂',  '医用消毒',  '基础外科用具',  '注射穿刺',  '非临床医用耗材',  '介入耗材',  '独家专利耗材',  '配件','其他');
	}
	//卫生材料分类
	public function allMaterial()
	{
		return array('请选择','创面损伤', '功能敷料',  '生物材料',  '手术用品',  '粘贴材料',
'护创材料',  '医用纺织品',  '医用非织造布', '敷料机械','其他');
	}

	//用户类型列表 by scutLaoYi
	public function allUserType()
	{
		return array('异常用户', '企业用户', '个人用户', '管理员');
	}

	//状态列表
	public function allStatus()
	{
		return array('非法状态','待审核', '已上线', '已过期');
	}

	public function allMonth()
	{
		return array(1=>'一月','二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月');
	}
	public function allDiscussion()
	{
		return array('休闲火爆话题','医药家园','会议信息','医药区','医学','注册执考区','资料共享','其他');
	}
	public function allsecondDis($type)
	{
		switch($type)
		{
			case '0': return array('热门话题','畅所欲言');
			case '1': return array('交流畅谈','医药心情','职场交流','健康养生','寻求帮助');
			case '2': return array('学术会议','博览会信息');
			case '3': return array('药物研发','药品生产','医药综合','药学');
			case '4': return array('临床讨论','实验','医学检验','经验分享');
			case '5': return array('药师','医师','资料共享','考试动态');
			case '6': return array('科研求助','课件资源','科研工具','试题资源');
			case '7': return array('公告栏','提意见','我与中国生物医学材料的故事');
		}
	}
	public function checkSecondDis($type,$subtype)
	{
		switch($type)
		{
		case '0':
	   	{
			if(in_array($subtype,array('0','1','2')))return true;
			else return false;
		};
		case '1':
	   	{
			if(in_array($subtype,array('0','1','2','3','4')))return true;
			else return false;
		};
		case '2':
	   	{
			if(in_array($subtype,array('0','1')))return true;
			else return false;
		};
		case '3':
	   	{
			if(in_array($subtype,array('0','1','2','3')))return true;
			else return false;
		};
		case '4':
	   	{
			if(in_array($subtype,array('0','1','2','3')))return true;
			else return false;
		};
		case '5':
	   	{
			if(in_array($subtype,array('0','1','2','3')))return true;
			else return false;
		};
		case '6':
	   	{
			if(in_array($subtype,array('0','1','2','3')))return true;
			else return false;
		};
		case '7':
	   	{
			if(in_array($subtype,array('0','1','2')))return true;
			else return false;
		};
		default :return false;
		}
	}
}

?>
