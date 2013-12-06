<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * AdLists Controller
 *
 * @property AdList $AdList
 * @property PaginatorComponent $Paginator
 */
class AboutUsController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('File');
	public $helpers = array('Html','Form');
	/**
	 *know_us_view   了解我们视图，
	 */
	public function know_us_view()
	{
		$path=WWW_ROOT.'/files/know_us.txt';
		$content=$this->File->read($path);
		$this->set('content',$content);

	}
	/**
	 *know_us_edit  了解我们编辑，
	 */
	public function know_us_edit()
	{
		$path=WWW_ROOT.'/files/know_us.txt';
		if($this->request->is('post'))
		{
			if($this->File->write($path,$this->request->data['AboutUs']['content']))
			{
				$this->Session->setFlash('编辑了解我们成功');
				return $this->redirect(array('action'=>'know_us_view'));
			}
			else
			{
				$this->Session->setFlash('编辑了解我们失败，请稍后再试');
			}
		}
		$content=$this->File->read($path);
		$this->request->data['AboutUs']['content']=$content;

	}
	/**
	 *service_view  服务项目视图，
	 */
	public function service_view()
	{
		$path=WWW_ROOT.'/files/service.txt';
		$content=$this->File->read($path);
		$this->set('content',$content);
	}
	/**
	 *service_edit  服务项目编辑，
	 */
	public function service_edit()
	{
		$path=WWW_ROOT.'/files/service.txt';
		if($this->request->is('post'))
		{
			if($this->File->write($path,$this->request->data['AboutUs']['content']))
			{
				$this->Session->setFlash('编辑服务项目成功');
				return $this->redirect(array('action'=>'service_view'));
			}
			else
			{
				$this->Session->setFlash('编辑服务项目失败，请稍后再试');
			}
		}
		$content=$this->File->read($path);
		$this->request->data['AboutUs']['content']=$content;
	}

	/**
	 *legal_notice_view  法律声明视图，
	 */
	public function legal_notice_view()
	{
		$path=WWW_ROOT.'/files/legal_notice.txt';
		$content=$this->File->read($path);
		$this->set('content',$content);
	}
	/**
	 *legal_notice_edit  法律声明编辑，
	 */
	public function legal_notice_edit()
	{
		$path=WWW_ROOT.'/files/legal_notice.txt';
		if($this->request->is('post'))
		{
			if($this->File->write($path,$this->request->data['AboutUs']['content']))
			{
				$this->Session->setFlash('编辑法律声明成功');
				return $this->redirect(array('action'=>'legal_notice_view'));
			}
			else
			{
				$this->Session->setFlash('编辑法律声明失败，请稍后再试');
			}
		}
		$content=$this->File->read($path);
		$this->request->data['AboutUs']['content']=$content;
	}

	/**
	 *link_us_view  联系我们视图，
	 */
	public function link_us_view()
	{
		$path=WWW_ROOT.'/files/link_us.txt';
		$content=$this->File->read($path);
		$this->set('content',$content);
	}
	/**
	 *link_us_edit  联系我们编辑，
	 */
	public function link_us_edit()
	{
		$path=WWW_ROOT.'/files/link_us.txt';
		if($this->request->is('post'))
		{
			if($this->File->write($path,$this->request->data['AboutUs']['content']))
			{
				$this->Session->setFlash('编辑联系我们成功');
				return $this->redirect(array('action'=>'link_us_view'));
			}
			else
			{
				$this->Session->setFlash('编辑联系我们失败，请稍后再试');
			}
		}
		$content=$this->File->read($path);
		$this->request->data['AboutUs']['content']=$content;
	}

	/**
	 *friend_message_view  友情提示视图，
	 */
	public function friend_message_view()
	{	
		$path=WWW_ROOT.'/files/friend_message.txt';
		$content=$this->File->read($path);
		$this->set('content',$content);
	}
	/**
	 *friend_message_edit  友情提示编辑，
	 */
	public function friend_message_edit()
	{	
		$path=WWW_ROOT.'/files/friend_message.txt';
		if($this->request->is('post'))
		{
			if($this->File->write($path,$this->request->data['AboutUs']['content']))
			{
				$this->Session->setFlash('编辑友情提示成功');
				return $this->redirect(array('action'=>'friend_message_view'));
			}
			else
			{
				$this->Session->setFlash('编辑友情提示失败，请稍后再试');
			}
		}
		$content=$this->File->read($path);
		$this->request->data['AboutUs']['content']=$content;
	}

	/**
	 *ad_notice_view  广告位注意事项视图，
	 */
	public function ad_notice_view()
	{
		$path=WWW_ROOT.'/files/ad_notice.txt';
		$content=$this->File->read($path);
		$this->set('content',$content);
	}
	/**
	 *ad_notice_edit  广告位注意事项编辑，
	 */
	public function ad_notice_edit()
	{
		$path=WWW_ROOT.'/files/ad_notice.txt';
		if($this->request->is('post'))
		{
			if($this->File->write($path,$this->request->data['AboutUs']['content']))
			{
				$this->Session->setFlash('编辑广告位注意事项提示成功');
				return $this->redirect(array('action'=>'ad_notice_view'));
			}
			else
			{
				$this->Session->setFlash('编辑广告位注意事项失败，请稍后再试');
			}
		}
		$content=$this->File->read($path);
		$this->request->data['AboutUs']['content']=$content;
	}
	/**
	 *pre_know_us_view   前台了解我们视图，
	 */
	public function pre_know_us_view()
	{
		$path=WWW_ROOT.'/files/know_us.txt';
		$content=$this->File->read($path);
		$this->set('content',$content);

	}
	/**
	 *pre_service_view  前台服务项目视图，
	 */
	public function pre_service_view()
	{
		$path=WWW_ROOT.'/files/service.txt';
		$content=$this->File->read($path);
		$this->set('content',$content);
	}
	/**
	 *pre_legal_notice_view  前台法律声明视图，
	 */
	public function pre_legal_notice_view()
	{
		$path=WWW_ROOT.'/files/legal_notice.txt';
		$content=$this->File->read($path);
		$this->set('content',$content);
	}
	/**
	 *pre_link_us_view 前台联系我们视图，
	 */
	public function pre_link_us_view()
	{
		$path=WWW_ROOT.'/files/link_us.txt';
		$content=$this->File->read($path);
		$this->set('content',$content);
	}
	/**
	 *pre_friend_message_view  前台友情提示视图，
	 */
	public function pre_friend_message_view()
	{	
		$path=WWW_ROOT.'/files/friend_message.txt';
		$content=$this->File->read($path);
		$this->set('content',$content);
	}
	/**
	 *pre_ad_notice_view  前台广告位注意事项视图，
	 */
	public function pre_ad_notice_view()
	{
		$path=WWW_ROOT.'/files/ad_notice.txt';
		$content=$this->File->read($path);
		$this->set('content',$content);
	}
	/**
	 *beforeFilter  未登录用户允许访问关于我们视图，
	 */
	public function beforeFilter()
	{
		$this->Auth->allow('pre_know_us_view','pre_service_view','pre_legal_notice_view','pre_link_us_view','pre_friend_message_view','pre_ad_notice_view');
		return parent::beforeFilter();
	}
}
