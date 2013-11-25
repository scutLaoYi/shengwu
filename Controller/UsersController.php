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

	/*  用户登录，任何权限均可进入。 */
	public function login() {
		$this->set('title_for_layout', '登录');
		if($this->Auth->user('id')) {
			$this->Session->setFlash(__('你的帐号已登录，无须重复登录'));
			return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
		}
		if($this->request->is('post')) {
			if($this->Auth->login())
			{
				$this->Session->write('user',$this->data['User']['username']);
				$this->Session->write('type', $this->Auth->user('type'));
				return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
			}
			$this->Session->setFlash(__('帐号或密码有误，请重试'));
		}
	}

	/* 已登录的用户可以通过此方法退出登录 */
	public function logout() {
		$this->Session->delete('user');
		$this->Session->delete('type');
		$this->Auth->logout();
		return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
	}

	/*用户注册*/
	public function personal_register() {
		$this->set('title_for_layout', '个人注册');
		if($this->request->is('post')) {
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
		$options = array('conditions'=>array('User.id'=>$this->Auth->user('id')));
		$this->set('user',$this->User->find('first',$options));
	}

	/*修改用户密码，已登录用户可进入*/
	public function personal_edit () {
		if($this->request->is(array('post','put'))) {
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
	function change_password($user=null,$date=null,$mdf5=null)
	{
		if($user!=null&&$date!=null&&$mdf5!=null)
		{
			$salt=Configure::read('Security.salt');
			$str=$user.$date.$salt;
			$mdf=AuthComponent::password($str);
			$this->set('user',$user);
			$nowunix=time();
			if($mdf5!=$mdf||$nowunix-$date>3600)
			{
				$this->Session->setFlash('链接失效，请重新操作');
				$this->redirect(array('action'=>'login'));
			}

		}
		else
		{
			$this->Session->setFlash('链接失效，请重新操作');
			$this->redirect(array('action'=>'login'));
		}
		if($this->request->is('post'))
		{
					if($this->request->data['User']['password']==$this->request->data['User']['password_confirm'])
					{
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

	function forget_password()
	{
		if($this->request->is('post'))
		{
			$user=$this->User->find('first',array('conditions'=>array('User.username'=>$this->request->data['Password']['username'])));
			if($user==null)
			{
				$this->Session->setFlash('不存在该用户');
			}
			else
			{
				$website='http://10.0.0.3/';
				$date=time();
				$user_email=$user['User']['email'];
				$Email=new CakeEmail('gmail');
				$salt=Configure::read('Security.salt');
				$str=$user['User']['username'].$date.$salt;
				$mdf=AuthComponent::password($str);
				$message='亲爱的用户 '.$user['User']['username'].'：您好！

    您收到这封这封电子邮件是因为您 (也可能是某人冒充您的名义) 申请了一个新的密码。假如这不是您本人所申请, 请不用理会这封电子邮件, 但是如果您持续收到这类的信件骚扰, 请您尽快联络管理员。

    要使用新的密码, 请使用以下链接启用密码。
'.

   $website.'cakephp/users/change_password/'.$user['User']['username'].'/'.$date.'/'.$mdf.
    
  
  '
(如果无法点击该URL链接地址，请将它复制并粘帖到浏览器的地址输入框，然后单击回车即可。)
   
    注意:请您在收到邮件1个小时内使用，否则该链接将会失效。
    关注中国生物医学材料：'.$website.'cakephp/Mainpage/index';
				$Email->from(array('522623259@qq.com'=>'My Site'));
				$Email->to($user_email);
				$Email->subject('中国生物医学材料帮您找回密码');
				if($Email->send($message))
				{
					$this->Session->setFlash('您的提交已通过审核，请于邮箱查看，如果收信箱找不到，请于垃圾箱查看！');
				}
			}

		}
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
		$this->Auth->allow('logout','personal_register','forget_password','change_password');
		parent::beforeFilter();
	}
}
