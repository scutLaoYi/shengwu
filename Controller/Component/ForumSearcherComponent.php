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
	
	public function forum_lastest()
	{
		$this->Paginator->settings = array('limit'=>'5','order'=>array('Forum.created'=>'desc'));
		return $this->Paginator->paginate('Forum');
	}
}


