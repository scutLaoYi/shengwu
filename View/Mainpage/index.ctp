<div id="searchDiv">
	<?php echo $this->Form->create('search'); ?>
		<ul>
			<li>
				<label>
				<?php
				$options = array('company'=>'公司','proxy'=>'代理');
				$attributes = array('legend'=>false,'value'=>'company');
				echo $this->Form->radio('select',$options,$attributes);?>
				</label>
			</li>
			<li>
				<?php echo $this->Form->input('content',array('label'=>'')) ?>
			</li>
			<li>
				<?php echo $this->Form->end('搜索');?>
			</li>
		</ul>
</div>

<div id="rollDiv">
<img id="rollpic" src="img/mainpage_slider/0.jpg">
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
<div class="ad">
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
				echo $this->Html->image($advertise[$id]['AdList']['pic_url'],array('width'=>'128','height'=>'100','url'=>array('controller'=>'AboutUs','action'=>'pre_ad_notice_view')));
			}
			else
			{
				echo $this->Html->image($advertise[$id]['AdList']['pic_url'],array('width'=>'128','height'=>'100','url'=>array('controller'=>'CompanyDescriptions','action'=>'view_info',$advertise[$id]['AdList']['company_user_info_id'])));
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

	<div id="message_box_left">
		<b id="message_b">公司介绍</b>
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'CompanyIntroduces','action'=>'company_introduce_list'));?>
		</span>
	</div>
	<div id="message_box_right">
		<b id="message_b">招聘信息</b>
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'Recruitments','action'=>'recruitment_list'));?>
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

	<div class="summary_message">
	<ul id="right">
		<?php foreach($recruitments as $recruitment):?>
		<li><?php echo $this->Html->link($recruitment['Recruitment']['job_title'].' '.$recruitment['CompanyUserInfo']['company'],array('controller'=>'Recruitments','action'=>'recruitment_view',$recruitment['Recruitment']['id']));?>
		</li>
<?php endforeach;?>
	</ul>
	</div>

	<div id="message_box_left">
		<b id="message_b">代理信息</b>
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'ProxyInfos','action'=>'proxy_search'));?>
		</span>
	</div>
	<div id="message_box_right">
		<b id="message_b">论坛</b>
		<span id="message_span">
			<?php echo $this->Html->link('More',array('controller'=>'Forums','action'=>'index'));?>
		</span>
	</div>
	<div class="summary_message">
	<ul id="left">
	<?php foreach($proxys as $proxy):?>
	<li><?php echo $this->Html->link($proxy['ProxyInfo']['product_name'].' '.$proxy['CompanyUserInfo']['company'],array('controller'=>'ProxyInfos','action'=>'proxy_view',$proxy['ProxyInfo']['id']));?></li>
	<?php endforeach;?>
	</ul>
	</div>

	<div class="summary_message">
	<ul id="right">
	<?php foreach($forums as $forum):?>
		<li><?php echo $this->Html->link($forum['Forum']['title'],array('controller'=>'Forums','action'=>'view',$forum['Forum']['id']));?></li>
	<?php endforeach;?>
	</ul>
	</div>

<div class="ad">
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
				echo $this->Html->image($advertise[$id]['AdList']['pic_url'],array('width'=>'128','height'=>'100','url'=>array('controller'=>'AboutUs','action'=>'pre_ad_notice_view')));
			}
			else
			{
				echo $this->Html->image($advertise[$id]['AdList']['pic_url'],array('width'=>'128','height'=>'100','url'=>array('controller'=>'CompanyDescriptions','action'=>'view_info',$advertise[$id]['AdList']['company_user_info_id'])));
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



