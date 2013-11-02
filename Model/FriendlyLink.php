<?php

class FriendlyLink extends AppModel
{
	var $validate=array
    (
        'link_name'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'链接名字不能为空'
        ),
        'link_url'=>array
        (
            'rule'=>'notEmpty',
             'message'=>'链接不能为空'
        )
    );
}

?>
