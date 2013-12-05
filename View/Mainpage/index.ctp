<div class="ad_background">
<div class="ad">
<?php
for($id = 0; $id < 40; $id++)
{
	if($advertise[$id]['AdList']['pic_url']=='ad_image/ad.png')
		echo $this->Html->image($advertise[$id]['AdList']['pic_url'], array('width' => '124','height'=>'100','url'=>array('controller'=>'Mainpage','action'=>'index')));
	else 
		echo $this->Html->image($advertise[$id]['AdList']['pic_url'], array('width' => '124','height'=>'100','url'=>array('controller'=>'CompanyDescriptions','action'=>'view_info',$advertise[$id]['AdList']['company_user_info_id'])));
		?>&nbsp;<?php
	if(($id+1) % 8 == 0)
	{
		echo '<br/>';
	}
}
?>
</div>
</div>

<!-- ------------infomations-------- -->

<div class="summary_message">
<ul class="summary" id="left">
	<li id="blue">公司介绍<a id="more_right">更多</a></li>
	<li><a>孙正扬</a></li>
	<li><a>蒋慧强</a></li>
	<li><a>林标标</a></li>
	<li><a>许瑞霖</a></li>
	<li><a>贺智超</a></li>
	<li><a>曾兵</a></li>
	<li><a>金龙存</a></li>
	<li><a>黄翰</a></li>
	<li><a>林连南</a></li>
</ul>

<ul class="summary" id="right">
	<li id="blue">招聘信息<a id="more_right">更多</a></li>
	<li><a>孙正扬</a></li>
	<li><a>蒋慧强</a></li>
	<li><a>林标标</a></li>
	<li><a>许瑞霖</a></li>
	<li><a>贺智超</a></li>
	<li><a>曾兵</a></li>
	<li><a>金龙存</a></li>
	<li><a>黄翰</a></li>
	<li><a>林连南</a></li>
</ul>
</div>

<div class="summary_message">
<ul class="summary" id="left">
	<li id="blue">代理信息<a id="more_right">更多</a></li>
	<li><a>孙正扬</a></li>
	<li><a>蒋慧强</a></li>
	<li><a>林标标</a></li>
	<li><a>许瑞霖</a></li>
	<li><a>贺智超</a></li>
	<li><a>曾兵</a></li>
	<li><a>金龙存</a></li>
	<li><a>黄翰</a></li>
	<li><a>林连南</a></li>
</ul>

<ul class="summary" id="right">
	<li id="blue">论坛<a id="more_right">更多</a></li>
	<li><a>孙正扬</a></li>
	<li><a>蒋慧强</a></li>
	<li><a>林标标</a></li>
	<li><a>许瑞霖</a></li>
	<li><a>贺智超</a></li>
	<li><a>曾兵</a></li>
	<li><a>金龙存</a></li>
	<li><a>黄翰</a></li>
	<li><a>林连南</a></li>
</ul>
</div>

<div class="ad_background">
<div class="ad">
<?php
for($id = 40; $id < 80; $id++)
{
	if($advertise[$id]['AdList']['pic_url']=='ad_image/ad.png')
		echo $this->Html->image($advertise[$id]['AdList']['pic_url'], array('width' => '124','height'=>'100','url'=>array('controller'=>'Mainpage','action'=>'index')));
	else 
		echo $this->Html->image($advertise[$id]['AdList']['pic_url'], array('width' => '124','height'=>'100','url'=>array('controller'=>'CompanyDescriptions','action'=>'view_info',$advertise[$id]['AdList']['company_user_info_id'])));
		?>&nbsp;<?php
	if(($id+1) % 8 == 0){
			echo '<br/>';
	}
}
?>
</div>
</div>
