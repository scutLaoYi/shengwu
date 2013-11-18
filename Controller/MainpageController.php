<?php

App::uses('AppController', 'Controller');

/*
 * 首页控制器 by scutLaoYi
 *
 * */
class MainpageController extends AppController
{

	public $components = array('Paginator');
	public $uses = array('AdList');

	/*
	 * index函数返回首页，调用adlist读取所有广告并展示
	 */
	public function index()
	{
		$this->set('title_for_layout', '首页');
		$this->set('advertise', $this->AdList->find('all'));
		
	}

	/*
	 * 权限管理，任何人均可访问首页
	 */
	public function beforeFilter(){
		$this->Auth->allow('index');
	}
}
