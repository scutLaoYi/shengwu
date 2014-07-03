<div id="bigBox">
<div id="action_box">
<div id="leftBox">
<?php ?>
<div id="company_title">
</div>

<ul id="actions_lists">
<?php echo $this->Form->create('CompanySearch');?>
	<li>
	<label>公司地区</label>
	</li>
	<li>
	<?php echo $this->Form->input('Country',array('options'=>$allCountrys,'label'=>''));?>
	</li>
	<li>
	<label>公司名称</label>
	</li>
	<li>
	<?php echo $this->Form->input('search',array('label'=>''));?>
	</li>
	<li>
	<?php echo $this->Form->end(__('搜索'));?>
	</li>
</ul>
</div>
<div id="moving_ad"></div>
</div>
<div id="rightBox">
	<div id="gslb">
	</div>
	<?php foreach($companys as $company):?>
	<ul id="content_list">
		<li id="content_list_li_1">【公司名称】
		<?php echo $this->Html->link($company['CompanyUserInfo']['company'],array('controller'=>'CompanyDescriptions','action'=>'view_info',$company['CompanyUserInfo']['id']));?>
		</li>
		<li id="content_list_li_1">【公司地址】
		<?php echo $allCountrys[$company['CompanyUserInfo']['province']+1];?>
		</li>
		<li id="content_list_li_2">【公司简介】
<?php 
$str_introduce=$company['CompanyIntroduce']['introduce'];
if(mb_strlen($str_introduce)>100)
{
	$str_introduce=mb_substr($str_introduce,0,150).'...';
}
echo $str_introduce;
?>
		</li>
	</ul>
	<?php endforeach;?>

	<div class="paging">
	<p>
<?php
echo $this->Paginator->counter(array(
	'format' => __(
		'第{:page}页， 共{:pages}页'
	)));
?>	
	</p>
<?php
echo $this->Paginator->prev('< ' . __('上一页'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('下一页') . ' >', array(), null, array('class' => 'next disabled'));
?>
	</div>
	</div>
</div>
