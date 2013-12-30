<?php
class InviteBidTest extends CakeTestCase
{
	public $fixtures = array('app.inviteBid');

	public function setUp()
	{
		parent::setUp();
		$this->InviteBid = ClassRegistry::init('InviteBid');
	}


	public function testInviteBid()
	{
		//connection.
		$this->InviteBid->recursive = -1;
		$result = $this->InviteBid->find('count');
		$this->assertEquals(0, $result);

		//save some data.
		$data = array('InviteBid'=>array(
			'content' => 'tester', 
		)
	);
		$this->InviteBid->create();
		$this->InviteBid->save($data);

		//check the data saved.
		$result = $this->InviteBid->find('first', array('conditions'=>array('content'=>'tester')));
		$this->assertGreaterThan(0, count($result));
		$this->assertEqual('tester', $result['InviteBid']['content']);


		//edit the data and flash.
		$result['InviteBid']['content'] = 'tester123';
		$this->InviteBid->save($result);


		//check whether the old data are still exist.
		$result = $this->InviteBid->find('count', array('conditions'=>array('content'=>'tester')));
		$this->assertEqual(0, $result);
		$result = $this->InviteBid->find('count', array('conditions'=>array('content'=>'tester123')));
		$this->assertGreaterThan(0, $result);


		//delete and check.
		$this->InviteBid->delete($result['InviteBid']['id']);
		$result = $this->InviteBid->find('count', array('conditions'=>array('content'=>'tester123')));
		$this->assertEqual(0, $result);


	}}
?>
