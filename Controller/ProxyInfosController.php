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
	public $components = array('Paginator','List', 'RequestHandler','Picture','ProxySearcher');
	public $helper = array('Js', 'Cache');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index($status = null) {
		$this->ProxyInfo->recursive = 0;
		$options = array('conditions'=>array('ProxyInfo.id !='=>null));
		if($status)
			$options['conditions']['ProxyInfo.status'] = $status;
		$this->Paginator->settings = $options;
		$proxyInfos= $this->Paginator->paginate('ProxyInfo');
		$this->set('proxyInfos',$proxyInfos);

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
				$this->Session->setFlash(__('保存成功'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('保存失败，请稍候再试'));
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
			$this->Session->setFlash(__('删除代理信息成功.'));
		} else {
			$this->Session->setFlash(__('删除失败，请稍后再试'));
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
								$material = null,
								$str = null)
	{
		//not a ajax request, reject! 
		if(!$this->request->is('ajax'))
			throw new NotFoundException('页面不存在！');
		
		//修改默认的布局，换ajax布局页面
		$this->layout = 'ajax';

		$result = $this->ProxySearcher->proxy_search($province, $type, $function, $department, $material, null,$str);

		$this->set('proxyInfos', $result);

	}

	/*
	 * 代理二级页面
	 * by scutLaoYi
	 * 挂载选项框，使用javascript捕捉内容变动并用ajax传送筛选条件到proxy_list中，显示返回结果
	 */
	public function proxy_search($type = null, $str = null)
	{
		$this->set('title_for_layout', '代理信息');
		//页面固定项
		$allCountry = $this->List->allCountry();
		$this->set('allCountrys', $allCountry);	
		$allProduct = $this->List->allProduct();
		$allProduct[0] = '全部';
		$this->set('allProduct', $allProduct);
		$this->set('allProvinces', $this->List->allCountry());
		$this->set('allProducts', $this->List->allProduct());

		//若搜索特定类型产品（在导航条选择），将选项框默认值更新
		if($type)
			$this->request->data['product_type'] = $type;
		if($str)
			$this->request->data['str'] = $str;
	}

	/*
	 * 代理提交页面
	 * by lpp001
	 * 传入参数proxy_id则为更改
	 * 否则为新建
	 */
	public function proxy_submit($proxy_id=null)
	{
		$this->set('title_for_layout', '公司代理产品提交');
		if($this->Auth->user('type')!='1')
		{
			$this->Session->setFlash('您不是企业用户，无法编辑代理信息');
			$this->redirect($this->referer());
		}
			$this->CompanyUserInfo->recursive= 0 ;
			$company=$this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.user_id'=>$this->Auth->user('id'))));
			$this->ProxyInfo->recursive = 0;
		$proxy=$this->ProxyInfo->find('first',array('conditions'=>array('ProxyInfo.id'=>$proxy_id)));
		//判断是否该代理的拥有者
		if($proxy!=null)
		{
			if($company['CompanyUserInfo']['id']!=$proxy['ProxyInfo']['company_user_info_id'])
			{
				$this->Session->setFlash('您没有权限编辑该代理信息');
				$this->redirect($this->referer());
			}	
		}
		//传入数据，保存数据
		if($this->request->is(array('post','put')))
		{
				$this->request->data['ProxyInfo']['company_user_info_id']=$company['CompanyUserInfo']['id'];
				if($proxy==null)
				{
					$this->request->data['ProxyInfo']['status']='1';
				}
				if($this->request->data['ProxyInfo']['product_type']!='3')
					$this->request->data['ProxyInfo']['material']='0';
				//图片上传 
				$file = $this->request->data['ProxyInfo']['picture_url'];
				$path='proxy_image/'.$this->Auth->user('username').'_'.date("YmdHis").'.';
				if($this->Picture->savePicture($file,$path))
				{
					$this->request->data['ProxyInfo']['picture_url']=$path;
				}
				else
				{
					if($proxy==null)
					{
						$this->request->data['ProxyInfo']['picture_url']=null;
					}
					else
					{
						$this->request->data['ProxyInfo']['picture_url']=$proxy['ProxyInfo']['picture_url'];
					}

				}
				//存档
				if($this->ProxyInfo->save($this->request->data))
				{
					if($proxy==null)
					{
						$this->Session->setFlash('代理信息已提交，等待管理员审核');
						return $this->redirect(array('controller'=>'Mainpage','action'=>'index'));
					}
					else
					{
						$this->Session->setFlash('代理信息修改成功！');
						return $this->redirect(array('controller'=>'ProxyInfos','action'=>'proxy_view',$proxy_id));
					}
				}
				else
				{
				 	$this->Session->setFlash('代理信息提交失败，请检查表项是否已完整填写');
					$this->set('allFunction',$this->List->allFunction($this->request->data['ProxyInfo']['product_type']));
					$this->set('allDepartment',$this->List->allDepartment($this->request->data['ProxyInfo']['product_type']));
				}

		}
		else
		{
			//请求页面并附带代理id，传回数据供修改
				//检测到该代理信息拥有者确实为当前用户,允 许更改，传回数据
				if($proxy!=null)
				{
					$this->request->data=$proxy;
					$this->set('allFunction',$this->List->allFunction($proxy['ProxyInfo']['product_type']));
					$this->set('allDepartment',$this->List->allDepartment($proxy['ProxyInfo']['product_type']));
				}
		}
	}

	/*
	 * 代理显示三级页面
	 * by lpp001
	 */
	public function proxy_view($proxy_id=null)
	{
		$this->ProxyInfo->recrusive = 0;
		$proxy=$this->ProxyInfo->find('first',array('conditions'=>array('ProxyInfo.id'=>$proxy_id)));
		if($proxy!=null)
		{
			$this->set('allFunction',$this->List->allFunction($proxy['ProxyInfo']['product_type']));
			$this->set('allDepartment',$this->List->allDepartment($proxy['ProxyInfo']['product_type']));
			$this->set('title_for_layout', $proxy['ProxyInfo']['product_name']);
			if($this->Auth->user('type')=='1')
			{
				$this->CompanyUserInfo->recursive = 0;
				$company=$this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.user_id'=>$this->Auth->user('id'))));
				if($company['CompanyUserInfo']['id']==$proxy['ProxyInfo']['company_user_info_id'])
				{
					$this->set('iscurrent',true);
				}
			}
			$this->set('proxyInfo',$proxy);
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
			$this->set('allCountrys',$this->List->allCountry());
			$this->set('allProduct',$this->List->allProduct());
			$this->set('allMaterial',$this->List->allMaterial());
			$this->set('allStatus', $this->List->allStatus());
			$this->set('allMonth', $this->List->allMonth());
		$this->Auth->allow('proxy_list', 'proxy_view','proxy_search');
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
		if($this->Auth->user('type')==2)
		{
			$this->Session->setFlash("您当前不是企业用户，无法发布代理信息，请注册企业用户！");
			return false;
		}
		return parent::isAuthorized($user);
	}
}
