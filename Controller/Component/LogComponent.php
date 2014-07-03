<?php

App::uses('Component', 'Controller');
/*
 * Log Component written by scutLaoYi
 * For system logging
 */
class LogComponent extends Component
{

	private function openFile()
	{
		$log_file_path = WWW_ROOT.'files/log.txt';
		if($fh = fopen($log_file_path, "a"))
		{
			return $fh;
		}
		return -1;
	}

	private function closeFile($fh)
	{
		fclose($fh);
		return;
	}

	public function writeLoginRecord($username, $type, $status)
	{
		$fh = $this->openFile();
		if($fh == -1)
		{
			return;
		}

		$log_string = date("Y/m/d h:i:sa")." username:".$username." type:".$type." status:".$status."\n";
		fwrite($fh, $log_string);
		$this->closeFile($fh);
		return;
	}
}
