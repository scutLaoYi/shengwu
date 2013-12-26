<?php

class Forum extends AppModel
{
	var $belongsTo=array
	(
		'User'=>array
			(
				'className'=>'User',
				'foreignKey'=>'user_id'
			)
	);
	 var $hasMany=array
        (
            'Remark'=>array('className'=>'Remark','dependent'=>true)
        );
var $validate=array
	(

	'message'=>array
        (
            'rule'=>array('between',1,1000),
            'message'=>'帖子内容长度为1-1000字'
        ),
	'title'=>array
        (
            'rule'=>array('between',1,50),
            'message'=>'帖子标题长度为1-50字'
        )


    );
}

?>
