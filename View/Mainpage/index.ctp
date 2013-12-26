<div id="searchDiv">
			<?php echo $this->Form->create('search'); ?>
			<table>
			<tr>
				<td id="radioLength">
				<?php $options = array('company'=>'公司','proxy'=>'代理');
				  $attributes = array('legend'=>false,'value'=>'company');
				  echo $this->Form->radio('select',$options,$attributes);?>
				</td>
				<td id="inputLength">
				<?php echo $this->Form->input('content',array('label'=>'')) ?>
				</td>
			<td id="buttonLength">
			<?php echo $this->Form->end('搜索');?>
			</td>
			</tr>
			</table>
</div>
<div id="ad">
<?php
for($index = 0; $index < 5; $index++)
{
	$offset = $index*8; ?>
	<ul>
	<?php
	for($id = $offset; $id < $offset+8; $id++)
	{
		?>
		<li>
		<?php 
			if($advertise[$id]['AdList']['pic_url'] == 'ad_image/ad.png')
			{
				echo $this->Html->image($advertise[$id]['AdList']['pic_url'],array('width'=>'122','height'=>'100','url'=>array('controller'=>'AboutUs','action'=>'pre_ad_notice_view')));
			}
			else
			{
				echo $this->Html->image($advertise[$id]['AdList']['pic_url'],array('width'=>'122','height'=>'100','url'=>array('controller'=>'CompanyDescriptions','action'=>'view_info',$advertise[$id]['AdList']['company_user_info_id'])));
			}
		?>
		</li>
		<?php
	}
	?>
	</ul>
	<?php
}
?>
</div>


<!-- ------------infomations-------- -->

<div class="summary_message">
<ul id="left">
<li id="topForMore">公司介绍<a id="more_right"><?php echo $this->Html->link('更多',array('controller'=>'CompanyIntroduces','action'=>'company_introduce_list'));?></a></li>
<?php foreach($company_introduces as $company_introduce):?>

<li><a><?php echo $this->Html->link($company_introduce['CompanyUserInfo']['company'],array('controller'=>'CompanyDescriptions','action'=>'view_info',$company_introduce['CompanyUserInfo']['id']));?></a></li>
<?php endforeach;?>
</ul>

<ul id="right">
<li id="topForMore">招聘信息<a id="more_right"><?php echo $this->Html->link('更多',array('controller'=>'Recruitments','action'=>'recruitment_list'));?></a></li>
	<?php foreach($recruitments as $recruitment):?>
	<li><a><?php echo $this->Html->link($recruitment['Recruitment']['job_title'].' '.$recruitment['CompanyUserInfo']['company'],array('controller'=>'Recruitments','action'=>'recruitment_view',$recruitment['Recruitment']['id']));?></a></li>
<?php endforeach;?>
</ul>
</div>

<div class="summary_message">
<ul id="left">
<li id="topForMore">代理信息<a id="more_right"><?php echo $this->Html->link('更多',array('controller'=>'ProxyInfos','action'=>'proxy_search'));?></a></li>
	<?php foreach($proxys as $proxy):?>
	<li><a><?php echo $this->Html->link($proxy['ProxyInfo']['product_name'].' '.$proxy['CompanyUserInfo']['company'],array('controller'=>'ProxyInfos','action'=>'proxy_view',$proxy['ProxyInfo']['id']));?></a></li>
<?php endforeach;?>

</ul>

<ul id="right">
<li id="topForMore">论坛交流<a id="more_right"><?php echo $this->Html->link('更多',array('controller'=>'Forums','action'=>'index'));?></a></li>
<?php foreach($forums as $forum):?>

<li><a><?php echo $this->Html->link($forum['Forum']['title'],array('controller'=>'Forums','action'=>'view',$forum['Forum']['id']));?></a></li>
<?php endforeach;?>
</ul>
</div>


<div id="ad">
<!--<?php
for($id = 40; $id < 80; $id++)
{
	if($advertise[$id]['AdList']['pic_url']=='ad_image/ad.png')
		echo $this->Html->image($advertise[$id]['AdList']['pic_url'], array('width' => '124','height'=>'100','url'=>array('controller'=>'AboutUs','action'=>'pre_ad_notice_view')));
	else 
		echo $this->Html->image($advertise[$id]['AdList']['pic_url'], array('width' => '124','height'=>'100','url'=>array('controller'=>'CompanyDescriptions','action'=>'view_info',$advertise[$id]['AdList']['company_user_info_id'])));
		?>&nbsp;<?php
	if(($id+1) % 8 == 0){
			echo '<br/>';
	}
}

?>-->
</div>


