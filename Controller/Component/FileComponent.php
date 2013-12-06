<?php
App::uses('Controller','Component');
class FileComponent extends Component
{
	public function write($path,$content)
	{
		$file=new File($path,true,777);
		if($file->write($content))
		{
			$file->close();
			return true;
		}
		else
		{
			$file->close();
			return false;
		}
	
	}
	public function read($path)
	{	
		$file=new File($path,true,777);
		$content=$file->read();
		$file->close();
		return $content;
	}
}
?>
