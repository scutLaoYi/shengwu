<?php
class FriendlyLinkTest extends CakeTestCase
{
	public $fixtures = array('app.friendlyLink');

	public function setUp()
	{
		parent::setUp();
		$this->FriendlyLink = ClassRegistry::init('FriendlyLink');
	}


	public function testFriendlyLink()
	{
		//connection.
		$this->FriendlyLink->recursive = -1;
		$result = $this->FriendlyLink->find('count');
		$this->assertEquals(0, $result);

		//save some data.
		$data = array('FriendlyLink'=>array(
			'link_name' => 'tester', 
			'link_url' => 'https://github.com', 
		)
	);
		$this->FriendlyLink->create();
		$this->FriendlyLink->save($data);

		//check the data saved.
		$result = $this->FriendlyLink->find('first', array('conditions'=>array('link_name'=>'tester')));
		$this->assertGreaterThan(0, count($result));
		$this->assertEqual('tester', $result['FriendlyLink']['link_name']);


		//edit the data and flash.
		$result['FriendlyLink']['link_name'] = 'tester123';
		$this->FriendlyLink->save($result);


		//check whether the old data are still exist.
		$result = $this->FriendlyLink->find('count', array('conditions'=>array('link_name'=>'tester')));
		$this->assertEqual(0, $result);
		$result = $this->FriendlyLink->find('count', array('conditions'=>array('link_name'=>'tester123')));
		$this->assertGreaterThan(0, $result);


		//delete and check.
		$this->FriendlyLink->delete($result['FriendlyLink']['id']);
		$result = $this->FriendlyLink->find('count', array('conditions'=>array('link_name'=>'tester123')));
		$this->assertEqual(0, $result);


	}}
?>
