<?php
class RecruitmentTest extends CakeTestCase
{
	public $fixtures = array('app.recruitment', 'app.companyUserInfo');

	public function setUp()
	{
		parent::setUp();
		$this->Recruitment = ClassRegistry::init('Recruitment');
	}


	public function testRecruitment()
	{
		//connection.
		$this->Recruitment->recursive = -1;
		$result = $this->Recruitment->find('count');
		$this->assertEquals(0, $result);

		//save some data.
		$data = array('Recruitment'=>array(
					'company_user_info_id' => '1', 
					'job_title' => 'tester', 
					'number' => '1500', 
					'sex' => 'value', 
					'age' => 'value', 
					'educational' => 'value', 
					'working_type' => 'value', 
					'working_time' => 'value', 
					'working_area' => '1', 
					'account_required' => 'value', 
					'language_acquired' => 'value', 
					'salary' => 'value', 
					'deadline' => '2013-12-15', 
					'detail' => 'value', 
					'email' => '53216465666@qq.com', 
					'phone' => '13570444444', 
					'status' => '1', 
					'endtime' => '2013-12-15', 

					)
						);
						$this->Recruitment->create();
		$this->Recruitment->save($data);

	//check the data saved.
	$result = $this->Recruitment->find('first', array('conditions'=>array('job_title'=>'tester')));
	$this->assertGreaterThan(0, count($result));
	$this->assertEqual('tester', $result['Recruitment']['job_title']);


	//edit the data and flash.
	$result['Recruitment']['job_title'] = 'tester123';
	$this->Recruitment->save($result);


	//check whether the old data are still exist.
	$result = $this->Recruitment->find('count', array('conditions'=>array('job_title'=>'tester')));
	$this->assertEqual(0, $result);
	$result = $this->Recruitment->find('count', array('conditions'=>array('job_title'=>'tester123')));
	$this->assertGreaterThan(0, $result);


	//delete and check.
	$this->Recruitment->delete($result['Recruitment']['id']);
	$result = $this->Recruitment->find('count', array('conditions'=>array('job_title'=>'tester123')));
	$this->assertEqual(0, $result);


}}
?>
