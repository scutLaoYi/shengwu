<?php

class FriendlyLink extends AppModel
{
	var $validate=array
    (
        'link_name'=>array
        (
            'rule'=>array('between',1,40),
             'message'=>'链接名字不能超过40'
        ),
        'link_url'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'链接不能为空'
        )
    );
}

?>
