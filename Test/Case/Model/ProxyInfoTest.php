<?php
class ProxyInfoTest extends CakeTestCase
{
	public $fixtures = array('app.proxyInfo', 'app.companyUserInfo');

	public function setUp()
	{
		parent::setUp();
		$this->ProxyInfo = ClassRegistry::init('ProxyInfo');
	}

	public function testProxyInfo()
	{
		//connection.
		$this->ProxyInfo->recursive = -1;
		$result = $this->ProxyInfo->find('count');
		$this->assertEquals(0, $result);

		//save some data.
		$data = array('ProxyInfo'=>array(
			'company_user_info_id' => '1', 
			'picture_url' => 'tester', 
			'product_name' => 'value', 
			'product_code' => 'value', 
			'product_area' => '1', 
			'product_unit' => 'value', 
			'product_introduce' => 'value', 
			'product_claim' => 'value', 
			'product_support' => 'value', 
			'phone' => '13570478503', 
			'qq' => '532164656', 
			'product_type' => '1', 
			'function' => '2', 
			'department' => '3', 
			'material' => '4', 
			'deadline' => '2013-12-15', 
			'status' => '1', 
			'endtime' => '2013-12-16', 
		)
	);
		$this->ProxyInfo->create();
		$this->ProxyInfo->save($data);


		//check the data saved.
		$result = $this->ProxyInfo->find('first', array('conditions'=>array('picture_url'=>'tester')));
		$this->assertGreaterThan(0, count($result));
		$this->assertEqual('tester', $result['ProxyInfo']['picture_url']);


		//edit the data and flash.
		$result['ProxyInfo']['picture_url'] = 'tester123';
		$this->ProxyInfo->save($result);


		//check whether the old data are still exist.
		$result = $this->ProxyInfo->find('count', array('conditions'=>array('picture_url'=>'tester')));
		$this->assertEqual(0, $result);
		$result = $this->ProxyInfo->find('count', array('conditions'=>array('picture_url'=>'tester123')));
		$this->assertGreaterThan(0, $result);


		//delete and check.
		$this->ProxyInfo->delete($result['ProxyInfo']['id']);
		$result = $this->ProxyInfo->find('count', array('conditions'=>array('picture_url'=>'tester123')));
		$this->assertEqual(0, $result);


	}}
?>
