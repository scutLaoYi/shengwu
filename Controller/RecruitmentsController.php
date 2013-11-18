<?php
App::uses('AppController', 'Controller');
/**
 * Recruitments Controller
 *
 * @property Recruitment $Recruitment
 * @property PaginatorComponent $Paginator
 */
class RecruitmentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Recruitment->recursive = 0;
		$this->set('recruitments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Recruitment->exists($id)) {
			throw new NotFoundException(__('Invalid recruitment'));
		}
		$options = array('conditions' => array('Recruitment.' . $this->Recruitment->primaryKey => $id));
		$this->set('recruitment', $this->Recruitment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recruitment->create();
			if ($this->Recruitment->save($this->request->data)) {
				$this->Session->setFlash(__('The recruitment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recruitment could not be saved. Please, try again.'));
			}
		}
		$companyUserInfos = $this->Recruitment->CompanyUserInfo->find('list');
		$this->set(compact('companyUserInfos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Recruitment->exists($id)) {
			throw new NotFoundException(__('Invalid recruitment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Recruitment->save($this->request->data)) {
				$this->Session->setFlash(__('The recruitment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recruitment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Recruitment.' . $this->Recruitment->primaryKey => $id));
			$this->request->data = $this->Recruitment->find('first', $options);
		}
		$companyUserInfos = $this->Recruitment->CompanyUserInfo->find('list');
		$this->set(compact('companyUserInfos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Recruitment->id = $id;
		if (!$this->Recruitment->exists()) {
			throw new NotFoundException(__('Invalid recruitment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recruitment->delete()) {
			$this->Session->setFlash(__('The recruitment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The recruitment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
