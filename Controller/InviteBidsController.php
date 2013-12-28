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
				$this->Session->setFlash(__('招标信息添加成功'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('招标信息添加失败，请稍后再试'));
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
				$this->Session->setFlash(__('修改成功'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('修改失败'));
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
			$this->Session->setFlash(__('删除成功'));
		} else {
			$this->Session->setFlash(__('删除失败，请稍候再试'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function invite_bid_list()
	{
		$this->set('title_for_layout', '招标中标');
		$this->InviteBid->recursive = 0;
		$this->Paginator->settings = array('limit'=>'10','order'=>array('InviteBid.created'=>'desc'));
		$this->set('inviteBids', $this->Paginator->paginate());
	}

	public function beforeFilter()
	{
		$this->Auth->allow('invite_bid_list');
		return parent::beforeFilter();
	}
}
