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
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
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
			<h1>这里放置网站标题和logo</h1>
		</div>

<!-- start of menubar -->

<div id="menubar">
 			<ul id="menu">
			<li><?php echo $this->Html->link('主页', array('controller'=>'Posts', 'action'=>'index')); ?></li>
			  <li><a href="">公司</a>
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
	
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
