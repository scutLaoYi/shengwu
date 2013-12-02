<?php
App::uses('AppController', 'Controller');
/**
 * AdLists Controller
 *
 * @property AdList $AdList
 * @property PaginatorComponent $Paginator
 */
class AdListsController extends AppController {

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
		$this->AdList->recursive = 0;
		$this->set('adLists', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AdList->exists($id)) {
			throw new NotFoundException(__('Invalid ad list'));
		}
		$options = array('conditions' => array('AdList.' . $this->AdList->primaryKey => $id));
		$this->set('adList', $this->AdList->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AdList->create();
			if ($this->AdList->save($this->request->data)) {
				$this->Session->setFlash(__('The ad list has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ad list could not be saved. Please, try again.'));
			}
		}
		$companyUserInfos = $this->AdList->CompanyUserInfo->find('list');
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
		if (!$this->AdList->exists($id)) {
			throw new NotFoundException(__('Invalid ad list'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AdList->save($this->request->data)) {
				$this->Session->setFlash(__('The ad list has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ad list could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AdList.' . $this->AdList->primaryKey => $id));
			$this->request->data = $this->AdList->find('first', $options);
		}
		$companyUserInfos = $this->AdList->CompanyUserInfo->find('list');
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
		$this->AdList->id = $id;
		if (!$this->AdList->exists()) {
			throw new NotFoundException(__('Invalid ad list'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AdList->delete()) {
			$this->Session->setFlash(__('The ad list has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ad list could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
