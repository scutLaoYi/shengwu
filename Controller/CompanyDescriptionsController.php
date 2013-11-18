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
	 * 访问出错时的处理函数，跳转回首页并显示页面不存在
	 */ 
	function notFoundPage()
	{
		$this->Session->setFlash('您访问的页面不存在...');
		return $this->redirect(array('controller'=>'Mainpage', 'action'=>'index'));
	}

	/*
	 * 三级页面公司基本信息显示
	 * 读取companyUserInfo表获取数据并展示
	 */
	public function view_info($company_id = null)
	{
		if(!$company_id)
		{
			return $this->notFoundPage();
		}
		$this->CompanyUserInfo->recursive = 0;
		$info = $this->CompanyUserInfo->find('first', array(
			'conditions' => array('CompanyUserInfo.id' => $company_id)));
		if(!$info)
			return $this->notFoundPage();
		$this->set('company_info', $info['CompanyUserInfo']);
	}

	/*
	 * 三级页面公司宣传信息展示
	 * 读取companyIntroduce表获取数据并显示
	 */
	public function view_introduce($company_id = null)
	{
		if(!$company_id)
			return $this->notFoundPage();
		$this->CompanyIntroduce->recursive = 0;
		$introduce = $this->CompanyIntroduce->find('first', array(
			'conditions'=>array('CompanyIntroduce.company_user_info_id'=>$company_id)));
		if(isset($introduce['CompanyIntroduce']))
			$this->set('introduce', $introduce['CompanyIntroduce']);
		$this->set('company_id', $company_id);
	}

	/*
	 * 三级页面公司代理信息展示
	 * 读取proxy将对应公司所有代理列表展示
	 * 创建链接指向对应代理的三级页面
	 */
	public function view_proxy($company_id = null)
	{
		if(!$company_id)
			return $this->notFoundPage();
		$this->ProxyInfo->recursive = 0;
		$proxy = $this->ProxyInfo->find('all', array(
			'conditions'=>array('ProxyInfo.company_user_info_id'=>$company_id)));
		$this->set('proxy', $proxy);
	}

	/*
	 * 三级页面公司招聘信息展示
	 * 读取recruitment表获取公司招聘列表展示
	 * 创建链接指向对应招聘三级页面
	 */
	public function view_recruitment($company_id = null)
	{
		return $this->notFoundPage();
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
