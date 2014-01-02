<?php

App::uses('Component', 'Controller', 'CakeEmail', 'Network/Email');
/*
 * Email sender create by scutLaoYi
 */
class EmailSenderComponent extends Component
{

	public $components = array('List');
	/*
	 * function to send email with target, subject and message
	 */
	public function sendEmailTo($destination,$subject, $message, $picture = null)
	{
		$newEmail = new CakeEmail('gmail');
		$newEmail->from(array('biomatchina@126.com'=>'中国生物医学材料'));
		$newEmail->to($destination);
		$newEmail->subject($subject);
		//发图片用的
		if($picture)
		{
			debug(IMAGES.$picture['file']);
			//获取图片的后缀
			$pieces = explode('.', $picture['file']);
			debug($pieces[1]);
			//贴到附件里去，名字是pic.[后缀]
			$newEmail->attachments(array(
				'pic.'.$pieces[1]=>array(
					'file'=>IMAGES.$picture['file'],
					'contentId'=>$picture['contentId']
				)));
		}
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

	/*
	 * function sending a resume to the company's email address.
	 */
	public function sendResume($resume, $company_email)
	{
		//以防万一，在此加入特判：
		//检测到孙少帐号则取消邮件发送并返回失败...
		if($company_email == '532164656@qq.com')
		{
			debug("alert:szy's email address detected!");
			return false;
		}
		//-------------上面是debug代码---------------

		$allPolitical = $this->List->allPolitical();
		$allSalary = $this->List->allSalary();
		$allWorkingType = $this->List->allWorkingType();
		$allWorkingTime = $this->List->allWorkingTime();
		$allEducational = $this->List->allEducational();
		//--------------------------------------------
		$domain = 'http://127.0.0.1/';
		$subject = '中国生物医学材料帮您找人才';

		$picture = null;
		if($resume['picture_url'])
			$picture = array('file'=>$resume['picture_url'], 'contentId'=>'picId');

		$message = 
			"恭喜您！您在中国生物医学材料网发布的招聘信息得到了他人的回复！\n".
			"以下是简历信息：\n".
			"\n姓名:".$resume['name'].
			"\n性别:".($resume['sex'] ? '女':'男').
			"\n年龄:".$resume['age'].
			"\n民族:".$resume['ethnic'].
			"\n籍贯:".$resume['hometown'].
			"\n政治面貌:".$allPolitical[$resume['political']].
			"\n身高:".$resume['height'].
			"\n体重:".$resume['weight'].
			"\n住址:".$resume['address'].
			"\n电话:".$resume['cellphone'].
			"\n邮箱:".$resume['email'].
			"\n邮编:".$resume['code'].
			"\nQQ:".$resume['qq'].
			"\n薪水要求:".$allSalary[$resume['salary']].
			"\n工作方式:".$allWorkingType[$resume['working_type']].
			"\n寻求职位:".$resume['post'].
			"\n工作地点:".$resume['working_area'].
			"\n工作年限:".$allWorkingTime[$resume['working_time']].
			"\n毕业院校:".$resume['institutions'].
			"\n毕业时间:".$resume['graduation'].
			"\n教育程度:".$allEducational[$resume['educational']].
			"\n专业方向:".$resume['profession'].
			"\n外语水平:".$resume['foreign_language'].
			"\n教育经历:".$resume['education_experience'].
			"\n工作经历:".$resume['working_experience'].
			"\n工作业绩:".$resume['working_result'].
			"\n专业技能:".$resume['professional_technique'].
			"\n自我评价:".$resume['self_evaluate'].
			"\n该信息发自中国生物医学材料网:\n".
			$domain."cakephp/Mainpage/index";
		return $this->sendEmailTo($company_email,$subject,$message, $picture); 
	}
}
