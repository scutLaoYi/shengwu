<?php

App::uses('CompanyUserInfo', 'Model');

/*
 * 公司用户的模型层测试
 * 测试增删改查
 * by scutLaoYi
 */

class CompanyUserInfoTest extends CakeTestCase
{
	public $fixtures = array('app.user', 'app.companyUserInfo', 
	'app.proxyInfo', 'app.recruitment', 'app.adList', 'app.companyIntroduce');

	/*
	 * 初始化
	 */
	public function setUp()
	{
		parent::setUp();
		$this->CompanyUserInfo = ClassRegistry::init('CompanyUserInfo');
	}

	public function testCompanyUserInfo()
	{
		//connection...
		$this->CompanyUserInfo->recursive = -1;
		$result = $this->CompanyUserInfo->find('count');
		$this->assertEquals(0,$result);

		//save some data...
		$data = array('CompanyUserInfo'=>array(
			'user_id'=>'1', 
			'company'=>'testCompany', 
			'contact_person'=>'testPerson',
			'contact_number' => '020-88888888',
			'tax' => '020-88888888',
			'province' => '0',
			'address' => '中文',
			'code' => '510006',
			'website' => 'http://www.baidu.com',
			'qq' => '532164656'
		)
		);
		$this->CompanyUserInfo->create();
		$this->assertNotNull($this->CompanyUserInfo->save($data));

		//check the data saved.
		$result = $this->CompanyUserInfo->find('first', array('conditions'=>array('company'=>'testCompany')));
		$this->assertGreaterThan(0,count($result));
		$this->assertEqual('testCompany', $result['CompanyUserInfo']['company']);

		//edit the data and flash.
		$result['CompanyUserInfo']['company'] = 'tester001';
		$this->assertNotNull($this->CompanyUserInfo->save($result));

		//check whether the user 'testCompany' still exist.
		$result = $this->CompanyUserInfo->find('count', array('conditions'=>array('company' => 'testCompany')));
		$this->assertEqual(0, $result);
		$result = $this->CompanyUserInfo->find('first', array('conditions'=>array('company' => 'tester001')));
		$this->assertEqual('tester001', $result['CompanyUserInfo']['company']);

		$this->CompanyUserInfo->delete($result['CompanyUserInfo']['id']);
		$result = $this->CompanyUserInfo->find('count', array('conditions'=>array('company' => 'tester001')));
		$this->assertEqual(0, $result);
	}
}
