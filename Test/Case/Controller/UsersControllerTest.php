<?php

class UsersControllerTest extends ControllerTestCase
{
	public $fixtures = array('app.user','app.forum', 'app.companyUserInfo', 'app.resume');

	public function testIndex()
	{
		$result = $this->testAction('/users/index');
		debug($result);
	}
}

?>
