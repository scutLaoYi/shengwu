<?php

App::uses('Component', 'Controller');
/*
 * recruitment search engine
 * post some args and return the searching result.
 * by scutLaoYi
 */
class RecruitmentSearcherComponent extends Component
{
	public $components = array('Paginator');
	public function search($company_id = null)
	{
		$options = array('Recruitment.id !='=>null, 
			'Recruitment.status' => '2');
		if($company_id)
			$options['Recruitment.company_user_info_id'] = $company_id;

		$this->Paginator->settings = array('limit'=>10,'order'=>array('Recruitment.created'=>'desc'),'conditions'=>$options);
		return $this->Paginator->paginate('Recruitment');
	}
	public function search_lastest()
	{
		$this->Paginator->settings = array('limit'=>6,'order'=>array('Recruitment.created'=>'desc'),'conditions'=>array('Recruitment.status'=>'2'));
		return $this->Paginator->paginate('Recruitment');
	}
}	
