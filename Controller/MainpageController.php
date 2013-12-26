<?php

App::uses('AppController', 'Controller');

/*
 * 首页控制器 by scutLaoYi
 *
 * */
class MainpageController extends AppController
{

	public $components = array('Paginator','RecruitmentSearcher','ProxySearcher','CompanyIntroduceSearcher','ForumSearcher');
	public $uses = array('AdList','Recruitment','ProxyInfo','CompanyIntroduce','Forum');
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
		$this->set('forums',$this->ForumSearcher->forum_lastest());
		if($this->request->is('post'))
		{
			print_r($this->request->data);
			if($this->request->data['search']['select']=='company')
			{
				$this->redirect(array('controller'=>'CompanyIntroduces','action'=>'company_introduce_list','0',$this->request->data['search']['content']));		
			}
			else
			{
				$this->redirect(array('controller'=>'ProxyInfos','action'=>'proxy_search','null',$this->request->data['search']['content']));		
			}
		 
		
		}
	}

		/*
		 * 权限管理，任何人均可访问首页
		 */
		public function beforeFilter(){
			$this->Auth->allow('index','search');
		}
	}
