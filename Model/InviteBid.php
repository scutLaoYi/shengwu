<?php

class InviteBid extends AppModel
{
	 var $validate=array
    (
        'content'=>array
        (
            'rule'=>'notEmpty',
            'message'=>'���ݲ���Ϊ��'
        )
    );
}

?>
