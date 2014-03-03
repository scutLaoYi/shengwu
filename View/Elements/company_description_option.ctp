
	<ul >
	<li id="listLi"><?php echo $this->Html->image('../img/mainPage/company_description/zsgg-3.jpg', array('url'=>array('controller'=>'CompanyDescriptions', 'action'=>'view_info', $currentId)));?> </li>
	<li id="listLi"><?php echo $this->Html->image('../img/mainPage/company_description/zsgg-4.jpg', array('url'=>array('controller'=>'CompanyDescriptions', 'action'=>'view_introduce', $currentId)));?> </li>
	<li id="listLi"><?php echo $this->Html->image('../img/mainPage/company_description/zsgg-5.jpg', array('url'=>array('controller'=>'CompanyDescriptions', 'action'=>'view_proxy', $currentId)));?> </li>
	<li id="listLi"><?php echo $this->Html->image('../img/mainPage/company_description/zsgg-6.jpg', array('url'=>array('controller'=>'CompanyDescriptions', 'action'=>'view_recruitment', $currentId)));?> </li>
	<li id="listLi"><?php  if($this->requestAction('/Users/is_current_company/'.$currentId))echo $this->Html->link(__('修改密码'), array('controller'=>'CompanyUserInfos', 'action'=>'company_pass_edit'));?> </li>
	</ul>
