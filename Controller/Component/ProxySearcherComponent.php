<?php

App::uses('Component', 'Controller');
/*
 * proxy search engine.
 * post some args and return the result.
 * by scutLaoYi.
 */
class ProxySearcherComponent extends Component
{
	public $components = array('Paginator');

	public function proxy_search(
								$province = null, 
								$type = null,
								$function = null,
								$department = null,
								$material = null,
								$company_id = null)
	{
		//创建sql筛选条件
		$options = array('ProxyInfo.id != '=>null);
		$options ['ProxyInfo.status'] = '2';
		if($province)
			$options['ProxyInfo.product_area ='] = $province; 
		if($type)
			$options['ProxyInfo.product_type ='] = $type;
		if($function)
			$options['ProxyInfo.function ='] = $function;
		if($department)
			$options['ProxyInfo.department'] = $department;
		if($material && $type == '3')
			$options['ProxyInfo.material'] = $material;
		if($company_id)
			$options['ProxyInfo.company_user_info_id'] = $company_id;

		//开始筛选条件并返回结果
		$this->Paginator->settings = array(
			'conditions'=>$options,
			'limit'=>5,
			'order'=>array('ProxyInfo.created'=>'desc')
		);
		$result = $this->Paginator->paginate('ProxyInfo');

		return $result;
	}
}

