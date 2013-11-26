<?php
App::uses('AppController', 'Controller');

/*
 * 公司三级页面专用控制器 by scutLaoYi
 */
class CompanyDescriptionsController extends AppController
{

	public $helpers = array('Html', 'Form');
	public $components = array('Paginator' );
	/*
	 * 使用的model列表
	 */
	public $uses = array(
		'User', 
		'CompanyUserInfo', 
		'CompanyIntroduce', 
		'ProxyInfo',
		'Recruitment');

	/*
	 * 三级页面公司基本信息显示
	 * 读取companyUserInfo表获取数据并展示
	 */
	public function view_info($company_id = null)
	{
		if(!$company_id)
		{
			//未传入公司id且不是公司用户，直接跳出
			if($this->Auth->user('type') != '1')
				throw new NotFoundException('页面不存在');
			//否则查找当前用户的公司id并显示对应项
			$this->CompanyUserInfo->recursive = '0';
			$currentCompany = $this->CompanyUserInfo->find('first', array('conditions' => array('user_id' => $this->Auth->user('id'))));
			$this->set('company_info', $currentCompany['CompanyUserInfo']);
			$this->set('isCurrentCompany', True);
		}
		else//已传入公司id，查找对应项并显示
		{
			$this->CompanyUserInfo->recursive = 0;
			$info = $this->CompanyUserInfo->find('first', array(
				'conditions' => array('CompanyUserInfo.id' => $company_id)));
			if(!$info)
				throw new NotFoundException('页面不存在');
			$this->set('company_info', $info['CompanyUserInfo']);
			//对当前公司用户自身信息提供编辑接口
			if($this->Auth->user('type') == 1)
			{
				if($info['CompanyUserInfo']['user_id'] == $this->Auth->user('id'))
					$this->set('isCurrentCompany', True);
			}
		}
	}

	/*
	 * 三级页面公司宣传信息展示
	 * 读取companyIntroduce表获取数据并显示
	 */
	public function view_introduce($company_id = null)
	{
		if(!$company_id)
			throw new NotFoundExcetion('页面不存在');

		$this->CompanyIntroduce->recursive = 0;
		$introduce = $this->CompanyIntroduce->find('first', array(
			'conditions'=>array('CompanyIntroduce.company_user_info_id'=>$company_id)));
		if(isset($introduce['CompanyIntroduce']))
			$this->set('introduce', $introduce['CompanyIntroduce']);
		$this->set('company_id', $company_id);

		//对当前公司自己的宣传页面提供编辑接口
		if($this->Auth->user('type') == '1')
		{
			$this->CompanyUserInfo->recursive = 0;
			$currentCompany = $this->CompanyUserInfo->find('first', 
				array('conditions'=>array('CompanyUserInfo.user_id' => $this->Auth->user('id'))));
			if($currentCompany['CompanyUserInfo']['id'] == $company_id)
				$this->set('isCurrentCompany', True);
		}
	}

	/*
	 * 三级页面公司代理信息展示
	 * 读取proxy将对应公司所有代理列表展示
	 * 创建链接指向对应代理的三级页面
	 */
	public function view_proxy($company_id = null)
	{
		if(!$company_id)
			throw new NotFoundException('页面不存在');

		$this->ProxyInfo->recursive = 0;
		$this->Paginator->settings = array('conditions'=>array('ProxyInfo.id !='=>null, 'ProxyInfo.company_user_info_id = '=>$company_id));
		$this->set('proxyInfos', $this->Paginator->paginate('ProxyInfo'));
		$this->set('company_id', $company_id);
	}

	/*
	 * 三级页面公司招聘信息展示
	 * 读取recruitment表获取公司招聘列表展示
	 * 创建链接指向对应招聘三级页面
	 */
	public function view_recruitment($company_id = null)
	{
		if(!$company_id)
			throw new NotFoundException();
		$this->Recruitment->recursive = 0;
		$this->Paginator->settings = array('conditions'=>array('Recruitment.id !='=>null, 
			'Recruitment.company_user_info_id =' => $company_id, 
			'Recruitment.status =' => '2'));
		$this->set('Recruitments', $this->Paginator->paginate('Recruitment'));
		$this->set('company_id', $company_id);
	}

	/*
	 * 权限管理
	 * 所有人允许访问公司三级页面
	 */
	public function beforeFilter()
	{
		$this->Auth->allow(
			'view_info', 
			'view_introduce',
			'view_proxy',
			'view_recruitment'
		);
		parent::beforeFilter();
	}

}
