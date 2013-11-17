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

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<ul>
				<li><?php 
					if($this->Session->check('user')) {
						echo $this->Session->read('user');
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
			<h1>这里放置网站标题和logo</h1>
		</div>

<!-- start of menubar -->

<div id="menubar">
 			<ul id="menu">
			<li><?php echo $this->Html->link('主页', array('controller'=>'Mainpage', 'action'=>'index')); ?></li>
			<li><?php echo $this->Html->link('公司', array('controller'=>'CompanyIntroduces', 'action'=>'company_introduce_list')); ?></a>
			  </li>
			  <li><a href="">代理</a>
				<ul>
					<li><a href="">耗材</a></li>
					<li><a href="">医药</a></li>
					<li><a href="">器械</a></li>
				</ul>
			  </li>
				<li><a href="">招聘</a></li>
				<li><a href="">招标</a></li>
				<li><a href="">论坛</a></li>
				<li><a href="">信息发布</a>
					<ul>
					<li><?php echo $this->Html->link('发布公司信息', array('controller'=>'companyIntroduces', 'action'=>'company_introduce_submit')); ?></li>
						<li><a href="">发布代理信息</a></li>
						<li><a href="">发布招聘信息</a></li>
					</ul>
				</li>
				<li><a href="">关于我们</a></li>
				<li><a href="">广告招租</a></li>
			
			</ul>
		</div>

<!-- end of menubar -->

		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
<?php 
		echo '友情链接：';
		$links = $this->requestAction('/FriendlyLinks/list_link');
		foreach($links as $onelink)
		{
			$currentName =  $onelink['FriendlyLink']['link_name'];
			$currentUrl = $onelink['FriendlyLink']['link_url'];
			echo $this->Html->link($currentName,$currentUrl);
		}
?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?> 
</body>
</html>
