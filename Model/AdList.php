<?php

class AdList extends AppModel
{
	var $belongsTo=array
		(
			'CompanyUserInfo'=>array('CompanyUserInfo')
		);
 var $validate=array
    (
        'pic_url'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'ͼƬ����Ϊ��'
        )
    );
}

?>
