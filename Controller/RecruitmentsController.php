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
	public $helpers = array('Html','Form');
	public $components = array('Paginator','List', 'RecruitmentSearcher');
	public $uses = array('CompanyUserInfo','Recruitment');

/**
 * index method
 *
 * @return void
 */
	public function index($type = null) {
		$this->Recruitment->recursive = 0;
		if($type)
			$this->Paginator->settings = array('conditions' => array('Recruitment.status' => $type));
		$recruitments = $this->Paginator->paginate('Recruitment');
		$this->set('recruitments',$recruitments);
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
				$this->Session->setFlash(__('招聘数据保存成功'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('招聘数据保存失败，请重试！'));
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
 
 * @return void
 */
	public function delete($id = null) {
		$this->Recruitment->id = $id;
		if (!$this->Recruitment->exists()) {
			throw new NotFoundException(__('Invalid recruitment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recruitment->delete()) {
			$this->Session->setFlash(__('招聘信息删除成功'));
		} else {
			$this->Session->setFlash(__('招聘信息删除失败，请稍后再试'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/* edited by GentleH */

	/* 提交招聘，仅限公司用户 */
	public function recruitment_submit() {
		$this->set('title_for_layout', '招聘提交表单');
		if($this->Auth->user('type')!='1')
		{
			$this->Session->setFlash('您不是企业用户，无法编辑招聘信息');
			$this->redirect($this->referer());
		}
		if($this->request->is('post')) {
			$company = $this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.user_id'=>$this->Auth->user('id'))));
			$this->request->data['Recruitment']['status'] = '1';
			$this->request->data['Recruitment']['company_user_info_id'] = $company['CompanyUserInfo']['id'];
			if($this->Recruitment->save($this->request->data)) {
				$this->Session->setFlash(__('招聘已提交，请等待审核'));
				return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
			} else {
				$this->Session->setFlash(__('提交失败，请稍后重试'));
			}
		}
	}


	/* 招聘信息三级页面，所有用户均可查看 */
	public function recruitment_view($id = null) {
		$options = array('conditions' => array('Recruitment.' . $this->Recruitment->primaryKey => $id));
		$recruitment=$this->Recruitment->find('first',$options);
		if($recruitment!=null)
		{
		$this->set('recruitment',$recruitment);
		//增加该变量以供返回调用
		$this->set('referer', $this->referer());

		}
		else
		{
			$this->Session->setFlash('您访问的招聘信息不存在！');
			$this->redirect(array('controller'=>'Mainpage','action'=>'index'));
		}
	}

	/* 招聘信息二级页面，所有用户均可查看 */
	public function recruitment_list() {
		$this->set('recruitments',$this->RecruitmentSearcher->search());
	}

	public function isAuthorized($user) {
		if(in_array($this->action,array('recruitment_submit'))) {
			if($this->Auth->user('type') == '1')
				return true;
			else if($this->Auth->user('type') == '2') {
				$this->Session->setFlash(__('您当前不是企业用户，无法发布招聘信息，请注册企业用户'));
				return false;
			}
		}
		return parent::isAuthorized($user);
	}

	public function beforeFilter() {
		$this->set('title_for_layout', '首页>>招聘求职');
		$this->set('allSexs',$this->List->allSexs());
		$this->set('allEducational',$this->List->allEducational());
		$this->set('allWorkingType',$this->List->allWorkingType());
		$this->set('allProvince',$this->List->allProvince());
		$this->set('allStatus', $this->List->allStatus());
		$this->set('allMonth', $this->List->allMonth());
		$this->Auth->allow('recruitment_view','recruitment_list');
		parent::beforeFilter();
	}
}
