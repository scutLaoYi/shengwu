<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
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
	public $helpers = array('Html','Form', 'Captcha'); //added by GentleH

	public $components = array('Paginator', 
		'EmailSender', 
		'List',
		'Log',
		'Captcha'=>array('captchaType'=>'math',
			'jquerylib'=>true,
			'modelName'=>'User',
			'fieldName'=>'captcha')
	);
	
	public $uses = array('CompanyUserInfo','User');
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index($type = null) {
		$this->User->recursive = 0;
		$options = array('conditions'=>array('User.id !='=>null), 'limit'=>10);
		if($type)
		{
			$options['conditions']['User.type'] = $type;
		}
		$this->Paginator->settings = $options;
		$this->set('users', $this->Paginator->paginate('User'));
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
			$this->request->data['User']['type']='3';
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('创建管理员成功'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('创建失败'));
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
			throw new NotFoundException(__('用户不存在...'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('用户信息已保存.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('用户信息更新失败，请检查错误.'));
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
			$this->Session->setFlash(__('删除成功'));
		} else {
			$this->Session->setFlash(__('删除失败，请稍后再试'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/*This is edited by GentleH */

	/*  用户登录，任何权限均可进入。 */
	public function login() {
		$this->set('title_for_layout', '登录');

		if($this->Auth->user('id')) {
			$this->Session->setFlash(__('你的帐号已登录，无须重复登录'));
			return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
		}
		
		if($this->request->is('post')) {
			if($this->Captcha->getVerCode() == $this->request->data['User']['captcha']){
				if($this->Auth->login())
				{
					//写入用户名和类型
					$this->Session->write('user',$this->data['User']['username']);
					$this->Session->write('type', $this->Auth->user('type'));
					$this->Log->writeLoginRecord($this->data['User']['username'], $this->Auth->user('type'), 'ok');
					return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
				}
				$this->Session->setFlash(__('帐号或密码有误，请重试'));
			}
			else{
				$this->Session->setFlash(__('验证码错误，请重试'));
			}
			$this->Log->writeLoginRecord($this->data['User']['username'], "unknow", 'failed');
		}
	}

	/* 已登录的用户可以通过此方法退出登录 */
	public function logout() {
		$this->Session->delete('user');
		$this->Session->delete('type');
		$this->Auth->logout();
		return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
	}

	/*个人用户注册， 类型为2*/
	public function personal_register() {
		$this->set('title_for_layout', '个人注册');
		if($this->request->is('post')) {
			if($this->Captcha->getVerCode() != $this->request->data['User']['captcha']){
				$this->Session->setFlash(__('验证码错误，请重试'));
				return;
			}
			if($this->request->data['User']['password'] == $this->request->data['User']['confirm_password']) {
				$this->request->data['User']['type'] = 2;
				if($this->User->save($this->request->data))
				{
					$this->Session->setFlash(__('恭喜你，你的帐号注册成功'));
					return $this->redirect(array('controller'=>'Users','action'=>'login'));
				} else {
					$this->Session->setFlash(__('当前注册信息有误，请重试'));
				}
			} else {
				$this->Session->setFlash(__('密码确认不一致'));
			}
		}
	}

	/*查看个人信息，包括用户名，邮箱，注册时间，只有已登录用户才能查看自己的信息*/
	public function personal_infos() {
		$this->set('title_for_layout', '个人信息');
		$options = array('conditions'=>array('User.id'=>$this->Auth->user('id')));
		$this->set('user',$this->User->find('first',$options));
	}

	/*修改用户密码，已登录用户可进入*/
	public function personal_edit () {
		$this->set('title_for_layout', '个人信息编辑');
		if($this->request->is(array('post','put'))) {
			$this->User->recursive = 0;
			$oldPassword = $this->User->find('first',array('conditions'=>array('User.id'=>$this->Auth->user('id'))));
			if(AuthComponent::password($this->request->data['User']['old password']) == $oldPassword['User']['password']) {
				if($this->request->data['User']['password'] == $this->request->data['User']['confirm new password']) {
					$newData['id'] = $this->Auth->user('id');
					$newData['username'] = $this->Auth->user('username');
					$newData['password'] = $this->request->data['User']['password'];
					$newData['email'] = $this->Auth->user('email');
					$newData['type'] = $this->Auth->user('type');
					if($this->User->save($newData)) {
						$this->Session->setFlash(__('密码修改成功'));
						return $this->redirect(array('controller'=>'Users','action'=>'personal_infos'));
					} else {
						$this->Session->setFlash(__('修改失败，请重试'));
					}
				} else {
					$this->Session->setFlash(__('请重新确认新密码'));
					$options = array('conditions'=>array('User.id' => $this->Auth->user('id')));
					$this->request->data = $this->User->find('first',$options);
				}
			} else {
				$this->Session->setFlash(__('密码错误，请重试'));
				$options = array('conditions'=>array('User.id' => $this->Auth->user('id')));
				$this->request->data = $this->User->find('first',$options);
			}
		}
	}

	/*
	 * 找回密码的链接页面
	 * by lpp001
	 * 在链接中获取用户名、日期时间、及md5值，比较md5数值是否相同验证链接有效性
	 */
	function change_password($user=null,$date=null,$mdf5=null)
	{
		$this->set('title_for_layout', '找回密码');
		//验证链接有效性
		if($user!=null&&$date!=null&&$mdf5!=null)
		{
			//读取盐，连接用户名、申请找回密码的时间和盐进行md5
			//将结果存入$mdf
			$salt=Configure::read('Security.salt');
			$str=$user.$date.$salt;
			$mdf=AuthComponent::password($str);
			$this->set('user',$user);
			//获取当前时间与传入时间比较，超过一个小时链接无效
			$nowunix=time();
			if($mdf5!=$mdf||$nowunix-$date>3600)
			{
				$this->Session->setFlash('链接失效，请重新操作');
				return $this->redirect(array('action'=>'login'));
			}

		}
		else
		{
			$this->Session->setFlash('链接失效，请重新操作');
			return $this->redirect(array('action'=>'login'));
		}
		//链接有效，获取用户输入进行重置密码操作
		if($this->request->is('post'))
		{
					if($this->request->data['User']['password']==$this->request->data['User']['password_confirm'])
					{
						$this->User->recursive = 0;
						$newuser=$this->User->find('first',array('conditions'=>array('User.username'=>$user)));
						$newuser['User']['password']=$this->request->data['User']['password'];
						if($this->User->save($newuser))
						{
							$this->Session->setFlash('修改成功，请登录');
							return $this->redirect(array('action'=>'login'));

						}
						else
						{
							$this->Session->setFlash('修改失败，请稍后再试');
						}
					}
					else
					{
						$this->Session->setFlash('输入密码不一致，请重试');
					}
		}
	}

	/*
	 * 找回密码的邮件发送页面
	 * by lpp001
	 */
	function forget_password()
	{

		$this->set('title_for_layout', '忘记密码');
		if($this->request->is('post'))
		{
			if($this->Captcha->getVerCode() != $this->request->data['User']['captcha']){
				$this->Session->setFlash(__('验证码错误，请重试'));
				return;
			}
			$this->User->recursive = 0;
			$user=$this->User->find('first',array('conditions'=>array('User.username'=>$this->request->data['Password']['username'])));
			if($user==null)
			{
				$this->Session->setFlash('不存在该用户');
			}
			else
			{
				if($this->EmailSender->sendFoundPassword(
					$user['User']['username'], $user['User']['email']))
				{
					$this->Session->setFlash('密码找回邮件发送成功！');
					return $this->redirect(array('controller'=>'Mainpage', 'action'=>'index'));
				}
				else
				{
					$this->Session->setFlash('密码找回邮件发送失败...');
				}
			}

		}
	}
	//判断访问的个人用户是否是登录用户
	public function is_current_user($user_id)
	{
		if(empty($this->request->params['requested']))
		{
			//非法url,直接访问该页面，返回异常
			throw new ForbiddenException();
		}

		if($this->Auth->user('id')==$user_id)
		     return true;
		else 
	             return false;
		
	}
	//判断访问的企业用户是否是登录用户
	public function is_current_company($company_id)
	{
		if(empty($this->request->params['requested']))
		{
			//非法url,直接访问该页面，返回异常
			throw new ForbiddenException();
		}
		$company=$this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.id'=>$company_id)));
		if($this->Auth->user('id')==$company['CompanyUserInfo']['user_id'])
		     return true;
		else 
	             return false;
		
	}
	/*登录权限管理，个人用户允许访问个人信息及个人编辑页面*/
	public function isAuthorized($user) {
		if(in_array($this->action,array('personal_infos','personal_edit'))) {
			if($this->Auth->user('type') == '2')
				return true;
		}
		return parent::isAuthorized($user);
	}

	/*beforeFilter function for usersController. scutLaoYi*/
	/*允许游客登出及个人注册*/
	public function beforeFilter(){
		$this->Auth->allow('logout','personal_register','forget_password','change_password','is_current_user','is_current_company', 'captcha');
		$this->set('allUserType', $this->List->allUserType());
		parent::beforeFilter();
	}
}
