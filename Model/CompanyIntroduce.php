<?php

class CompanyIntroduce extends AppModel
{
	var $belongsTo=array
		(
			'CompanyUserInfo'=>array('className'=>'CompanyUserInfo')
		);
	 var $validate=array
    (
        'economic_nature'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'公司经济性质不能为空'
        ),      
        'business_type'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'公司经营模式不能为空'
        ),      
        'legal_respresentative'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'法人代表不能为空'
        ),      
        'business_scope'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'经营范围不能为空'
        ),      
        'registered_capital'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'注册地区不能为空'
        ),      
        'employees_number'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'员工人数不能为空'
        ),      
        'introduce'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'公司介绍不能为空'
        )

    );
}

?>
