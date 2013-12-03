<?php
App::uses('AppController', 'Controller');
/**
 * AdLists Controller
 *
 * @property AdList $AdList
 * @property PaginatorComponent $Paginator
 */
class AdListsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Picture','List');
	public $uses = array('User','AdList','CompanyUserInfo');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AdList->recursive = 0;
		$this->set('adLists', $this->Paginator->paginate('AdList'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AdList->exists($id)) {
			throw new NotFoundException(__('Invalid ad list'));
		}
		$options = array('conditions' => array('AdList.' . $this->AdList->primaryKey => $id));
		$this->set('adList', $this->AdList->find('first', $options));
	}


/**
 * edit by lpp001
 * 添加广告位，输入广告位位置，图片，用户名，截至时间
 *
 *
 */
	public function edit($id = null) {
		if($this->request->is('post'))
		{
			//判断用户类型
			$this->User->recursive = 0;
			$user=$this->User->find('first',array('conditions'=>array('User.username'=>$this->request->data['AdList']['username'])));
				if($user!=null&&$user['User']['type']=='1')
				{
					//获取企业用户id
					$this->CompanyUserInfo->recursive = 0;
					$company=$this->CompanyUserInfo->find('first',array('conditions'=>array('CompanyUserInfo.user_id'=>$user['User']['id'])));
					$this->request->data['AdList']['company_user_info_id']=$company['CompanyUserInfo']['id'];
					$this->request->data['AdList']['id']=$id;
					//处理图片
					$file=$this->request->data['AdList']['pic_url'];
					$path='ad_image/'.$user['User']['username'].'_'.date("YmdHis").'.';
					if($this->Picture->savePicture($file,$path))
					{
						$this->request->data['AdList']['pic_url']=$path;
						if($this->AdList->save($this->request->data))
						{
							$this->Session->setFlash('添加广告位成功');
							return $this->redirect(array('controller'=>'AdLists','action'=>'index'));
						}
						else
						{
							$this->Session->setFlash('添加广告位失败');
						}
					}
					else
					{
						$this->Session->setFlash('图片上传失败');
					}
				}
				else
				{
					$this->Session->setFlash('该用户不是企业用户，不能提交广告位');

				}
		}
	
	}

/**
 * delete by lpp001
 * 将该广告位复原为默认图片，输入广告位id
 */
	public function delete($id = null) {
		$recover['id'] = $id;
		$recover['pic_url']='ad_image/ad.png';
		$recover['deadline']='2050-01-01';
		$recover['company_user_info_id']='0';
		$this->request->onlyAllow('post', 'delete');
		if ($this->AdList->save($recover)) {
			$this->Session->setFlash(__('恢复成功'));
		} else {
			$this->Session->setFlash(__('恢复失败，请稍后再试'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
