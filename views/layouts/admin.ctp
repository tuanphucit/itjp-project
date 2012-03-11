<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?>
<title><?php __('T09'); ?> <?php echo $title_for_layout; ?>
</title>
<?php
//echo $this->Html->meta('icon');

//echo $this->Html->css('cake.generic');
echo $this->Html->css('admin_style.css');
echo $this->Html->css('jquery-ui.css');

echo $this->Html->script('jquery-1.5.1.js');

echo $this->Html->script('jquery-ui.min.js');
echo $this->Html->script('admin_check.js');
echo $this->Html->script('custom.js'); 

echo $scripts_for_layout;
?>
</head>
<body>
	
	<div id="container">
	
	<?php echo $this->Session->flash(); ?>
	
	
	<div id="header">
	<div id="header-left"><p id="title">Room Booking Administrator</p></div>
	
	<div id="header-right">
		<div class="item-panel">
		<div class="item">
			<div class="top-item"></div>
			<div class="icon">
				<a
					href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'admin_logout'))?>"
					class="logout"> <?php echo $this->Html->image( 'logout-icon.png',array('alt'=>'Logout')) ?>
					<span>Logout</span> </a>
			</div>
			<div class="bottom-item"></div>
		</div>
		</div>
	</div>
	</div>
	<div id="menu">
	<ul>
		<li><?php echo $this->Html->link('Users Management', array( 'controller'=>'users', 'action'=>'admin_index'));?></li>
		<li><?php echo $this->Html->link('Booking Management', array('controller'=>'requests','action'=>'admin_index'));?></li>
		<li><?php echo $this->Html->link('Rooms Management', array('controller'=>'rooms', 'action'=>'admin_index'));?></li>
		<li><?php echo $this->Html->link('Equipments Management', array('controller'=>'equipments', 'action'=>'admin_index'));?></li>
		<li><?php echo $this->Html->link('Logs Management', array('controller'=>'logs', 'action'=>'admin_index'));?></li>
		<li><?php echo $this->Html->link('Statistic', array('action'=>'#'));?></li>
		
		
	</ul>
	</div>

	<?php echo $content_for_layout; ?>
	<div id="footer">
 	<?php
		__ ( 'Copyright(C) Team 09 - IT Japanese All Rights Reserved' )?>
 	</div>

	</div>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
