<?php
App::uses('AppController', 'Controller');
/**
 * ProxyInfos Controller
 *
 * @property ProxyInfo $ProxyInfo
 * @property PaginatorComponent $Paginator
 */
class ProxyInfosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $helpers = array('Html','Form');
	public $uses = array('CompanyUserInfo','ProxyInfo');
	public $components = array('Paginator','List');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProxyInfo->recursive = 0;
		$this->Paginator->settings = array('conditions'=>array('ProxyInfo.id !='=>null));
		$this->set('proxyInfos', $this->Paginator->paginate('ProxyInfo'));

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProxyInfo->exists($id)) {
			throw new NotFoundException(__('Invalid proxy info'));
		}
		$options = array('conditions' => array('ProxyInfo.' . $this->ProxyInfo->primaryKey => $id));
		$this->set('proxyInfo', $this->ProxyInfo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProxyInfo->create();
			if ($this->ProxyInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The proxy info has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The proxy info could not be saved. Please, try again.'));
			}
		}
		$companyUserInfos = $this->ProxyInfo->CompanyUserInfo->find('list');
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
		if (!$this->ProxyInfo->exists($id)) {
			throw new NotFoundException(__('Invalid proxy info'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProxyInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The proxy info has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The proxy info could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProxyInfo.' . $this->ProxyInfo->primaryKey => $id));
			$this->request->data = $this->ProxyInfo->find('first', $options);
		}
		$companyUserInfos = $this->ProxyInfo->CompanyUserInfo->find('list');
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
		$this->ProxyInfo->id = $id;
		if (!$this->ProxyInfo->exists()) {
			throw new NotFoundException(__('Invalid proxy info'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProxyInfo->delete()) {
			$this->Session->setFlash(__('The proxy info has been deleted.'));
		} else {
			$this->Session->setFlash(__('The proxy info could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function proxy_submit($proxy_id=null)
	{
		$allCountrys=$this->List->allCountry();
		$this->set('allCountrys',$allCountrys);
		$this->set('allMaterial',$this->List->allMaterial());
		$this->set('allProduct',$this->List->allProduct());
		if($this->request->is(array('post','put')))
		{
			$company=$this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.user_id'=>$this->Auth->user('id'))));
			if($company!=null)
			{
				$this->request->data['ProxyInfo']['company_user_info_id']=$company['CompanyUserInfo']['id'];
				$this->request->data['ProxyInfo']['status']='1';
				$file = $this->request->data['ProxyInfo']['picture_url'];
				if($this->request->data['ProxyInfo']['product_type']!='3')
					$this->request->data['ProxyInfo']['material']='0';
				$ext=substr(strtolower(strrchr($file['name'],'.')),1);
				$arr_ext=array('jpg','jpeg','gif','png');
				$path=$this->Auth->user('username').'_'.date("YmdHis").'.'.$ext;
				if(in_array($ext,$arr_ext))
				{
					move_uploaded_file($file[ 'tmp_name'],WWW_ROOT.'img/proxy_image/'.$path);
					$this->request->data['ProxyInfo']['picture_url']=$path;
				}
				else
					$this->request->data['ProxyInfo']['picture_url']=null;
				if($this->ProxyInfo->save($this->request->data))
				{
					print_r($this->request->data);
					$this->Session->setFlash('代理信息已提交，等待管理员审核');
					return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
				}
				else
				{
					$this->Session->setFlash('代理信息提交失败，请检查表项是否已完整填写');
				}
				
			}
			else
			{
				$this->Session->setFlash('您当前不是企业用户，不能发布代理信息');
			}
		}
		else
		{
			if($proxy_id!=null)
			{
			$company=$this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.user_id'=>$this->Auth->user('id'))));
			$proxy=$this->ProxyInfo->find('first',array('conditions'=>array('ProxyInfo.id'=>$proxy_id)));
			if($company!=null&&$proxy!=null&&$company['CompanyUserInfo']['id']==$proxy['ProxyInfo']['company_user_info_id'])
			{
			$this->request->data=$proxy;
			$this->set('allFunction',$this->List->allFunction($this->request->data['ProxyInfo']['product_type']));
			$this->set('allDepartment',$this->List->allDepartment($this->request->data['ProxyInfo']['product_type']));

			}
			else
			{
			$this->Session->setFlash('您不是该代理信息拥有者，不能编辑该代理信息');
			return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
			}
				


			}
			
		}
	}
	public function proxy_view($proxy_id=null)
	{
		if($this->request->is('post'))
		{
			return $this->redirect($this->referer());
		}
		$proxy=$this->ProxyInfo->find('first',array('conditions'=>array('ProxyInfo.id'=>$proxy_id)));
		if($proxy!=null)
		{
			$company=$this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.id'=>$proxy['ProxyInfo']['company_user_info_id'])));
			$this->set('allCountry',$this->List->allCountry());
			$this->set('allProduct',$this->List->allProduct());
			$this->set('allFunction',$this->List->allFunction($proxy['ProxyInfo']['product_type']));
			$this->set('allDepartment',$this->List->allDepartment($proxy['ProxyInfo']['product_type']));
			if($proxy['ProxyInfo']['material']!='0')$this->set('allMaterial',$this->List->allMaterial());
			$this->set('proxyInfo',$proxy);
			$this->set('company',$company);
		}
		else
		{
			$this->Session->setFlash('该代理信息不存在');
			return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
		}
		
	}
	public function isAuthorized($user)
	{
		if($this->Auth->user('type')==1)
		{
			if(in_array($this->action,array('proxy_submit','proxy_edit')))
			{
				return true;
			}
		}
		return parent::isAuthorized($user);
	}
	public function beforeFilter()
	{
		$this->Auth->Allow('proxy_view');
		return parent::beforeFilter();
	}
}
