<?php

App::uses('AppController', 'Controller');

/*
 * 首页控制器 by scutLaoYi
 *
 * */
class MainpageController extends AppController
{

	public $components = array('Paginator','RecruitmentSearcher','ProxySearcher','CompanyIntroduceSearcher');
	public $uses = array('AdList','Recruitment','ProxyInfo','CompanyIntroduce');
	public $helpers = array('Html','Form');
	/*
	 * index函数返回首页，调用adlist读取所有广告并展示
	 */
	public function index()
	{
		$this->set('title_for_layout', '首页');
		$this->AdList->recursive = 0;
		$this->set('advertise', $this->AdList->find('all'));
		$this->set('recruitments',$this->RecruitmentSearcher->search_lastest());
		$this->set('proxys',$this->ProxySearcher->proxy_lastest());
		$this->set('company_introduces',$this->CompanyIntroduceSearcher->company_introduce_lastest());
		
	}

	/*
	 * 权限管理，任何人均可访问首页
	 */
	public function beforeFilter(){
		$this->Auth->allow('index');
	}
}
