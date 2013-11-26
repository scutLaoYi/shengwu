<?php

App::uses('Component', 'Controller', 'CakeEmail', 'Network/Email');
class EmailSenderComponent extends Component
{

	public function sendEmailTo($destination,$subject, $message)
	{
		$newEmail = new CakeEmail('website_email');
		$newEmail->from(array(''))
	}
}
