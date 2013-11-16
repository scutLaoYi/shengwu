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
	public $components = array('Paginator','Province');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->CompanyUserInfo->recursive = 0;
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
	public function company_register()
	{
		$this->set('title_for_layout', '企业注册');
		$this->set('allProvince',$allprovince= $this->Province->allProvince());
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
	//beforeFilter function for CompanyUserInfosController by lpp
	public function beforeFilter()
	{
		$this->Auth->allow('company_register');
		parent::beforeFilter();
	}
}
