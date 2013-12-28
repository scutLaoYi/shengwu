<?php

App::uses('User','Model');

/*
 * 用户模型的测试
 * 测试增加、修改编辑、删除的功能是否正常
 * by scutLaoYi
 */
class UserTest extends CakeTestCase
{
	public $fixtures = array('app.user','app.forum', 'app.companyUserInfo', 'app.resume');

	/*
	 * 初始化，读取数据库表结构及模型结构
	 * 使用test数据库提供测试
	 */
	public function setUp()
	{
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

	/*
	 * 测试函数
	 * ------------
	 * 空表测试
	 * 单数据加入测试
	 * 数据读取测试
	 * 数据编辑更新写入测试
	 * 数据删除测试
	 */
	public function testUser()
	{
		//connection...
		$this->User->recursive = -1;
		$result = $this->User->find('count');
		$this->assertEquals(0,$result);

		//save some data...
		$data = array('User'=>array('username'=>'tester', 'password'=>'123456456', 'email'=>'tester@test.com', 'type' => '1'));
		$this->User->create();
		$this->User->save($data);

		//check the data saved.
		$result = $this->User->find('first', array('conditions'=>array('username'=>'tester')));
		$this->assertGreaterThan(0,count($result));
		$this->assertEqual('tester', $result['User']['username']);

		//edit the data and flash.
		$result['User']['username'] = 'tester001';
		$result['User']['password'] = 'tester123';
		$this->User->save($result);

		//check whether the user 'tester' still exist.
		$result = $this->User->find('count', array('conditions'=>array('username' => 'tester')));
		$this->assertEqual(0, $result);
		$result = $this->User->find('first', array('conditions'=>array('username' => 'tester001')));
		$this->assertEqual('tester001', $result['User']['username']);

		$this->User->delete($result['User']['id'], false);
		$result = $this->User->find('count', array('conditions'=>array('username' => 'tester001')));
		$this->assertEqual(0, $result);
	}
}
?>
