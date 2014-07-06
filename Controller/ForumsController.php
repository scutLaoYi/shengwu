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
	public $components = array('Paginator','Picture','List',
		'Captcha'=>array('captchaType'=>'math',
			'jquerylib'=>true,
			'modelName'=>'User',
			'fieldName'=>'captcha')
	);
	public $uses = array('User','Forum','Remark');
	public $helper = array('Js');
	public function index()
	{
		$this->Forum->recursive=-1;
		$num_post=$this->Forum->find('all',array('fields'=>array('type','typesub','count(*)'),'group'=>array('type','typesub')));
		foreach($num_post as $post)
		{
			$num[$post['Forum']['type']][$post['Forum']['typesub']]=$post[0]['count(*)'];
		}
		$this->set('num',$num);
		$this->set('allDiscussions',$discussion=$this->List->allDiscussion());
		for($i=0;$i<8;$i++)
		{
			$secordDis[$discussion[$i]]=$this->List->allsecondDis($i);
		}
		$this->set('secordDis',$secordDis);
	}

	public function posting_list($type=null,$typesub=null)
	{
		
		if($type==null||$typesub==null||$this->List->checkSecondDis($type,$typesub)==false)
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
		$this->Paginator->settings = array('limit'=>'20','order'=>array('Forum.created'=>'desc'),'conditions'=>array('Forum.type'=>$type,'Forum.typesub'=>$typesub));
		$this->set('forums',$this->Paginator->paginate('Forum'));
		//管理员身份判断
			if($this->Auth->user('type')=='3')
				$isAdmin=true;
			else 
				$isAdmin=false;
			$this->set('isAdmin',$isAdmin);
	}
	public function posting($type,$typesub)
	{
		if($type==null||$typesub==null||$this->List->checkSecondDis($type,$typesub)==false)
		{
			$this->Session->setFlash('输入错误');
			$this->redirect(array('controller'=>'Forums','action'=>'index'));
		}
		if($this->request->is('post'))
		{
			if($this->Captcha->getVerCode() != $this->request->data['User']['captcha']){
				$this->Session->setFlash(__('验证码错误，请重试'));
			}
			else
			{
				$this->request->data['Forum']['message']=$this->request->data['Forum']['content'];
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
					$this->Session->setFlash('发帖失败，请检查是否填写完整');
				}
			}
		}
		$discussion=$this->List->allDiscussion();
		$second=$this->List->allsecondDis($type);
		$this->set('title',$discussion[$type]);
		$this->set('subtitle',$second[$typesub]);
		$this->set('type',$type);
		$this->set('typesub',$typesub);
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
			//管理员身份判断
			if($this->Auth->user('type')=='3')
				$isAdmin=true;
			else 
				$isAdmin=false;
			$this->set('isAdmin',$isAdmin);
		}
		else
		{
			$this->Session->setFlash('您访问的帖子不存在');
			$this->redirect(array('action'=>'index'));
		}
	}

	//删除评论 ，function deleteRemark
	public function deleteRemark($remark_id=null)
	{
		
		$this->Remark->id = $remark_id;
		if (!$this->Remark->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->Remark->delete()) {
			$this->Session->setFlash(__('评论删除成功'));
		} else {
			$this->Session->setFlash(__('评论删除失败，请稍后再试'));
		}
		return $this->redirect($this->referer());
	}
	//删除帖子，并把该贴所有评论一并删除
	public function deletePost($forum_id)
	{
		$this->Forum->id = $forum_id;
		if (!$this->Forum->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->Forum->delete()) {
			$this->Session->setFlash(__('帖子删除成功'));
		} else {
			$this->Session->setFlash(__('帖子删除失败，请稍后再试'));
		}
		return $this->redirect($this->referer());
	}
	public function beforeFilter()
	{

		$this->set('title_for_layout', '首页>>论坛交流');
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
