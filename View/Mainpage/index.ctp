<div id="rollDiv">
<?php ?>
<img id="rollpic" src="img/mainpage_slider/0.png">
</img>
</div>
<!-- JavaScript for rollDiv -->
<?php echo $this->Html->script("mainpage_pic_slider");?>
				  <script>
				  window.onload=function(){
					  slider();
				  }
				  </script>
<!-- end of js for rollDiv -->
<div class="msg_box">
<div class="msg_box_left">
	<div id="message_box_company">
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'CompanyIntroduces','action'=>'company_introduce_list'));?>
		</span>
	</div>

	<div class="summary_message">
	<ul id="left">
<?php foreach($company_introduces as $company_introduce):?>
	<li>
		<?php echo $this->Html->link($company_introduce['CompanyUserInfo']['company'],array('controller'=>'CompanyDescriptions','action'=>'view_info',$company_introduce['CompanyUserInfo']['id']));?>
	</li>
<?php endforeach;?>
	</ul>
	</div>
</div>

<div class="msg_box_right">
	<div id="message_box_xiuxianhuati">
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'Forums','action'=>'posting_list',0,0));?>
		</span>
	</div>
	<div class="summary_message">
	<ul id="right">
	<?php foreach($forums0 as $forum):?>
		<li><?php echo $this->Html->link($forum['Forum']['title'],array('controller'=>'Forums','action'=>'view',$forum['Forum']['id']));?></li>
	<?php endforeach;?>
	</ul>
	</div>
</div>

<div class="msg_box_left">
	<div id="message_box_yiliaoqixie">
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'ProxyInfos','action'=>'proxy_search', 1));?>
		</span>
	</div>

	<div class="summary_message">
	<ul id="left">
	<?php foreach($proxys1 as $proxy):?>
	<li><?php echo $this->Html->link($proxy['ProxyInfo']['product_name'].' '.$proxy['CompanyUserInfo']['company'],array('controller'=>'ProxyInfos','action'=>'proxy_view',$proxy['ProxyInfo']['id']));?></li>
	<?php endforeach;?>
	</ul>
	</div>
</div>
<div class="msg_box_right">
	<div id="message_box_jiaoliuchangtan">
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'Forums','action'=>'posting_list',1,0));?>
		</span>
	</div>
	<div class="summary_message">
	<ul id="right">
	<?php foreach($forums1 as $forum):?>
		<li><?php echo $this->Html->link($forum['Forum']['title'],array('controller'=>'Forums','action'=>'view',$forum['Forum']['id']));?></li>
	<?php endforeach;?>
	</ul>
	</div>
</div>
</div>

<div class="div_ad_image">
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
				echo $this->Html->image('ad_image/ad'.(($id+7) % 5).'.png',array('width'=>'125','height'=>'83','url'=>array('controller'=>'AboutUs','action'=>'pre_ad_notice_view')));
			}
			else
			{
				echo $this->Html->image($advertise[$id]['AdList']['pic_url'],array('width'=>'125','height'=>'83','url'=>array('controller'=>'CompanyDescriptions','action'=>'view_info',$advertise[$id]['AdList']['company_user_info_id'])));
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

<div class="msg_box">
<div class="msg_box_left">
	<div id="message_box_shengwuyiyao">
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'ProxyInfos','action'=>'proxy_search', 2));?>
		</span>
	</div>

	<div class="summary_message">
	<ul id="left">
	<?php foreach($proxys2 as $proxy):?>
	<li><?php echo $this->Html->link($proxy['ProxyInfo']['product_name'].' '.$proxy['CompanyUserInfo']['company'],array('controller'=>'ProxyInfos','action'=>'proxy_view',$proxy['ProxyInfo']['id']));?></li>
	<?php endforeach;?>
	</ul>
	</div>
</div>

<div class="msg_box_right">
	<div id="message_box_xueshuhuiyi">
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'Forums','action'=>'posting_list',2,0));?>
		</span>
	</div>
	<div class="summary_message">
	<ul id="right">
	<?php foreach($forums2 as $forum):?>
		<li><?php echo $this->Html->link($forum['Forum']['title'],array('controller'=>'Forums','action'=>'view',$forum['Forum']['id']));?></li>
	<?php endforeach;?>
	</ul>
	</div>
