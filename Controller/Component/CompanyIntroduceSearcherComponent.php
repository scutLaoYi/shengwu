<?php

App::uses('Component', 'Controller');
/*
 * proxy search engine.
 * post some args and return the result.
 * by scutLaoYi.
 */
class CompanyIntroduceSearcherComponent extends Component
{
	public $components = array('Paginator');
	
	public function company_introduce_lastest()
	{
		$this->Paginator->settings = array('limit'=>'10','order'=>array('CompanyIntroduce.created'=>'desc'),'conditions'=>array('CompanyIntroduce.status'=>'2'));
		return $this->Paginator->paginate('CompanyIntroduce');
	}
}

