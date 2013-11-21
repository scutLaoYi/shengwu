<?php

class Recruitment extends AppModel
{
	var $belongsTo=array
	(
		'CompanyUserInfo'=>array('className' => 'CompanyUserInfo')
	);
var $validate=array
    (
        'job_title'=>array
        (
            'rule'=>array('between',1,50),
             'message'=>'工作岗位长度为1-50'
        ),
        'number'=>array
        (
            'rule'=>array('custom','/^[0-9]*[1-9][0-9]*$/'),
             'message'=>'招聘人数为数字类型'
        ),
        'sex'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'性别要求不能为空'
        ),
        'age'=>array
        (
            'rule'=>array('maxLength',20),
			'message'=>'长度不能超过20',
			'allowEmpty'=>true
        ),
        'educational'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'学历要求不能为空'
        ),
        'working_type'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'工作类型要求不能为空'
        ),
        'working_time'=>array
        (
            'rule'=>array('maxLength',20),
			'message'=>'工作年限长度不能超过20',
			'allowEmpyu'=>true
        ),
        'working_area'=>array
        (
            'rule'=>array('between',1,50),
             'message'=>'工作地点长度不能超过50'
		 ),
		 'account_required'=>array
		 (
			 'rule'=>array('maxLength',20),
			 'message'=>'长度不能超过20',
			 'allowEmpty'=>true
		 ),
		 'language_required'=>array
		 (
			 'rule'=>array('maxLength',40),
			 'message'=>'长度不能超过40',
			 'allowEmpty'=>true
		 ),
        'salary'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'工资不能为空'
        ),
        'deadline'=>array
        (
            'rule'=>'date',
             'message'=>'时间格式不正确'
        ),
        'detail'=>array
        (
            'rule'=>array('between',1,500),
             'message'=>'岗位具体不能为空,长度为1-500'
        ),
        'email'=>array
        (
            'rule'=>array('email',true),
            'message'=>'邮箱格式不正确'
        ),
        'phone'=>array
        (
            'rule'=>array('custom','/((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)/'),
            'message'=>'号码格式不正确'
        )  
    );
}

?>
