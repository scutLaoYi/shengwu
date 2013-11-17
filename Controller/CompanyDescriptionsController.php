<?php
App::uses('AppController', 'Controller');

class CompanyDescriptionsController extends AppController
{

	public $helpers = array('Html', 'Form');
	public $components = array('Paginator' );
	public $uses = array(
		'User', 
		'CompanyUserInfo', 
		'CompanyIntroduce', 
		'ProxyInfo',
		'Recruitment');

	function notFoundPage()
	{
		$this->Session->setFlash('您访问的页面不存在...');
		return $this->redirect(array('controller'=>'Mainpage', 'action'=>'index'));
	}
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

	public function view_proxy($company_id = null)
	{
		if(!$company_id)
			return $this->notFoundPage();
		$this->ProxyInfo->recursive = 0;
		$proxy = $this->ProxyInfo->find('all', array(
			'conditions'=>array('ProxyInfo.company_user_info_id'=>$company_id)));
		$this->set('proxy', $proxy);
	}

	public function view_recruitment($company_id = null)
	{
		return $this->notFoundPage();
	}

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
