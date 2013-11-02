<?php 
class CompanyUserInfo extends AppModel
{
 var $belongsTo=array
        (
            'User'=>array('className'=>'User',)
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
        'company'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'公司名不能为空'
        ),
        'contact_person'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'联系人不能为空'
        ),      
        'contact_number'=>array
        (
            'rule'=>array('custom','/^[0-9][0-9\-]{6-13}[0-9]$/'),
            'message'=>'联系人号码格式不正确'
        ),      
        'fax'=>array
        (
            'rule'=>array('custom','/^[0-9][0-9\-]{6-15}[0-9]$/'),
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
            'rule'=>'notEmpty',
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
            'rule'=>array('custom','/[a-zA-Z]+://[^\s]*/'),
            'message'=>'公司网站格式不正确',
            'allowEmpty'=>true
        )      
    );
}

?>
