<?php
App::uses('AppController', 'Controller');
/**
 * AdLists Controller
 *
 * @property AdList $AdList
 * @property PaginatorComponent $Paginator
 */
class RemarksController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	


	public function save($forum_id=null)
	{
	  if($this->request->is('post'))
	{	
		$this->request->data['Remark']['user_id']=$this->Auth->user('id');
		$this->request->data['Remark']['forum_id']=$forum_id;
		if($this->Remark->save($this->request->data))
		{
			$this->Session->setFlash('回复成功');
		}
		$this->redirect(array('controller'=>'Forums','action'=>'view',$forum_id));
	}
	}



	public function isAuthorized($user)
	{

		if(in_array($this->action,array('save')))
			return true;
		return parent::isAuthorized($user);
	}
}
