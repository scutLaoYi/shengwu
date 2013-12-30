<?php
App::uses('AdList', 'Model');

class AdListTest extends CakeTestCase
{
	public $fixtures = array('app.adList', 'app.companyUserInfo');

	public function setUp()
	{
		parent::setUp();
		$this->AdList = ClassRegistry::init('AdList');
	}

	public function testAdList()
	{
		//connection.
		$this->AdList->recursive = -1;
		$result = $this->AdList->find('count');
		$this->assertEquals(0, $result);



		//save some data.
		$data = array('AdList'=>array(
			'pic_url' => 'https://github.com/404.png', 
			'company_user_info_id' => '1', 
			'deadline' => '2013-11-15', 
		)
	);
		$this->AdList->create();
		$this->AdList->save($data);


		//check the data saved.
		$result = $this->AdList->find('first', array('conditions'=>array('company_user_info_id'=>'1')));
		$this->assertGreaterThan(0, count($result));
		$this->assertEqual('1', $result['AdList']['company_user_info_id']);


		//edit the data and flash.
		$result['AdList']['company_user_info_id'] = '2';
		$this->AdList->save($result);


		//check whether the old data are still exist.
		$result = $this->AdList->find('count', array('conditions'=>array('company_user_info_id'=>'1')));
		$this->assertEqual(0, $result);
		$result = $this->AdList->find('count', array('conditions'=>array('company_user_info_id'=>'2')));
		$this->assertGreaterThan(0, $result);


		//delete and check.
		$this->AdList->delete($result['AdList']['id']);
		$result = $this->AdList->find('count', array('conditions'=>array('company_user_info_id'=>'2')));
		$this->assertEqual(0, $result);
	}
}
?>
