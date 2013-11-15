<?php

App::uses('Component', 'Controller');
class ListComponent extends Component {
	//所有省份
    public function allProvince() {
	//waiting for change.
        return array('北京市', '天津市', '上海市', '重庆市', '河北省', '河南省' ,'云南省', '辽宁省','黑龙江省', 
			'湖南省', '安徽省', '山东省', '新疆维吾尔', '江苏省', '浙江省', '江西省','湖北省', 
			'广西壮族','甘肃省', '山西省','内蒙古','陕西省','吉林省','福建省','贵州省','广东省',
			'青海省','西藏','四川省','宁夏回族','海南省','台湾省','香港特别行政区','澳门特别行政区');
	}
	//公司经济性质
	public function companyEconomicNature()
	{
		return array('国有经济','集体经济','私营经济','个体经济','联营经济','股份制经济','外商投资','港澳台投资','其他经济');
	}
	//公司人数
	public function companyNumber()
	{
		return array('50人以下','50-100人','100-500人','500-1000人'.'1000-5000人','5000人以上');
	}
}

?>
