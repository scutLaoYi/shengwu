<div class="actions">

	<ul>
	<li><?php echo $this->Html->link(__('基本信息'), array('controller'=>'CompanyDescriptions', 'action'=>'view_info', $currentId));?> </li>
	<li><?php echo $this->Html->link(__('公司介绍'), array('controller'=>'CompanyDescriptions', 'action'=>'view_introduce', $currentId));?> </li>
	<li><?php echo $this->Html->link(__('公司代理'), array('controller'=>'CompanyDescriptions', 'action'=>'view_info', $currentId));?> </li>
	<li><?php echo $this->Html->link(__('公司招聘'), array('controller'=>'CompanyDescriptions', 'action'=>'view_info', $currentId));?> </li>
	</ul>
</div>
