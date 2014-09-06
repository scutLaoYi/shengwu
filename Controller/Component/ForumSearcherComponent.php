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
		$cache_name = 'forum_'.$type.'_'.$subtype;
		$cache_config = 'mainpage';
		$result = Cache::read($cache_name, $cache_config);
		if(!$result)
		{
			debug('fuck');
			$options = array('Forum.type'=>$type, 'Forum.typesub'=>$subtype);
			$this->Paginator->settings = array('limit'=>'5', 'conditions'=>$options,'order'=>array('Forum.created'=>'desc'));
			$result = $this->Paginator->paginate('Forum');
			Cache::write($cache_name, $result, $cache_config);
		}
		return $result;
	}
}


