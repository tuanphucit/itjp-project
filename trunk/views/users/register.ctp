<div id="header">
	<p id="title">Welcome to FreeWeb</p>
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

	<?php echo $this->Form->create('User',array('action'=>'register'));?>
<tr>
	<td class="head">
		<?php echo __('Email');?>
	</td>
	<td>
		<?php echo $this->Form->input('email',array('label'=>false, 'style'=>'width: 100%;', 'value'=>$user['User']['email']));?>
	</td>
</tr>

<tr>
	<td class="head"><?php echo __('Password');?></td>
	<td><?php echo $this->Form->input('password',array('label'=>false, 'style'=>'width: 100%;', 'value'=>''));?></td>
</tr>

<tr>
	<td class="head"><?php echo __('Confirm Password');?></td>
	<td><?php echo $this->Form->input('User.password_confirm',array('label'=>false, 'type'=>'password', 'style'=>'width: 100%;', 'value'=>''));?></td>
</tr>
<tr>
	<td class="head"><?php echo __('Full name');?></td>
	<td><?php echo $this->Form->input('fullname',array('label'=>false, 'style'=>'width: 100%;', 'value'=>''));?></td>
</tr>
<tr>
	<td class="head"><?php echo __('Company name: ');?></td>
	<?php
		$options = array();
		if(isset($companies)){
			foreach ($companies as $company){
				$options[$company['Company']['id']]=$company['Company']['name'];
			}
		}
		$options['0']='Enter Company name';
		//debug($options);
	?>
	<td><?php echo $this->Form->select('company_id', $options, null, array('empty'=>'-Select-'));?></td>
	
</tr>

<tr>
	<td class="head"><?php echo __('Local phone');?></td>
	<td><?php echo $this->Form->input('local_phone',array('label'=>false, 'style'=>'width: 50%;', 'value'=>''));?></td>
</tr>
<tr>
	<td></td>
	<td>
	<?php echo $this->Form->end(__('Register', true));?>
	</td>
</tr>


<?php }?>

</table>
</div>
