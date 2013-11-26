<?php

App::uses('Component', 'Controller', 'CakeEmail', 'Network/Email');
/*
 * Email sender create by scutLaoYi
 */
class EmailSenderComponent extends Component
{

	/*
	 * function to send email with target, subject and message
	 */
	public function sendEmailTo($destination,$subject, $message)
	{
		$newEmail = new CakeEmail('gmail');
		$newEmail->from(array('522623259@qq.com'=>'中国生物医学材料'));
		$newEmail->to($destination);
		$newEmail->subject($subject);
		if($newEmail->send($message))
			return True;
		else
			return False;
	}

	/*
	 * function sending a forget password email to a user.
	 * Read the security salt, connect to the username and time 
	 * to create a safe hash.
	 * then create a safe link for user to recover his password.
	 */
	public function sendFoundPassword($username, $user_email)
	{
		$domain = 'http://127.0.0.1/';
		//Create the safe hash. 
		$datetime = time();
		$salt = Configure::read('Security.salt');
		$str = $username.$datetime.$salt;
		$hash = AuthComponent::password($str);
		
		$subject = '中国生物医学材料网帮您找回密码';

		//-- all about the message...
		$message='亲爱的用户 '.$username.'：您好！

    您收到这封这封电子邮件是因为您 (也可能是某人冒充您的名义) 申请了一个新的密码。假如这不是您本人所申请, 请不用理会这封电子邮件, 但是如果您持续收到这类的信件骚扰, 请您尽快联络管理员。

    要使用新的密码, 请使用以下链接启用密码。
'.$domain.'cakephp/users/change_password/'.$username.'/'.$datetime.'/'.$hash.'
(如果无法点击该URL链接地址，请将它复制并粘帖到浏览器的地址输入框，然后单击回车即可。)
   
    注意:请您在收到邮件1个小时内使用，否则该链接将会失效。
    关注中国生物医学材料：'.$domain.'cakephp/Mainpage/index';

		//-- end of the message.

		
		return $this->sendEmailTo($user_email, $subject, $message); 

	}
}
