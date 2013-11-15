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
	}}
