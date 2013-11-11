<?php

App::uses('AuthComponent','Controller/Component');

class User extends AppModel
{
    var $hasOne=array
     (
		 'CompanyUserInfo'=>array
		 (
			 'className'=>'CompanyUserInfo',
		 ),
		 'Resume'=>array
		 (
			 'className'=>'Resume',
		 )
     );
   var $validate=array
    (
        'username'=>array
        (
            'username01'=>array
            (
                'rule'=>array('custom','/^[a-zA-Z][a-zA-Z0-9]{5,19}$/'),
                'message'=>'非法用户名(长度6-20位，由字母和数字组成，字母开头)'
            ),
            'unique'=>array
            (
                'rule'=>'isUnique',
                'on'=>'create',
                'message'=>'用户名已存在'
            )
        ),
        'password'=>array
        (
            'rule'=>array('between',6,20),
            'message'=>'密码长度不正确(6-20)'
        ),
        'email'=>array
        (
            'email'=>array
            (
                'rule'=>array('email',true),
                'message'=>'非法邮箱'
            ),
            'unique'=>array
            (
                'rule'=>'isUnique',
                'on'=>'create',
                'message'=>'邮箱已存在'
            )
        ),
        'type'=>array
        (
            'rule'=>array('custom','/[123]/'),
            'message'=>'枚举错误'
        )
	);

	public function beforeSave($options = array()) {
		if(isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
			return true;
		}
	}
}


?>
