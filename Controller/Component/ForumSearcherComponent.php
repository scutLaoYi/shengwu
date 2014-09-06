<?php

App::uses('Component', 'Controller');
/*
 * Forum search engine.
 * post some args and return the result.
 * by scutLaoYi.
 */
class ForumSearcherComponent extends Component
{
	public $components = array('Paginator');
	
	public function forum_lastest($type, $subtype)
	{
		$options = array('Forum.type'=>$type, 'Forum.typesub'=>$subtype);
		$this->Paginator->settings = array('limit'=>'5', 'conditions'=>$options,'order'=>array('Forum.created'=>'desc'));
		return $this->Paginator->paginate('Forum');
	}
}


