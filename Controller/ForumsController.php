<?php
App::uses('AppController', 'Controller');
/**
 * AdLists Controller
 *
 * @property AdList $AdList
 * @property PaginatorComponent $Paginator
 */
class ForumsController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator','Picture','List');
	public $uses = array('User','Forum','Remark');


	public function index()
	{
		$this->set('allDiscussions',$discussion=$this->List->allDiscussion());
		for($i=0;$i<8;$i++)
		{
			$secordDis[$discussion[$i]]=$this->List->allsecondDis($i);
		}
		$this->set('secordDis',$secordDis);
	}

	public function posting_list($type=null,$typesub=null)
	{
		if(!($type<8&&$this->List->checkSecondDis($type,$typesub)))
		{
			$this->Session->setFlash('输入错误');
			$this->redirect(array('controller'=>'Forums','action'=>'index'));
		}
		$discussion=$this->List->allDiscussion();
		$second=$this->List->allsecondDis($type);
		$this->set('title',$discussion[$type]);
		$this->set('subtitle',$second[$typesub]);
		$this->set('type',$type);
		$this->set('typesub',$typesub);
		$this->Paginator->settings = array('limit'=>'20','conditions'=>array('Forum.type'=>$type,'Forum.typesub'=>$typesub));
		$this->set('forums',$this->Paginator->paginate('Forum'));
	}
	public function posting($type,$typesub)
	{
		if(!($type<8&&$this->List->checkSecondDis($type,$typesub)))
		{
			$this->Session->setFlash('输入错误');
			$this->redirect(array('controller'=>'Forums','action'=>'index'));
		}
		if($this->request->is('post'))
		{
				$this->request->data['Forum']['type']=$type;	
				$this->request->data['Forum']['typesub']=$typesub;	
				$this->request->data['Forum']['user_id']=$this->Auth->user('id');	
				if($this->Forum->save($this->request->data))
				{
					$this->Session->setFlash('发帖成功');
					$this->redirect(array('action'=>'posting_list',$type,$typesub));
				}
				else
				{
					$this->Session->setFlash('发帖失败，请稍候再试');
				}

		}
	}
	public function view($id=null)
	{
		$forum=$this->Forum->find('first',array('conditions'=>array('Forum.id'=>$id)));
		if($forum)
		{
			$discussion=$this->List->allDiscussion();
			$second=$this->List->allsecondDis($forum['Forum']['type']);
			$this->set('title',$discussion[$forum['Forum']['type']]);
			$this->set('subtitle',$second[$forum['Forum']['typesub']]);
			$this->set('forum',$forum);
			$this->Paginator->settings = array('limit'=>'20','order'=>array('Remark.created'=>'asc'),'conditions'=>array('Remark.forum_id'=>$id));
			$this->set('remarks',$this->Paginator->paginate('Remark'));
		}
		else
		{
			$this->Session->setFlash('您访问的帖子不存在');
			$this->redirect(array('action'=>'index'));
		}
	}


	public function beforeFilter()
	{

		$this->Auth->allow('index','posting_list','view');
		return parent::beforeFilter();
	}
	public function isAuthorized($user)
	{
		if(in_array($this->action,array('posting')))
			return true;
		return parent::isAuthorized($user);
	}
}
