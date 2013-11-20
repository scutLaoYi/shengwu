<?php
App::uses('AppController', 'Controller');
/**
 * CompanyUserInfos Controller
 *
 * @property CompanyUserInfo $CompanyUserInfo
 * @property PaginatorComponent $Paginator
 */
class CompanyUserInfosController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $uses=array('User','CompanyUserInfo');
	public $helpers = array('Html','Form');
	public $components = array('Paginator','List');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->CompanyUserInfo->recursive = 0;
		$this->Paginator->settings = array('conditions' => array('CompanyUserInfo.id !='=>null ));
		$infos = $this->Paginator->paginate();
		$this->set('companyUserInfos', $infos);
		//		print_r($infos);
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->CompanyUserInfo->exists($id)) {
			throw new NotFoundException(__('Invalid company user info'));
		}
		$options = array('conditions' => array('CompanyUserInfo.' . $this->CompanyUserInfo->primaryKey => $id));
		$this->set('companyUserInfo', $this->CompanyUserInfo->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CompanyUserInfo->create();
			if ($this->CompanyUserInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The company user info has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The company user info could not be saved. Please, try again.'));
			}
		}
		$users = $this->CompanyUserInfo->User->find('list');
		$this->set(compact('users'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->CompanyUserInfo->exists($id)) {
			throw new NotFoundException(__('Invalid company user info'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CompanyUserInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The company user info has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The company user info could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CompanyUserInfo.' . $this->CompanyUserInfo->primaryKey => $id));
			$this->request->data = $this->CompanyUserInfo->find('first', $options);
		}
		$users = $this->CompanyUserInfo->User->find('list');
		$this->set(compact('users'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->CompanyUserInfo->id = $id;
		if (!$this->CompanyUserInfo->exists()) {
			throw new NotFoundException(__('Invalid company user info'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CompanyUserInfo->delete()) {
			$this->Session->setFlash(__('The company user info has been deleted.'));
		} else {
			$this->Session->setFlash(__('The company user info could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/*
	 * 公司注册页面
	 * by lpp001
	 * 调用User和CompanyUserInfo两个模型层
	 * 将数据合并在同一个表单进行填写，并使用cake内置功能同时写入数据
	 */
	public function company_register()
	{
		$this->set('allProvince',$allprovince= $this->List->allProvince());
		$this->set('title_for_layout', '企业注册');
		if($this->request->is('post'))
		{

			if($this->request->data['User']['password'] == $this->request->data['User']['confirm_password']) 
			{

				$this->request->data['User']['type'] = 1;
				if($this->User->saveAssociated($this->request->data))
				{
					$this->Session->setFlash(__('企业用户注册成功！'));
					$this->redirect(array('controller'=>'Users', 'action'=>'login'));
				}

			}
			else 
			{
				$this->Session->setFlash(__('密码确认不一致'));
			}
		}
	}

	/*
	 * 公司信息修改页
	 * by scutLaoYi
	 * 修改公司信息
	 */
	public function company_edit()
	{
		$this->set('allProvince',$allprovince= $this->List->allProvince());
		$this->set('title_for_layout', '企业信息修改');
		if ($this->request->is(array('post', 'put'))) {
			if($this->CompanyUserInfo->save($this->request->data))
			{
				$this->Session->setFlash(__('企业信息修改成功!'));
				$this->redirect(array('controller'=>'Mainpage', 'action'=>'index'));
			}
			else
			{
				$this->Session->setFlash(__('信息修改失败，请重试!'));
			}
		} 
		else {
			$options = array('conditions' => array('User.id =' => $this->Auth->user('id')));
			$this->User->recursive = '0';
			$this->request->data = $this->User->find('first', $options);
		}
		//$this->set(compact('users'));
	}

	/*
	 * 公司密码专属修改页面
	 * by scutLaoYi
	 * 输入原密码及重复新密码进行修改
	 */
	public function company_pass_edit()
	{
		if($this->request->is(array('post','put')))
	   	{
			$oldPassword = $this->User->find('first',array('conditions'=>array('User.id'=>$this->Auth->user('id'))));
			if(AuthComponent::password($this->request->data['User']['old password']) == $oldPassword['User']['password']) 
			{
				if($this->request->data['User']['new password'] == $this->request->data['User']['confirm new password'])
				{
					$this->request->data['User']['id'] = $this->Auth->user('id');
					$this->request->data['User']['username'] = $this->Auth->user('username');
					$this->request->data['User']['password'] = $this->request->data['User']['new password'];
					$this->request->data['User']['email'] = $this->request->data['User']['email'];
					$this->request->data['User']['type'] = $this->Auth->user('type');
					if($this->User->save($this->request->data)) {
						$this->Session->setFlash(__('密码修改成功'));
						return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
					} else {
						$this->Session->setFlash(__('修改失败，请重试'));
					}
				} 
				else
				{
					$this->Session->setFlash(__('请重新确认新密码'));
					$options = array('conditions'=>array('User.id' => $this->Auth->user('id')));
					$this->request->data = $this->User->find('first',$options);
				}
			} 
			else 
			{
				$this->Session->setFlash(__('密码错误，请重试'));
				$options = array('conditions'=>array('User.id' => $this->Auth->user('id')));
				$this->request->data = $this->User->find('first',$options);
			}
		}
		else
		{
			$this->request->data = array('User'=>array('email'=>$this->Auth->user('email')));
		}
	}

	/*
	 * 公司信息访问权限：
	 * 公司用户可访问
	 */
	public function isAuthorized($user)
	{

		if(isset($user['type'])&&$user['type'] == '1')
			return True;
		return parent::isAuthorized($user);
	}
	/*
	 * beforeFilter function for CompanyUserInfosController by lpp
	 */
	public function beforeFilter()
	{
		$this->Auth->allow('company_register');
		parent::beforeFilter();
	}
}
