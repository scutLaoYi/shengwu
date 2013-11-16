<?php

App::uses('Component', 'Controller');
class ProvinceComponent extends Component {
    public function allProvince() {
	//waiting for change.
        return array('北京市', '天津市', '上海市', '重庆市', '河北省', '河南省' ,'云南省', '辽宁省','黑龙江省', 
			'湖南省', '安徽省', '山东省', '新疆维吾尔', '江苏省', '浙江省', '江西省','湖北省', 
			'广西壮族','甘肃省', '山西省','内蒙古','陕西省','吉林省','福建省','贵州省','广东省',
			'青海省','西藏','四川省','宁夏回族','海南省','台湾省','香港特别行政区','澳门特别行政区');
	}

	public function allSex() {
		return array('男','女');
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
}

?>
