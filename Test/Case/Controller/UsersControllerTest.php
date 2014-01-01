<?php

class UsersControllerTest extends ControllerTestCase
{
	public $fixtures = array(
		'app.user',
		'app.forum', 
		'app.companyUserInfo', 
		'app.resume', 
		'app.adList', 
		'app.recruitment', 
		'app.proxyInfo',
		'app.companyIntroduce',
		'app.remark'
	);

	public function testIndex()
	{
		$this->testAction('/users/index', array('method'=>'GET'));
		$matcher = array(
			'id'=>'ad'
		);
		$this->assertTag($matcher, $this->view);
		$this->assertTag($matcher, '<html><p id="ad">Hello</p></html>');
	}
}

?>
