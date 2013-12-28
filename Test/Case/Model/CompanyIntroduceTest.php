<?php
class CompanyIntroduceTest extends CakeTestCase
{
	public $fixtures = array('app.companyUserInfo', 'app.companyIntroduce');

	public function setUp()
	{
		parent::setUp();
		$this->CompanyIntroduce = ClassRegistry::init('CompanyIntroduce');
	}


	public function testCompanyIntroduce()
	{
		//connection.
		$this->CompanyIntroduce->recursive = -1;
		$result = $this->CompanyIntroduce->find('count');
		$this->assertEquals(0, $result);

		//save some data.
		$data = array('CompanyIntroduce'=>array(
					'company_user_info_id' => '1', 
					'economic_nature' => 'value', 
					'business_type' => 'value', 
					'legal_representative' => 'value', 
					'business_scope' => 'value', 
					'registered_capital' => '1', 
					'employees_number' => '14', 
					'introduce' => 'value', 
					'picture_url' => 'value', 
					'status' => '1', 
					'endtime' => '2013-12-15', 
					)
				);
			$this->CompanyIntroduce->create();
		$this->CompanyIntroduce->save($data);

	//check the data saved.
	$result = $this->CompanyIntroduce->find('first', array('conditions'=>array('company_user_info_id'=>'1')));
	$this->assertGreaterThan(0, count($result));
	$this->assertEqual('1', $result['CompanyIntroduce']['company_user_info_id']);


	//edit the data and flash.
	$result['CompanyIntroduce']['company_user_info_id'] = '2';
	$this->CompanyIntroduce->save($result);


	//check whether the old data are still exist.
	$result = $this->CompanyIntroduce->find('count', array('conditions'=>array('company_user_info_id'=>'1')));
	$this->assertEqual(0, $result);
	$result = $this->CompanyIntroduce->find('count', array('conditions'=>array('company_user_info_id'=>'2')));
	$this->assertGreaterThan(0, $result);


	//delete and check.
	$this->CompanyIntroduce->delete($result['CompanyIntroduce']['id']);
	$result = $this->CompanyIntroduce->find('count', array('conditions'=>array('company_user_info_id'=>'2')));
	$this->assertEqual(0, $result);


}}
?>
