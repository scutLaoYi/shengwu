<?php

class CompanyIntroduce extends AppModel
{
	var $belongsTo=array
		(
			'CompanyUserInfo'=>array('className'=>'CompanyUserInfo')
		);
	 var $validate=array
	(
		'company_user_infos_id'=>array
		(
			'unqiue'=>array
			(
				'rule'=>'isUnique',
				'on'=>'create',
				'message'=>'只能关联一个企业'
			)
		),
        'economic_nature'=>array
        (
            'rule'=>array('between',1,20),
            'message'=>'公司经济性长度不能超过20'
        ),      
        'business_type'=>array
        (
            'rule'=>array('between',1,20),
            'message'=>'公司经营模式长度不能超过20'
        ),      
        'legal_representative'=>array
        (
            'rule'=>array('between',1,10),
            'message'=>'法人代表不能超过10'
        ),      
        'business_scope'=>array
        (
			'rule'=>array('between',1,50),
            'message'=>'经营范围不能超过50'
        ),      
        'registered_capital'=>array
        (
            'rule'=>array('between',1,30),
            'message'=>'注册地区不能超过30'
        ),      
        'employees_number'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'员工人数不能为空'
        ),      
        'introduce'=>array
        (
            'rule'=>array('between',1,2000),
			'message'=>'公司介绍能超过2000',
			'allowEmpty'=>true
        )

    );
}

?>
