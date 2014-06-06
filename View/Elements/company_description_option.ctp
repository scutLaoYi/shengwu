<ul id="listUl">
	<li><?php echo $this->Html->link('基本信息', array('controller'=>'CompanyDescriptions', 'action'=>'view_info', $currentId));?>
	 </li>
	<li><?php echo $this->Html->link('公司介绍', array('controller'=>'CompanyDescriptions', 'action'=>'view_introduce', $currentId));?> 
	</li>
	<li><?php echo $this->Html->link('公司代理', array('controller'=>'CompanyDescriptions', 'action'=>'view_proxy', $currentId));?> 
	</li>
	<li><?php echo $this->Html->link('公司招聘', array('controller'=>'CompanyDescriptions', 'action'=>'view_recruitment', $currentId));?> 
	</li>
<!--
	<li><?php  if($this->requestAction('/Users/is_current_company/'.$currentId))echo $this->Html->link(__('修改密码'), array('controller'=>'CompanyUserInfos', 'action'=>'company_pass_edit'));?> 
	</li>-->
</ul>
