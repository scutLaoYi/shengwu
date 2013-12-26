<?php

class Remark extends AppModel
{
	var $belongsTo=array
	(
		'User'=>array
			(
				'className'=>'User',
				'foreignKey'=>'user_id'
			),
		'Forum'=>array
			(
				'className'=>'Forum',
				'foreignKey'=>'forum_id'
			)
	);
var $validate=array
	(

	'message'=>array
        (
            'rule'=>array('between',1,300),
            'message'=>'帖子内容长度为1-300字'
        )


    );
}

?>
