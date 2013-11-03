<?php

class Resume extends AppModel
{
	var $belongsTo=array
	(
		'User'=>array('User')
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
        'name'=>array
        (
            'rule'=>array('between',1,10),
             'message'=>'名字长度为（1-10）'
        ),
        'sex'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'性别不能为空'
        ),
        'age'=>array
        (
            'rule'=>'/^(?:[1-9][0-9]?|1[01][0-9]|120)$/',
             'message'=>'年龄输入格式错误，请输入数字年龄'
        ),
        'ethnic'=>array
        (
            'rule'=>array('between',1,10),
             'message'=>'民族长度为1-10'
        ),
        'hometown'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'籍贯不能为空'
        ),
        'political'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'政治面貌不能为空'
        ),
        'address'=>array
        (
          'rule'=>array('between',1,120),
             'message'=>'地址长度不正确，长度为1-120'
        ),
        'cellphone'=>array
        (
            'rule'=>array('custom','/((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)/'),
             'message'=>'电话格式不正确'
        ),
        'email'=>array
        (
            'rule'=>array('email',true),
            'message'=>'邮箱格式不正确'
        ),
        'code'=>array
        (
            'rule'=>array('custom','/^[0-9]{6}$/'),
            'message'=>'邮编格式不正确',
            'allowEmpty'=>true
        ),      
        'qq'=>array
        (
            'rule'=>array('custom','/^[0-9]{4,12}$/'),
            'message'=>'QQ格式不正确',
            'allowEmpty'=>true
        ),
        'salary'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'薪资要求不能为空'
        ),
        'work_type'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'工作类型不能为空'
        ),
        'post'=>array
        (
            'rule'=>array('between',1,100),
             'message'=>'寻求职位长度不正确，长度为1-100'
        ),
        'work_area'=>array
        (
            'rule'=>array('between',1,100),
             'message'=>'工作地点长度不正确，长度为1-100'
        ),
		'work_time'=>array
		(
		'rule'=>'notEmpty',
	      'message'=>'工作年限不能为空'
		),
        'institutions'=>array
        (
            'rule'=>array('between',1,30),
             'message'=>'毕业院校长度不正确，长度1-30'
        ),
        'graduation'=>array
        (
            'rule'=>'date',
             'message'=>'毕业时间格式不正确'
        ),
        'educational'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'学历不能为空'
        ),
		'profession'=>array
		(
	     'rule'=>array('maxLength',20),
	     'message'=>'长度不能超过20',
	     'allowEmpty'=>true
		),
		'foreign_language'=>array
		(
	     'rule'=>array('maxLength',20),
	     'message'=>'长度不能超过20',
	     'allowEmpty'=>true
		),
        'education_experience'=>array
        (
            'rule'=>array('between',1,600),
             'message'=>'教育经历长度不正确，最多不能超过600'
        ),
		'working_experience'=>array
		(
	     'rule'=>array('maxLength',600),
	     'message'=>'长度不能超过600',
	     'allowEmpty'=>true
		),
		'working_result'=>array
		(
	     'rule'=>array('maxLength',600),
	     'message'=>'长度不能超过600',
	     'allowEmpty'=>true
		),
		'professional_technique'=>array
		(
	     'rule'=>array('maxLength',600),
	     'message'=>'长度不能超过600',
	     'allowEmpty'=>true
		),
        'self_evaluate'=>array
        (
            'rule'=>array('between',1,600),
             'message'=>'自我评价长度不正确，最多不能超过600'
        )

    );
}

?>
