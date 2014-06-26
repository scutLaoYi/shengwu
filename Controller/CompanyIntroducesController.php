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
	public function index($status=null) {
		$this->CompanyIntroduce->recursive = 0;
		$option=array('conditions'=>array('CompanyIntroduce.id !='=>null));
		if($status)
			 $this->Paginator->settings = array('conditions'=>array('CompanyIntroduce.id !='=>null,'CompanyIntroduce.status'=>$status));
		else $this->Paginator->settings = array('conditions'=>array('CompanyIntroduce.id !='=>null));
		$companyIntroduces =  $this->Paginator->paginate();
		$this->set('companyIntroduces', $companyIntroduces);
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
				$this->Session->setFlash(__('修改成功'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('修改失败，请稍候再试'));
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
			$this->Session->setFlash(__('删除成功'));
		} else {
			$this->Session->setFlash(__('删除失败，请稍后再试'));
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
		$this->set('title_for_layout', '公司介绍提交表单');
		//判断用户类型
		if($this->Auth->user('type')!='1')
		{
			$this->Session->setFlash('您不是企业用户，无法编辑企业介绍');
			$this->redirect($this->referer());
		}
		//读取数据
		$this->CompanyUserInfo->recursive = 0;
		$company=$this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.user_id'=>$this->Auth->user('id'))));
		$this->CompanyIntroduce->recursive = 0;
		$companyIntroduce=$this->CompanyIntroduce->find('first',array('conditions'=>array('CompanyIntroduce.company_user_info_id'=>$company['CompanyUserInfo']['id'])));

		//前台传入更新数据
		if($this->request->is(array('post','put')))
		{
			$this->request->data['CompanyIntroduce']['company_user_info_id']=$company['CompanyUserInfo']['id'];
			
			//判断状态字,若为新记录,则设定为待审核
			//否则覆盖前台传入的id值防止恶意篡改
			if($companyIntroduce==null)
				$this->request->data['CompanyIntroduce']['status']='1';
			else
				$this->request->data['CompanyIntroduce']['id'] = $companyIntroduce['CompanyIntroduce']['id'];

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
			//图片处理结束

			//尝试保存数据
			if($this->CompanyIntroduce->save($this->request->data))
			{
				if($companyIntroduce==null)
				{
					$this->Session->setFlash('公司介绍已提交，等待管理员审核');
				}
				else
				{
					$this->Session->setFlash('公司修改成功');
				}
				return $this->redirect(array('controller'=>'CompanyDescriptions','action'=>'view_introduce',$company['CompanyUserInfo']['id']));
			}
			else
			{
				$this->Session->setFlash('公司介绍提交失败，请检查是否已经填写完整');
			}
		}
		else //前台页面写入原有数据
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
		$this->set('title_for_layout', '首页>>企业宣传');
		//静态数组
		$this->CompanyUserInfo->recursive=0;

		//若是post直接将参数回传并重新请求本页面
		if($this->request->is('post'))
		{
			$data = $this->request->data['CompanySearch'];
			return $this->redirect(array('controller'=>'CompanyIntroduces', 'action'=>'company_introduce_list', $data['Country'], $data['search']));
		}

		$options = array('CompanyIntroduce.id != '=>null);
		$options ['CompanyIntroduce.status'] = '2';
		if($str)
			$options['CompanyUserInfo.company LIKE'] = '%'.$str.'%';
		if($province)
			$options['CompanyUserInfo.province'] = ($province-1);
		$this->Paginator->settings=array('limit'=>10, 'conditions'=>$options,'order'=>array('CompanyIntroduce.created'=>'desc'));
		$this->set('companys', $this->Paginator->paginate());
		$this->set('head', '公司列表');
		//保持搜索框数据
		$this->request->data['CompanySearch']['Country'] = $province;
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
		$this->set('allStatus', $this->List->allStatus());
		$this->set('allCountrys',$this->List->allCountry());
		$this->set('nature',$this->List->companyEconomicNature());
		$this->set('number',$this->List->companyNumber());
		$this->set('allStatus',$this->List->allStatus());
		$this->set('allMonth',$this->List->allMonth());
		$this->Auth->allow('company_introduce_list');
		parent::beforeFilter();
	}
}
