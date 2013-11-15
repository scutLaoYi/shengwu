<?php
App::uses('AppController', 'Controller');
/**
 * CompanyIntroduces Controller
 *
 * @property CompanyIntroduce $CompanyIntroduce
 * @property PaginatorComponent $Paginator
 */
class CompanyIntroducesController extends AppController {

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
		$this->CompanyIntroduce->recursive = 0;
		$this->set('companyIntroduces', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CompanyIntroduce->exists($id)) {
			throw new NotFoundException(__('Invalid company introduce'));
		}
		$options = array('conditions' => array('CompanyIntroduce.' . $this->CompanyIntroduce->primaryKey => $id));
		$this->set('companyIntroduce', $this->CompanyIntroduce->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CompanyIntroduce->create();
			if ($this->CompanyIntroduce->save($this->request->data)) {
				$this->Session->setFlash(__('The company introduce has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The company introduce could not be saved. Please, try again.'));
			}
		}
		$companyUserInfos = $this->CompanyIntroduce->CompanyUserInfo->find('list');
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
		if (!$this->CompanyIntroduce->exists($id)) {
			throw new NotFoundException(__('Invalid company introduce'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CompanyIntroduce->save($this->request->data)) {
				$this->Session->setFlash(__('The company introduce has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The company introduce could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CompanyIntroduce.' . $this->CompanyIntroduce->primaryKey => $id));
			$this->request->data = $this->CompanyIntroduce->find('first', $options);
		}
		$companyUserInfos = $this->CompanyIntroduce->CompanyUserInfo->find('list');
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
		$this->CompanyIntroduce->id = $id;
		if (!$this->CompanyIntroduce->exists()) {
			throw new NotFoundException(__('Invalid company introduce'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CompanyIntroduce->delete()) {
			$this->Session->setFlash(__('The company introduce has been deleted.'));
		} else {
			$this->Session->setFlash(__('The company introduce could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
