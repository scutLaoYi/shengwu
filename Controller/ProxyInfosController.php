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
	public $uses = array('CompanyUserInfo','ProxyInfo');
	public $components = array('Paginator','List', 'RequestHandler');
	public $helper = array('Js');

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

	/*
	 * 代理二级页面
	 * by scutLaoYi
	 * 挂载树状列表，将所有符合条件的代理信息列表显示
	 */
	public function proxy_list()
	{
		$allCountry = $this->List->allCountry();
		$this->set('allCountry', $allCountry);	
	}	

	public function fetch($province)
	{
/*		
 *		$this->ProxyInfo->recursive = 0;
		$data = $this->ProxyInfo->find('all', array('conditions'=>array('ProxyInfo.product_area ='=>$province)));
		$this->set('data', $data);
 */
		$this->ProxyInfo->recursive = 0;
		$this->Paginator->settings = array('conditions'=>array('ProxyInfo.id !='=>null, 'ProxyInfo.product_area = '=>$province));
		$this->set('proxyInfos', $this->Paginator->paginate('ProxyInfo'));

	}
		
	public function proxy_submit()
	{
		$allCountrys=$this->List->allCountry();
		$this->set('allCountrys',$allCountrys);
		$this->set('allMaterial',$this->List->allMaterial());
		$this->set('allProduct',$this->List->allProduct());
		if($this->request->is('post'))
		{
			$company=$this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.user_id'=>$this->Auth->user('id'))));
			if($company!=null)
			{
				$this->request->data['ProxyInfo']['company_user_info_id']=$company['CompanyUserInfo']['id'];
				$this->request->data['ProxyInfo']['status']='1';
				$file = $this->data['ProxyInfo']['proxy_image'];
				if($this->request->data['ProxyInfo']['product_type']!='3')
					$this->request->data['ProxyInfo']['material']='0';
				else if($this->request->data['ProxyInfo']['material']=='0')
				{
					$this->Session->setFlash('表单提交失败，请选择该产品所属卫生材料分类！');
					return ;
				}
				print_r($this->data['ProxyInfo']['product_type']);
				print_r($this->data['ProxyInfo']['function']);
				print_r($this->data['ProxyInfo']['department']);
				print_R($this->data['ProxyInfo']['material']);
				$ext=substr(strtolower(strrchr($file['name'],'.')),1);
				$arr_ext=array('jpg','jpeg','gif','png');
				$path=$this->Auth->user('username').'_'.date("YmdHis").'.'.$ext;
				if(in_array($ext,$arr_ext))
				{
					move_uploaded_file($file['tmp_name'],WWW_ROOT.'img/proxy_image/'.$path);
					$this->request->data['ProxyInfo']['picture_url']=$path;
				}
				if($this->ProxyInfo->save($this->request->data))
				{
					$this->Session->setFlash('代理信息已提交，等待管理员审核');
					
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
	}

	public function beforeFilter()
	{
		$this->Auth->allow('proxy_list', 'fetch');
		return parent::beforeFilter();
	}


	public function isAuthorized($user)
	{
		if($this->Auth->user('type')==1)
		{
			if(in_array($this->action,array('proxy_submit')))
			{
				return true;
			}
		}
		return parent::isAuthorized($user);
	}
}
