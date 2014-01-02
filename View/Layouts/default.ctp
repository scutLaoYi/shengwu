<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$websiteDescription = __d('web_dev', '中国卫生材料');

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $websiteDescription; ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('mainStyle','mainPage','forum'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jquery');
	?>
</head>
<body>
	<div id="logo">
		<div id="header">
			<ul>
				<li><?php 
					if($this->Session->check('user')) {
						if($this->Session->check('type'))
						{
							$currentType = $this->Session->read('type');
							if($currentType == '1')
								echo $this->Html->link($this->Session->read('user'), array('controller'=>'CompanyDescriptions', 'action'=>'view_info'));
							else if($currentType == '2')
								echo $this->Html->link($this->Session->read('user'), array('controller'=>'Users', 'action'=>'personal_infos'));
							else 
							{
								echo "管理员：".$this->Session->read('user');
								echo $this->Html->link('进入后台', array('controller'=>'Users', 'action'=>'index'));
							}
						}
						else
							echo "failed to read type!";
						echo ' | ';
						echo $this->Html->link('退出登录',array('controller'=>'Users','action'=>'logout'));
					}
					else {
						echo $this->Html->link('登录',array('controller'=>'Users','action'=>'login'));
						echo ' | ';
						echo $this->Html->link('个人注册',array('controller'=>'Users','action'=>'personal_register'));
						echo ' | ';
						echo $this->Html->link('企业注册', array('controller'=>'CompanyUserInfos', 'action'=>'company_register'));
					}
					?>
				</li>	
			</ul>
		</div>
<!-- start of menubar -->
		<div id="menubar">
 			<ul id="menu">
			<li><?php echo $this->Html->link('首页', array('controller'=>'Mainpage', 'action'=>'index')); ?></li>
			<li><?php echo $this->Html->link('企业宣传', array('controller'=>'CompanyIntroduces', 'action'=>'company_introduce_list')); ?></a>
			  </li>
			  <li><?php echo $this->Html->link('代理信息', array('controller'=>'ProxyInfos', 'action'=>'proxy_search')); ?></a>
				<ul>
				<li><?php echo $this->Html->link('医疗器械', array('controller'=>'ProxyInfos', 'action'=>'proxy_search', 1));?></a></li>
					<li><?php echo $this->Html->link('生物医药', array('controller'=>'ProxyInfos', 'action'=>'proxy_search', 2));?></a></li>
					<li><?php echo $this->Html->link('医疗耗材', array('controller'=>'ProxyInfos', 'action'=>'proxy_search', 3));?></a></li>
				</ul>
			  </li>
			  <li><?php echo $this->Html->link('招聘求职', array('controller'=>'Recruitments', 'action'=>'recruitment_list')); ?></a></li>
			<li><?php echo $this->Html->link('招标中标', array('controller'=>'InviteBids', 'action'=>'invite_bid_list')); ?></a></li> 
			<li><?php echo $this->Html->link('论坛交流', array('controller'=>'Forums','action'=>'index')); ?></li>
 				<li><a href="">信息发布</a>
 					<ul> 
					<li><?php echo $this->Html->link('发布公司信息', array('controller'=>'companyIntroduces', 'action'=>'company_introduce_submit')); ?></li>
					<li><?php echo $this->Html->link('发布代理信息', array('controller'=>'ProxyInfos', 'action'=>'proxy_submit'));?></li>
					<li><?php echo $this->Html->link('发布招聘信息',array('controller'=>'Recruitments', 'action'=>'recruitment_submit')); ?></li>
					</ul>
				</li>
				<li><?php echo $this->Html->link('关于我们', array('controller'=>'AboutUs', 'action'=>'pre_link_us_view'));?></li>
				<li><?php echo $this->Html->link('广告招租', array('controller'=>'AboutUs', 'action'=>'pre_ad_notice_view'));?></li>
			
			</ul>
		</div>
		<!-- end of menubar -->
	</div>
	<div id="container">
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

		<div id="footer">
<?php
		echo '-';
		echo $this->Html->link('了解我们',array('controller'=>'AboutUs','action'=>'pre_know_us_view'));
		echo '-';
		echo $this->Html->link('服务项目',array('controller'=>'AboutUs','action'=>'pre_service_view'));
		echo '-';
		echo $this->Html->link('法律声明',array('controller'=>'AboutUs','action'=>'pre_legal_notice_view'));
		echo '-';
		echo $this->Html->link('联系我们',array('controller'=>'AboutUs','action'=>'pre_link_us_view'));
		echo '-';
		echo $this->Html->link('友情提示',array('controller'=>'AboutUs','action'=>'pre_friend_message_view'));
		echo '-';
?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?> 
	<?php echo $this->Js->writeBuffer();?>
</body>
</html>
