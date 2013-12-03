<?php
App::uses('AppController', 'Controller');
/**
 * InviteBids Controller
 *
 * @property InviteBid $InviteBid
 * @property PaginatorComponent $Paginator
 */
class InviteBidsController extends AppController {

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
		$this->InviteBid->recursive = 0;
		$this->set('inviteBids', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InviteBid->exists($id)) {
			throw new NotFoundException(__('Invalid invite bid'));
		}
		$options = array('conditions' => array('InviteBid.' . $this->InviteBid->primaryKey => $id));
		$this->set('inviteBid', $this->InviteBid->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InviteBid->create();
			if ($this->InviteBid->save($this->request->data)) {
				$this->Session->setFlash(__('The invite bid has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invite bid could not be saved. Please, try again.'));
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
		if (!$this->InviteBid->exists($id)) {
			throw new NotFoundException(__('Invalid invite bid'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->InviteBid->save($this->request->data)) {
				$this->Session->setFlash(__('The invite bid has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invite bid could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InviteBid.' . $this->InviteBid->primaryKey => $id));
			$this->request->data = $this->InviteBid->find('first', $options);
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
		$this->InviteBid->id = $id;
		if (!$this->InviteBid->exists()) {
			throw new NotFoundException(__('Invalid invite bid'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InviteBid->delete()) {
			$this->Session->setFlash(__('The invite bid has been deleted.'));
		} else {
			$this->Session->setFlash(__('The invite bid could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
