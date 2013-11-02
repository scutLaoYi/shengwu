<?php

class InviteBid extends AppModel
{
	 var $validate=array
    (
        'content'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'内容不能为空'
        )
    );
}

?>
