<?php

App::uses('AppController', 'Controller');

class MainpageController extends AppController
{

	public $components = array('Paginator');
	public $uses = array('AdList');

	public function index()
	{
		$this->set('advertise', $this->AdList->find('all'));
		
	}

	public function beforeFilter(){
		$this->Auth->allow('index');
	}
}
