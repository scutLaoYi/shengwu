/*
 * JavaScript function for picture slider
 * Author: scutlaoyi
 * Date: 2014-02-26
 */

var dir = 'img/mainpage_slider/';
var pic_amount = 5;
var pic_id = 'rollpic';
var time_out = 4000;

function swap_pic()
{
	var currentDate = new Date();
	var curpicindex = (currentDate.getSeconds()+7) % pic_amount;

	document.getElementById(pic_id).src = dir+curpicindex+'.png';
	setTimeout("swap_pic()", time_out);
}

function slider()
{
	setTimeout("swap_pic()", time_out);
}
