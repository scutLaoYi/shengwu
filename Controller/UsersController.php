<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $helpers = array('Html','Form'); //added by GentleH

	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/*This is edited by GentleH */

/* user login */
	public function login() {
		if($this->request->is('post')) {
			if($this->Auth->user('id')) {
				$this->Session->setFlash(__('你的帐号已登录，无须重复登录'));
				return $this->redirect(array('controller'=>'Users','action'=>'index'));
			}
			if($this->Auth->login())
			{
				$this->Session->write('user',$this->data['User']['username']);
				return $this->redirect(array('controller'=>'Users','action'=>'index'));
			}
			$this->Session->setFlash(__('帐号或密码有误，请重试'));
		}
	}

/* user logout */
	public function logout() {
		$this->Session->delete('user');
		$this->Auth->logout();
		return $this->redirect(array('controller'=>'Users','action'=>'index'));
	}

/*personal user register*/
	public function personal_register() {
		if($this->request->is('post')) {
			if($this->request->data['User']['password'] == $this->request->data['User']['confirm_password']) {
				$newUser['username'] = $this->request->data['User']['username'];
				$newUser['password'] = $this->request->data['User']['password'];
				$newUser['email'] = $this->request->data['User']['email'];
				$newUser['type'] = '2';
				if($this->User->save($newUser)) {
					$this->Session->setFlash(__('恭喜你，你的帐号注册成功'));
					return $this->redirect(array('controller'=>'Users','action'=>'index'));
				} else {
					$this->Session->setFlash(__('当前注册信息有误，请重试'));
				}
			} else {
				$this->Session->setFlash(__('密码确认不一致'));
			}
		}
	}

/*beforeFilter function for usersController. scutLaoYi*/

	public function beforeFilter(){
		$this->Auth->allow('logout','personal_register');
		parent::beforeFilter();
	}

}