</div>

<div class="msg_box_left">
	<div id="message_box_yiliaohaocai">
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'ProxyInfos','action'=>'proxy_search', 3));?>
		</span>
	</div>

	<div class="summary_message">
	<ul id="left">
	<?php foreach($proxys3 as $proxy):?>
	<li><?php echo $this->Html->link($proxy['ProxyInfo']['product_name'].' '.$proxy['CompanyUserInfo']['company'],array('controller'=>'ProxyInfos','action'=>'proxy_view',$proxy['ProxyInfo']['id']));?></li>
	<?php endforeach;?>
	</ul>
	</div>
</div>
<div class="msg_box_right">
	<div id="message_box_yaowuyanfa">
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'Forums','action'=>'posting_list',3,0));?>
		</span>
	</div>
	<div class="summary_message">
	<ul id="right">
	<?php foreach($forums3 as $forum):?>
		<li><?php echo $this->Html->link($forum['Forum']['title'],array('controller'=>'Forums','action'=>'view',$forum['Forum']['id']));?></li>
	<?php endforeach;?>
	</ul>
	</div>
</div>
</div>

<div class="div_ad_image">
<?php
for($index = 0; $index < 5; $index++)
{
	$offset = $index*8 + 40; ?>

	<ul>
	<?php
	for($id = $offset; $id < $offset+8; $id++)
	{
		?>
		<li>
		<?php 
			if($advertise[$id]['AdList']['pic_url'] == 'ad_image/ad.png')
			{
				echo $this->Html->image('ad_image/ad'.(($id+11) % 5).'.png',array('width'=>'125','height'=>'83','url'=>array('controller'=>'AboutUs','action'=>'pre_ad_notice_view')));
				//original:$advertise[$id]['AdList']['pic_url']
			}
			else
			{
				echo $this->Html->image($advertise[$id]['AdList']['pic_url'],array('width'=>'125','height'=>'83','url'=>array('controller'=>'CompanyDescriptions','action'=>'view_info',$advertise[$id]['AdList']['company_user_info_id'])));
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

<div class="msg_box">
<div class="msg_box_left">
	<div id="message_box_recruitment">
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'Recruitments','action'=>'recruitment_list'));?>
		</span>
	</div>
	<div class="summary_message">
	<ul id="right">
		<?php foreach($recruitments as $recruitment):?>
		<li><?php echo $this->Html->link($recruitment['Recruitment']['job_title'].' '.$recruitment['CompanyUserInfo']['company'],array('controller'=>'Recruitments','action'=>'recruitment_view',$recruitment['Recruitment']['id']));?>
		</li>
<?php endforeach;?>
	</ul>
	</div>
</div>

<div class="msg_box_right">
	<div id="message_box_linchuangtaolun">
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'Forums','action'=>'posting_list',4,0));?>
		</span>
	</div>
	<div class="summary_message">
	<ul id="right">
	<?php foreach($forums4 as $forum):?>
		<li><?php echo $this->Html->link($forum['Forum']['title'],array('controller'=>'Forums','action'=>'view',$forum['Forum']['id']));?></li>
	<?php endforeach;?>
	</ul>
	</div>
</div>

<div class="msg_box_left">
	<div id="message_box_yaoshizige">
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'Forums','action'=>'posting_list',5,0));?>
		</span>
	</div>
	<div class="summary_message">
	<ul id="right">
	<?php foreach($forums5 as $forum):?>
		<li><?php echo $this->Html->link($forum['Forum']['title'],array('controller'=>'Forums','action'=>'view',$forum['Forum']['id']));?></li>
	<?php endforeach;?>
	</ul>
	</div>
</div>
<div class="msg_box_right">
	<div id="message_box_keyanqiuzhu">
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'Forums','action'=>'posting_list',6,0));?>
		</span>
	</div>
	<div class="summary_message">
	<ul id="right">
	<?php foreach($forums6 as $forum):?>
		<li><?php echo $this->Html->link($forum['Forum']['title'],array('controller'=>'Forums','action'=>'view',$forum['Forum']['id']));?></li>
	<?php endforeach;?>
	</ul>
	</div>
</div>
</div>




