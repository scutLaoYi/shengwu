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
		$this->set('companyUserInfos', $this->Paginator->paginate());
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
		$this->set('allProvince',$allprovince= $this->Province->allProvince());
		if($this->request->is('post'))
		{

			if($this->request->data['User']['password'] == $this->request->data['User']['confirm_password']) 
			{
				
				$this->request->data['User']['type'] = 1;
				$this->User->set($this->request->data);
				if($this->User->validates() )
				{
					$this->CompanyUserInfo->set($this->request->data);
					if($this->CompanyUserInfo->validates())
					{

						$user = $this->User->save($this->request->data);
						if(!empty($user))
						{
							$this->request->data['CompanyUserInfo']['user_id'] = $this->User->id;
							$province_id=$this->request->data['CompanyUserInfo']['province'];
							$this->request->data['CompanyUserInfo']['province']=$allprovince[$province_id];
							$this->User->CompanyUserInfo->save($this->request->data);
							return 	$this->redirect(array('controller'=>'Users','aoction'=>'login'));
						}
					}
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
