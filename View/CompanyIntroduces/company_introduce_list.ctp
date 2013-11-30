<div class="companyIntroduces company_introduce_list">
<div class="actions">
<?php echo $this->Form->create('CompanySearch');?>
	<fieldset>
	<?php echo $this->Form->input('Country',array('options'=>$allCountrys,'label'=>'公司地区'));?>
	<?php echo $this->Form->input('search',array('label'=>'公司名'));?>
	</fieldset>
<?php echo $this->Form->end(__('搜索'));?>
</div>

<div class="index">
	<h2><?php echo $head;?></h2>
	<table cellpadding="0" cellspacing ="0">
	<?php foreach($companys as $company):?>
	<tr>
		<td>		
			<?php echo $this->Html->link($company['CompanyUserInfo']['company'],array('controller'=>'CompanyDescriptions','action'=>'view_info',$company['CompanyUserInfo']['id']));?>
		</td>
		<td>
			<?php echo $allCountrys[$company['CompanyUserInfo']['province']+1];?>
		</td>
	</tr>
	<tr>
		<td>
		<?php echo $this->Html->image('./'.$company['CompanyIntroduce']['picture_url'],array('width'=>'100','height'=>'100'));?>
		</td>
		<td>
<?php 
$str_introduce=$company['CompanyIntroduce']['introduce'];
if(strlen($str_introduce)>100)
{
	$str_introduce=substr($str_introduce,0,297).'...';
}
echo $str_introduce;
?>
		</td>
	</tr>

	<?php endforeach;?>
</table>
<p>
<?php
echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
));
?>	
</p>
<div class="paging">
<?php
echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>
</div>
</div>
