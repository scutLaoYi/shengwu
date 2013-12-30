<?php
class ResumeTest extends CakeTestCase
{
	public $fixtures = array('app.resume', 'app.user');

	public function setUp()
	{
		parent::setUp();
		$this->Resume = ClassRegistry::init('Resume');
	}


	public function testResume()
	{
		//connection.
		$this->Resume->recursive = -1;
		$result = $this->Resume->find('count');
		$this->assertEquals(0, $result);

		//save some data.
		$data = array('Resume'=>array(
			'user_id' => '1', 
			'name' => 'value', 
			'sex' => 'value', 
			'age' => '18', 
			'ethnic' => '汉族', 
			'hometown' => 'value', 
			'political' => 'value', 
			'height' => '175', 
			'weight' => '85', 
			'picture_url' => 'value', 
			'address' => 'value', 
			'cellphone' => '13570444444', 
			'email' => '532164646@qq.com', 
			'code' => '510006', 
			'qq' => '532164646', 
			'salary' => 'value', 
			'working_type' => 'value', 
			'post' => 'value', 
			'working_area' => 'value', 
			'working_time' => 'value', 
			'institutions' => 'value', 
			'graduation' => '2013-12-15', 
			'educational' => 'value', 
			'profession' => 'value', 
			'foreign_language' => 'value', 
			'education_experience' => 'value', 
			'working_experience' => 'value', 
			'working_result' => 'value', 
			'professional_technique' => 'value', 
			'self_evaluate' => 'value', 
		)
	);
		$this->Resume->create();
		$this->Resume->save($data);


		//check the data saved.
		$result = $this->Resume->find('first', array('conditions'=>array('user_id'=>'1')));
		$this->assertGreaterThan(0, count($result));
		$this->assertEqual('1', $result['Resume']['user_id']);


		//edit the data and flash.
		$result['Resume']['user_id'] = '2';
		$this->Resume->save($result);


		//check whether the old data are still exist.
		$result = $this->Resume->find('count', array('conditions'=>array('user_id'=>'1')));
		$this->assertEqual(0, $result);
		$result = $this->Resume->find('count', array('conditions'=>array('user_id'=>'2')));
		$this->assertGreaterThan(0, $result);


		//delete and check.
		$this->Resume->delete($result['Resume']['id']);
		$result = $this->Resume->find('count', array('conditions'=>array('user_id'=>'2')));
		$this->assertEqual(0, $result);


	}}
?>
