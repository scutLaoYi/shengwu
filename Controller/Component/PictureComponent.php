<?php
App::uses('Controller','Component');
class PictureComponent extends Component
{
	public function savePicture($file,&$path)
	{
		$ext = substr(strtolower(strrchr($file['name'],'.')),1);
		$arr_ext = array('jpg','jpeg','gif','png');
		if(in_array($ext,$arr_ext))
		{
			$path=$path.$ext;
			if(move_uploaded_file($file['tmp_name'],WWW_ROOT.'img/'.$path))
				return true;
			else return false;
		}
		else return false;
	}
}
?>
