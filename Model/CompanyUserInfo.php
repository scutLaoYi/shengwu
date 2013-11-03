<?php 
class CompanyUserInfo extends AppModel
{
 var $belongsTo=array
        (
			'User'=>array
			(
				'className'=>'User',
				'foreignKey'=>'user_id'
			)
        );
    var $hasOne=array
        (
             'CompanyIntroduce'=>array('className'=>'CompanyIntroduce',)
        );
    var $hasMany=array
        (
            'ProxyInfo'=>array('className'=>'ProxyInfo',),
            'Recruitment'=>array('className'=>'Recruitment',),
            'AdList'=>array('className'=>'AdList',)
        );

   var $validate=array
    (
		'user_id'=>array
		(
			'unique'=>array
			(
				'rule'=>'isUnique',
				'on'=>'create',
				'message'=>'只能关联一个用户'
			)
		),
        'company'=>array
        (
            'rule'=>array('between',1,40),
            'message'=>'公司名格式错误（长度为1-40）'
        ),
        'contact_person'=>array
        (
            'rule'=>array('between',1,10),
            'message'=>'联系人格式错误（长度1-10）'
        ),      
        'contact_number'=>array
        (
	     'rule'=>array('custom','/((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)/'),
            'message'=>'联系人号码格式不正确'
        ),      
        'fax'=>array
        (
            'rule'=>array('custom','/((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)/'),
            'message'=>'传真号码格式不正确',
            'allowEmpty'=>true
        ),      
        'province'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'省份不能为空'
        ),      
        'address'=>array
        (
            'rule'=>array('between',1,120),
            'message'=>'地址不能为空'
        ),      
        'code'=>array
        (
            'rule'=>array('custom','/^[0-9]{6}$/'),
            'message'=>'邮编格式不正确'
        ),      
        'qq'=>array
        (
            'rule'=>array('custom','/^[0-9]{4,12}$/'),
            'message'=>'QQ格式不正确',
            'allowEmpty'=>true
        ),      
        'website'=>array
        (
			'rule'=>array('custom','/[a-zA-Z]+:\/\/[^\s]*/'),
            'message'=>'公司网站格式不正确',
            'allowEmpty'=>true
        )      
    );
}

?>
