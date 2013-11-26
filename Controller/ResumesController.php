<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Resumes Controller
 *
 * @property Resume $Resume
 * @property PaginatorComponent $Paginator
 */
class ResumesController extends AppController {

	/**
	 * Components

	 * @var array
	 */
	public $helpers = array('Html','Form');
	public $components = array('Paginator','List', 'EmailSender');
	public $uses = array('Recruitment','Resume');
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->Resume->recursive = 0;
		$this->set('resumes', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Resume->exists($id)) {
			throw new NotFoundException(__('Invalid resume'));
		}
		$options = array('conditions' => array('Resume.' . $this->Resume->primaryKey => $id));
		$this->set('resume', $this->Resume->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Resume->create();
			if ($this->Resume->save($this->request->data)) {
				$this->Session->setFlash(__('The resume has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume could not be saved. Please, try again.'));
			}
		}
		$users = $this->Resume->User->find('list');
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
		if (!$this->Resume->exists($id)) {
			throw new NotFoundException(__('Invalid resume'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Resume->save($this->request->data)) {
				$this->Session->setFlash(__('The resume has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Resume.' . $this->Resume->primaryKey => $id));
			$this->request->data = $this->Resume->find('first', $options);
		}
		$users = $this->Resume->User->find('list');
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
		$this->Resume->id = $id;
		if (!$this->Resume->exists()) {
			throw new NotFoundException(__('Invalid resume'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Resume->delete()) {
			$this->Session->setFlash(__('The resume has been deleted.'));
		} else {
			$this->Session->setFlash(__('The resume could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/*Edited by GentleH
		增加功能：编辑简历。
		功能说明：只有个人用户登录之后才能进入的页面。
				 若未填写，则各项为空，若已填写，则把已填内容
				从数据库读出到相应项。
	 */

	public function edit_resumes() {
		$this->set('allSex',$this->List->allSex());
		$this->set('allPolitical',$this->List->allPolitical());
		$this->set('allSalary',$this->List->allSalary());
		$this->set('allWorkingType',$this->List->allWorkingType());
		$this->set('allWorkingTime',$this->List->allWorkingTime());
		$this->set('allEducational',$this->List->allEducational());
		$judge = $this->Resume->find('first',array('conditions'=>array('Resume.user_id' => $this->Auth->user('id'))));
		if(!$judge) {
			if($this->request->is('post')) {
				$this->request->data['Resume']['user_id'] = $this->Auth->user('id');
				if($this->Resume->save($this->request->data)) {
					$this->Session->setFlash(__('简历保存成功'));
					return $this->redirect(array('controller'=>'Resumes','action'=>'index'));
				} else {
					$this->Session->setFlash(__('保存失败，请重试'));
				}
			}
		} else {
			$update = $this->Resume->find('first',array('conditions'=>array('Resume.user_id'=>$this->Auth->user('id'))));
			if($this->request->is(array('post','put'))) {
				$this->request->data['Resume']['id'] = $update['Resume']['id'];
				if($this->Resume->save($this->request->data)) {
					$this->Session->setFlash(__('简历修改已保存'));
					return $this->redirect(array('controller'=>'Resumes','action'=>'index'));
				} else {
					$this->Session->setFlash(__('修改失败，请稍后重试'));
				}
			} else {
				$options = array('conditions' => array('Resume.user_id' => $this->Auth->user('id')));
				$this->request->data = $this->Resume->find('first',$options);
			}
		}
	}
	/**
	 * function post_resume by lpp001
	 * 个人用户向企业用户发布简历
	 * -------------------
	 * 注意：
	 *     编写并发送后简历自动保存！
	 */
	public function post_resume($recruitment_id=null)
	{
		//读取招聘数据和简历数据
		$this->Recruitment->recursive = 0;
		$recruitment=$this->Recruitment->find('first',array('conditions'=>array('Recruitment.id'=>$recruitment_id)));
		$this->Resume->recursive = 0;
		$resume=$this->Resume->find('first',array('conditions'=>array('Resume.user_id'=>$this->Auth->user('id'))));	

		//判掉无效的参数
		if(!$recruitment)
		{
			throw new NotFoundException('该招聘页面不存在.');
		}
		//判掉没填写建立模板的家伙
		if(!$resume)
		{
			$this->Session->setFlash('您还没有填写简历模板.');
			return $this->redirect(array('controller'=>'Resumes', 'action'=>'edit_resumes'));
		}
		//判掉无效的用户类型
		if($this->Auth->user('type') != 2)
		{
			$this->Session->setFlash('您不是个人用户，无法投递简历.');
			return $this->redirect(array('controller'=>'Mainpage', 'action'=>'index'));
		}
		//设置页面静态数据
		$this->set('allSex',$this->List->allSex());
		$this->set('allPolitical',$this->List->allPolitical());
		$this->set('allSalary',$this->List->allSalary());
		$this->set('allWorkingType',$this->List->allWorkingType());
		$this->set('allWorkingTime',$this->List->allWorkingTime());
		$this->set('allEducational',$this->List->allEducational());
		$this->request->data=$resume;
		
		//若先前填写过内容则自动赋值
		if($this->request->data)
			$resume=$this->request->data;

		//写入简历数据并发送
		$this->request->data['Resume']['user_id']=$this->Auth->user('id');
		if($this->request->is(array('post','put'))&&$this->Resume->save($this->request->data))
		{
			if($this->EmailSender->sendResume($resume['Resume'], $recruitment['Recruitment']['email']))
			{
				$this->Session->setFlash('投递简历成功，请耐心等待公司回复');
				$this->redirect(array('controller'=>'Recruitments','action'=>'recruitment_list'));
			}
			else
			{
				$this->Session->setFlash('投递简历失败，请稍候再试');
			}
		}
	}

/*
	edited by GentleH
	查看简历，只有登录后的个人用户可查看自己的简历。
	若未填写，则跳转到简历编辑页面，提示填写简历。
	否则跳转到简历展示页面。
 */
	public function view_resumes() {

		$options = array('conditions'=>array('Resume.user_id'=>$this->Auth->user('id')));
		$this->set('resume',$resume=$this->Resume->find('first',$options));
		if(!$resume) {
			$this->Session->setFlash(__('简历尚未填写，请先填写简历'));
			return $this->redirect(array('controller'=>'Resumes','action'=>'edit_resumes'));
		}
	}

	/* End of edition by GentleH*/

	public function isAuthorized($user) {
		if(in_array($this->action,array('edit_resumes','view_resumes','post_resume')))
		{
			if($this->Auth->user('type') == '2')
				return true;
		}
		return parent::isAuthorized($user);
	}
}
