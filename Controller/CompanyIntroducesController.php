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
	public $helpers = array ('Html','Form');
	public $components = array('Paginator','List');
	public $uses = array('CompanyUserInfo','CompanyIntroduce');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CompanyIntroduce->recursive = 0;
		$this->Paginator->settings = array('conditions'=>array('CompanyIntroduce.id !='=>null));
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
	}
	public function company_introduce_edit() {
		if($this->Auth->user('type')!=1)
		{
			$this->Session->setFlash('您不是企业用户，无法编辑公司介绍');
			return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
		}
		$company=$this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.user_id'=>$this->Auth->user('id'))));
		$company_id=$company['CompanyUserInfo']['id'];
		$company_introduce=$this->CompanyIntroduce->find('first',array('conditions'=>array('company_user_info_id'=>$company_id)));
		if($company_introduce==null)
		{
			$this->Session->setFlash('您还未提交公司介绍,如需发布，请发布');
			return $this->redirect(array('action'=>'company_introduce_submit'));
		}
		$this->set('nature',$nature=$this->List->companyEconomicNature());
		$this->set('number',$number=$this->List->companyNumber());
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CompanyIntroduce->save($this->request->data)) {
 				$this->Session->setFlash(__('您的公司介绍已修改'));
			//	return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('修改失败，请检查是否完整填写'));
			}
		} else {
			$this->request->data = $company_introduce;
			if($this->request->data==null)
			{
				$this->Session->setFlash('您还未发布公司介绍！');
				return $this->redirect($this->referer());
			}
			$companyUserInfos = $this->CompanyIntroduce->CompanyUserInfo->find('list');
			$this->set(compact('companyUserInfos'));
		}
	}


	public function company_introduce_submit()
	{
		$company=$this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.user_id'=>$this->Auth->user('id')),
			'fields'=>array('CompanyUserInfo.id')));
		if($company!=null)
		{
			$content=$this->CompanyIntroduce->find('first',array('conditions'=>array('CompanyIntroduce.company_user_info_id'=>$company['CompanyUserInfo']['id'])));
			if($content!=null)
			{
				$this->Session->setFlash('您已经提交过公司介绍，如需修改，请于公司页面修改');
				return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
			}

		}
		$this->set('nature',$nature=$this->List->companyEconomicNature());
		$this->set('number',$number=$this->List->companyNumber());
		if($this->request->is('post'))
		{
			if($company!=null)
			{
			$company_id=$company['CompanyUserInfo']['id'];
			$this->request->data['CompanyIntroduce']['company_user_info_id']=$company_id;
			$this->request->data['CompanyIntroduce']['status']='1';
			$file = $this->data['CompanyIntroduce']['company_image'];
			$ext = substr(strtolower(strrchr($file['name'], '.')), 1);
			$arr_ext = array('jpg', 'jpeg', 'gif', 'png');
			$path=$this->Auth->user('username').'_'.date("YmdHis").'.'.$ext;
			if(in_array($ext, $arr_ext))
			{
				move_uploaded_file($file['tmp_name'],WWW_ROOT.'img/company_image/'.$path);
				$this->request->data['CompanyIntroduce']['picture_url']=$path;
			}
			if($this->CompanyIntroduce->save($this->request->data))
			{
				$this->Session->setFlash('公司介绍已提交，等待管理员审核');
			}
			else 
			{
				$this->Session->setFlash('公司介绍提交失败,请重试');
			}
			}
			else
			{
				$this->Session->SetFlash('您当前不是企业用户，不能发布企业介绍!');
			}
		}
	}
	public function company_introduce_list()
	{
		$this->Paginator->settings=array('limit'=>10,'order'=>array('CompanyIntroduce.created'=>'desc'),'conditions'=>array('CompanyIntroduce.id !='=>null));
		if($this->request->is('post'))
		{
			$this->Paginator->settings=array('conditions'=>array('CompanyUserInfo.company LIKE'=>'%'.$this->request->data['CompanySearch']['search'].'%'));
			$this->set('companys',$this->Paginator->paginate());
			$this->set('head',$this->request->data['CompanySearch']['search'].'公司列表');
		}
		else 
		{
		$this->set('companys',$this->Paginator->paginate());
		$this->set('head','所有公司列表');
		}
	}
	public function isAuthorized($user)
	{
		if(isset($user['type'])&&$user['type']==='1')
		{
			if(in_array($this->action,array('company_introduce_submit')))
				return true;
		}
		if($this->Auth->user('type')==2)
		{
			$this->Session->setFlash("您当前不是企业用户，无法发布企业信息，请注册企业用户！");
			return false;
		}
		return parent::isAuthorized($user);
	}
	public function beforeFilter()
	{
		$this->Auth->allow('company_introduce_list','company_introduce_edit');
		parent::beforeFilter();
	}
}
