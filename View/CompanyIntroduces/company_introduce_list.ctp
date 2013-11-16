<div class="companyIntroduces company_introduce_list">
<?php echo $this->Form->create('CompanySearch');?>
	<fieldset>
	<?php echo $this->Form->input('search',array('label'=>'公司名'));?>
	</fieldset>
<?php echo $this->Form->end(__('提交'));?>

	<h2><?php echo $head;?></h2>
	<table cellpadding="0" cellspacing ="0">
	<?php foreach($companys as $company):?>
	<tr>
		<td>
			<?php if($company['CompanyIntroduce']['id']==null)continue;?>
			<?php echo $this->Html->link($company['CompanyUserInfo']['company'],array('controller'=>'CompanyIntroduce','action'=>'company_introduce_view',$company['CompanyUserInfo']['id']));?>
			</br>	
			<?php echo $company['CompanyIntroduce']['introduce'];?>
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
