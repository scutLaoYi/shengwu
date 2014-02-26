/*
 * JavaScript function for picture slider
 * Author: scutlaoyi
 * Date: 2014-02-26
 */

var dir = 'img/mainpage_slider/';
var pic_amount = 4;
var pic_id = 'slide_pic';

function swap_pic()
{
	var currentDate = new Date();
	var curpicindex = currentDate.getSeconds() % pic_amount;

	document.getElementById(pic_id).src =
		dir+curpicindex+'.jpg';
	setTimeout("swap_pic()", 3000);
}

function slider()
{
	setTimeout("swap_pic()", 3000);
}
