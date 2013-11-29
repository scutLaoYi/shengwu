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
	public $components = array('Paginator','List','Picture');
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

	/***
	 *company_introduce_submit    lpp001负责 
	 *公司介绍页面提交和修改，提交成功转到公司三级页面
	 *若已经提交，转到三级页面修改处
	 *
	 */
	public function company_introduce_submit()
	{
		//判断用户类型
		if($this->Auth->user('type')!='1')
		{
			$this->Session->setFlash('您不是企业用户，无法编辑企业介绍');
			$this->redirect($this->referer());
		}
		$this->CompanyUserInfo->recursive = 0;
		$company=$this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.user_id'=>$this->Auth->user('id'))));
		$this->CompanyIntroduce->recursive = 0;
		$companyIntroduce=$this->CompanyIntroduce->find('first',array('conditions'=>array('CompanyIntroduce.company_user_info_id'=>$company['CompanyUserInfo']['id'])));
		if($this->request->is(array('post','put')))
		{
			$this->request->data['CompanyIntroduce']['company_user_info_id']=$company['CompanyUserInfo']['id'];
			//判断状态字
			if(!isset($this->request->data['CompanyIntroduce']['status']))
			$this->request->data['CompanyIntroduce']['status']='1';
			//处理图片
			$file = $this->data['CompanyIntroduce']['company_image'];
			$path='company_image/'.$this->Auth->user('username').'_'.date("YmdHis").'.';
			if($this->Picture->savePicture($file,$path))
			{
				$this->request->data['CompanyIntroduce']['picture_url']=$path;
			}
			else
			{
				
				if($companyIntroduce==null)
				{
					//第一次提交，并且图片为空
					$this->request->data['CompanyIntroduce']['picture']=null;
				}
				else
				{
					//修改公司介绍，但没有改变图片，图片设置为原来的图片
					$this->request->data['CompanyIntroduce']['picture']=$companyIntroduce['CompanyIntroduce']['picture_url'];

				}
			}
			if($this->CompanyIntroduce->save($this->request->data))
			{
 				$this->Session->setFlash('公司介绍已提交，等待管理员审核');
				return $this->redirect(array('controller'=>'CompanyDescriptions','action'=>'view_introduce',$company['CompanyUserInfo']['id']));
			}
			else
			{
				$this->Session->setFlash('公司介绍提交失败，请检查是否已经填写完整');
			}
		}
		else
		{
			if($companyIntroduce!=null)
			{
				$this->request->data=$companyIntroduce;
			}
		}
	
	}
	/**
	 *company_introduce_list   lpp001负责
	 *公司介绍2级列表
	 *支持公司名字搜索，还欠公司地区搜索，和介绍前100字
	 *点击公司名称跳到该公司三级页面
	 */ 
	public function company_introduce_list($province = null, $str = null)
	{

		//静态数组
		$allCountrys=$this->List->allCountry();
		$this->CompanyUserInfo->recursive=0;
		$this->set('allCountrys',$allCountrys);

		//若是post直接将参数回传并重新请求本页面
		if($this->request->is('post'))
		{
			$data = $this->request->data['CompanySearch'];
			return $this->redirect(array('controller'=>'CompanyIntroduces', 'action'=>'company_introduce_list', $data['allCountry'], $data['search']));
		}

		$options = array('CompanyIntroduce.id != '=>null);
		if($str)
			$options['CompanyUserInfo.company LIKE'] = '%'.$str.'%';
		if($province)
			$options['CompanyUserInfo.province'] = ($province-1);
		$this->Paginator->settings=array('limit'=>1, 'conditions'=>$options);
		$this->set('companys', $this->Paginator->paginate());
		$this->set('head', '公司列表');
		//保持搜索框数据
		$this->request->data['CompanySearch']['allCountry'] = $province;
		$this->request->data['CompanySearch']['search'] = $str;
	}
	/***
	 *isAuthorized      lpp001负责
	 *登录用户权限管理，企业用户和管理员可以进入公司介绍发布界面
	 *普通用户可以进入公司列表2级页面
	 */
	public function isAuthorized($user)
	{
		if(isset($user['type'])&&$user['type']==='1')
		{
			if(in_array($this->action,array('company_introduce_submit','company_introduce_edit')))
				return true;

		}
		if($this->Auth->user('type')==2)
		{
			$this->Session->setFlash("您当前不是企业用户，无法发布企业信息，请注册企业用户！");
			return false;
		}
		return parent::isAuthorized($user);
	}
	/***
	 *beforeFilter      lpp001负责
	 *未登录用户可以访问公司介绍2级列表
	 */
	public function beforeFilter()
	{
		$this->set('allCountrys',$this->List->allCountry());
		$this->set('nature',$nature=$this->List->companyEconomicNature());
		$this->set('number',$number=$this->List->companyNumber());
		$this->Auth->allow('company_introduce_list');
		parent::beforeFilter();
	}
}
