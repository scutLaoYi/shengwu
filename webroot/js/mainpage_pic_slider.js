/*
 * JavaScript function for picture slider
 * Author: scutlaoyi
 * Date: 2014-02-26
 */

var dir = '/cakephp/img/mainpage/';
var pic_amount = 4;

function swap_pic()
{
	var currentDate = new Date();
	var curpicindex = currentDate.getSeconds() % pic_amount;

	document.getElementById('slide_pic').src =
		dir+curpicindex+'.jpg';
	return;
}

function slider()
{
	var timer = setTimeout("swap_pic()", 4000);
	return;
}
