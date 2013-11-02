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
            'message'=>'不能为空'
        ),
        'contact_person'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'不能为空'
        ),       
        'contact_number'=>array
        (
            'rule'=>array('custom','/^[0-9][0-9\-]{6-13}[0-9]$/'),
            'message'=>'号码格式不正确'
        ),       
        'fax'=>array
        (
            'rule'=>array('custom','/^[0-9][0-9\-]{6-15}[0-9]$/'),
            'message'=>'传真号码格式不正确'
        ),       
        'province'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'不能为空'
        ),       
        'address'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'不能为空'
        ),       
        'code'=>array
        (
            'rule'=>array('custom','/^[0-9]{6}$/'),
            'message'=>'不能为空'
        ),       
        'qq'=>array
        (
            'rule'=>array('custom','/^[0-9]{4,12}$/'),
            'message'=>'不能为空'
        ),       
        'website'=>array
        (
            'rule'=>array('custom','/[a-zA-Z]+://[^\s]*/'),
            'message'=>'不能为空'
        )       
    );
}

?>
