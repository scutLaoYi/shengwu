<?php
App::uses('AppController', 'Controller');
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
	public $components = array('Paginator','Province');
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

	/*Edited by GentleH*/

	public function edit_resumes() {
		$this->set('allSex',$this->Province->allSex());
		$this->set('allPolitical',$this->Province->allPolitical());
		$this->set('allSalary',$this->Province->allSalary());
		$this->set('allWorkingType',$this->Province->allWorkingType());
		$this->set('allWorkingTime',$this->Province->allWorkingTime());
		$this->set('allEducational',$this->Province->allEducational());
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

	public function view_resumes() {
		$options = array('conditions'=>array('Resume.user_id'=>$this->Auth->user('id')));
		$this->set('resume',$resume=$this->Resume->find('first',$options));
		if(!$resume) {
			$this->Session->setFlash(__('简历尚未填写，请先填写简历'));
			return $this->redirect(array('controller'=>'Resumes','action'=>'edit_resumes'));
		}
	}

	public function isAuthorized($user) {
		if(in_array($this->action,array('edit_resumes','view_resumes')))
		{
			if($this->Auth->user('type') == '2')
				return true;
		}
	}
}
