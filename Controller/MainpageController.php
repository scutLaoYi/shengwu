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
		$this->set('title_for_layout', 'main_index');
		$this->AdList->recursive = 0;
		$this->set('advertise', $this->AdList->find('all'));
		$this->set('recruitments',$this->RecruitmentSearcher->search_lastest());
		$this->set('proxys1',$this->ProxySearcher->proxy_lastest(1));
		$this->set('proxys2',$this->ProxySearcher->proxy_lastest(2));	
		$this->set('proxys3',$this->ProxySearcher->proxy_lastest(3));
		$this->set('company_introduces',$this->CompanyIntroduceSearcher->company_introduce_lastest());
		$this->set('forums0',$this->ForumSearcher->forum_lastest(0, 0));
		$this->set('forums1',$this->ForumSearcher->forum_lastest(1, 0));
		$this->set('forums2',$this->ForumSearcher->forum_lastest(2, 0));
		$this->set('forums3',$this->ForumSearcher->forum_lastest(3, 0));
		$this->set('forums4',$this->ForumSearcher->forum_lastest(4, 0));
		$this->set('forums5',$this->ForumSearcher->forum_lastest(5, 0));
		$this->set('forums6',$this->ForumSearcher->forum_lastest(6, 0));
		if($this->request->is('post'))
		{
			if($this->request->data['search']['select']=='company')
			{
				return $this->redirect(array('controller'=>'CompanyIntroduces','action'=>'company_introduce_list','0',$this->request->data['search']['content']));		
			}
			else
			{
				return $this->redirect(array('controller'=>'ProxyInfos','action'=>'proxy_search','null',$this->request->data['search']['content']));		
			}
		}
	}

		/*
		 * 权限管理，任何人均可访问首页
		 */
		public function beforeFilter(){
			$this->Auth->allow('index');
		}
	}
