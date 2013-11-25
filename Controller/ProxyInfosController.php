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
	 * 代理ajax数据读取函数
	 * by scutLaoYi
	 * 读取数据库筛选符合条件的代理信息并显示在ajax布局中
	 * 仅供ajax调用，直接访问弹出错误
	 * 
	 */
	public function proxy_list($province = null, 
								$type = null,
								$function = null,
								$department = null,
								$material = null)
	{
		if(!$this->request->is('ajax'))
			throw new NotFoundException('页面不存在！');
		//修改默认的布局，换ajax布局页面
		$this->layout = 'ajax';

		//创建sql筛选条件
		$options = array('ProxyInfo.id != '=>null);
		if($province)
			$options['ProxyInfo.product_area'] = $province; 
		if($type)
			$options['ProxyInfo.product_type'] = $type;
		if($function)
			$options['ProxyInfo.function'] = $function;
		if($department)
			$options['ProxyInfo.department'] = $department;
		if($material && $type == '3')
			$options['ProxyInfo.material'] = $material;

		//开始筛选条件并返回结果
		$this->ProxyInfo->recursive = 0;
		$this->Paginator->settings = array(
			'conditions'=>$options,
			'limit'=>5,
		);
		$this->set('proxyInfos', $this->Paginator->paginate('ProxyInfo'));
	}

	/*
	 * 代理二级页面
	 * by scutLaoYi
	 * 挂载选项框，使用javascript捕捉内容变动并用ajax传送筛选条件到proxy_list中，显示返回结果
	 */
	public function proxy_search()
	{
		$allCountry = $this->List->allCountry();
		$this->set('allCountrys', $allCountry);	
		$allProduct = $this->List->allProduct();
		$allProduct[0] = '全部';
		$this->set('allProduct', $allProduct);
	}
	/*
	 * 代理提交页面
	 * by lpp001
	 * 传入参数proxy_id则为更改
	 * 否则为新建
	 */
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

	/*
	 * 代理显示三级页面
	 * by lpp001
	 */
	public function proxy_view($proxy_id=null)
	{
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
			$this->set('referer', $this->referer());
		}
		else
		{
			$this->Session->setFlash('该代理信息不存在');
			return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
		}

	}

	/*
	 * 权限管理函数
	 * by scutLaoYi
	 * 未登录可访问代理二级、三级页面及ajax访问页面
	 */
	public function beforeFilter()
	{
		$this->Auth->allow('proxy_list', 'proxy_view','temp');
		return parent::beforeFilter();
	}


	/*
	 *isAuthorized函数
	 * by scutLaoYi
	 *公司用户可访问代理提交及代理编辑页面
	 */
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
}
