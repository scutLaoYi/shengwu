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
				'message'=>'不能为空'
			),       
			'business_type'=>array
			(
				'rule'=>'notEmpty',
				'message'=>'不能为空'
			),       
			'legal_respresentative'=>array
			(
				'rule'=>'notEmpty',
				'message'=>'不能为空'
			),       
			'business_scope'=>array
			(
				'rule'=>'notEmpty',
				'message'=>'不能为空'
			),       
			'registered_capital'=>array
			(
				'rule'=>'notEmpty',
				'message'=>'不能为空'
			),       
			'employees_number'=>array
			(
				'rule'=>'notEmpty',
				'message'=>'不能为空'
			),       
			'introduce'=>array
			(
				'rule'=>'notEmpty',
				'message'=>'不能为空'
			)
		);
}

?>
