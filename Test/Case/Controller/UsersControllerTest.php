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
		$this->testAction('/Mainpage/index', array('method'=>'GET', 'return'=>'contents'));
		$matcher = array(
			'id'=>'ad'
		);
//		$this->assertTag($matcher, $this->contents);
		$this->assertTag($matcher, '<html><p id="ad">Hello</p></html>');
	}
}

?>
