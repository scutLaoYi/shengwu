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
		$this->request->data['Remark']['message']=$this->request->data['Remark']['content'];
		$this->request->data['Remark']['user_id']=$this->Auth->user('id');
		$this->request->data['Remark']['forum_id']=$forum_id;
		$this->Remark->recursive= -1;
		$maxLevel =	$this->Remark->find('first',array('conditions'=>array('Remark.forum_id'=>$forum_id),'fields'=>('Max(Remark.level) as maxLevel')));
		if($maxLevel)
		{
			$this->request->data['Remark']['level']=$maxLevel['0']['maxLevel']+1;
		}
		else
		{
			$this->request->data['Remark']['level']=1;
		}
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
