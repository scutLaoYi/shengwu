<?php
App::uses('AppController', 'Controller');
/**
 * FriendlyLinks Controller
 * by scutLaoYi
 *
 * @property FriendlyLink $FriendlyLink
 * @property PaginatorComponent $Paginator
 */
class FriendlyLinksController extends AppController {

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
		$this->FriendlyLink->recursive = 0;
		$this->set('friendlyLinks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FriendlyLink->exists($id)) {
			throw new NotFoundException(__('Invalid friendly link'));
		}
		$options = array('conditions' => array('FriendlyLink.' . $this->FriendlyLink->primaryKey => $id));
		$this->set('friendlyLink', $this->FriendlyLink->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FriendlyLink->create();
			if ($this->FriendlyLink->save($this->request->data)) {
				$this->Session->setFlash(__('新建链接成功'));
				Cache::clear(false, 'mainpage');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('新建链接失败，请稍后再试'));
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
		if (!$this->FriendlyLink->exists($id)) {
			throw new NotFoundException(__('Invalid friendly link'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FriendlyLink->save($this->request->data)) {
				$this->Session->setFlash(__('链接修改成功'));
				Cache::clear(false, 'mainpage');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('链接修改失败，请稍后再试'));
			}
		} else {
			$options = array('conditions' => array('FriendlyLink.' . $this->FriendlyLink->primaryKey => $id));
			$this->request->data = $this->FriendlyLink->find('first', $options);
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
		$this->FriendlyLink->id = $id;
		if (!$this->FriendlyLink->exists()) {
			throw new NotFoundException(__('Invalid friendly link'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FriendlyLink->delete()) {
			$this->Session->setFlash(__('链接删除成功'));
			Cache::clear(false, 'mainpage');
		} else {
			$this->Session->setFlash(__('链接删除失败，请稍后再试'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/*
 * 友情链接数据获取函数
 * 此函数读数据库并将友情链接作为数组返回,只供模块调用，无前台界面
 */
	public function list_link()
	{
		if(empty($this->request->params['requested']))
		{
			//非法url,直接访问该页面，返回异常
			throw new ForbiddenException();
		}
		$linkArray = Cache::read('friendly_link', 'mainpage');
		if(!$linkArray)
		{
			debug('friendly link cache miss!');
			$linkArray = $this->FriendlyLink->find('all');
			Cache::write('friendly_link', $linkArray, 'mainpage');
		}
		return $linkArray;
		
	}

	/*
	 * 权限管理
	 * 所有人均可访问友情链接数据
	 * (供其他页面调用，不作权限设定)
	 */
	public function beforeFilter(){
		$this->Auth->allow('list_link');
		parent::beforeFilter();
	}
}
