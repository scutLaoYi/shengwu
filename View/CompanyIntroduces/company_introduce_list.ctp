<div id="bigBox">
<div id="leftBox">
<?php ?>
<div id="company_title">
</div>

<?php echo $this->Form->create('CompanySearch');?>
	<label>公司地区</label>
	<?php echo $this->Form->input('Country',array('options'=>$allCountrys,'label'=>''));?>
	<?php echo $this->Form->input('search',array('label'=>'公司名称'));?>
	<?php echo $this->Form->end(__('搜索'));?>
</div>

<div id="rightBox">
	<div id="gslb">
		<div id="gslb_1"></div>
		<div id="gslb_2"></div>
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
if(strlen($str_introduce)>100)
{
	$str_introduce=substr($str_introduce,0,297).'...';
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
