<div id="header">
	<p id="title">Hệ thống đặt phòng họp</p>
</div>

<div id="login_box">
<?php
	//echo $this->Session->flash('auth');
	if($session->check('Auth.User.id')){
		echo $this->Html->para(null,__('Welcome ',true).$session->read('Auth.User.email'));
		echo $this->Html->link(__('Logout',true),array('controller'=>'users','action'=>'logout'));
	}else{
?>
<table>	






<?php echo $this->Form->create('User',array('action'=>'login', 'name' => 'form'));?>
<tr>
	<td class="head">
		<?php echo 'Email';?>
	</td>
	<td>
		<?php echo $this->Form->input('email',array('label'=>false, 'style'=>'width: 100%;'));?>
	</td>
</tr>

<tr>
	<td class="head"><?php echo __('Password');?></td>
	<td><?php echo $this->Form->input('password',array('label'=>false, 'style'=>'width: 100%;'));?></td>
</tr>
<tr>
	<td></td>
	<td>
	<?php echo $this->Form->end(__('Login', true));?>
	</td>
</tr>

<tr>
	<td></td>
	<td>
	<?php echo $this->Html->link('Create An Acount?', array('controller'=>'users', 'action'=>'register'));?>
	</td>
</tr>
<tr>
	<td></td>
	<td>
	<?php echo $this->Html->link('Forgot Your Password?', array('controller'=>'users', 'action'=>'forgotpswd'));?>
	</td>
</tr>

<?php }?>

</table>
	
</div>
