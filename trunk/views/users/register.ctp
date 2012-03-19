<?php echo $javascript->link('jquery/jquery.js', false);?>
<?php echo $javascript->link('jquery/jquery.validate.js', false);?>

<script type="text/javascript">
	
	$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});
	
	$.ready(function() {

	
		// validate signup form on keyup and submit
		$("#login_box").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				username: {
					number: true,
					required: true,
					minlength: 5
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy"
			}
		});
	
		// propose username by combining first- and lastname
	});
</script>

<div id="header">
	<p id="title">Welcome to Room Booking System</p>
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
		<?php echo $this->Form->input('email',array('label'=>false, 'erros'=>TRUE,'style'=>'width: 100%;', 'value'=>$user['User']['email']));?>
	</td>
</tr>

<tr>
	<td class="head"><?php echo __('Password');?></td>
	<td><?php echo $this->Form->input('password',array('label'=>false,'erros'=>TRUE, 'style'=>'width: 100%;', 'value'=>''));?></td>
</tr>

<tr>
	<td class="head"><?php echo __('Confirm Password');?></td>
	<td><?php echo $this->Form->input('User.password_confirm',array('label'=>false, 'erros'=>TRUE,'type'=>'password', 'style'=>'width: 100%;', 'value'=>''));?></td>
		<?php 
			
		?>

</tr>
<tr>
	<td class="head"><?php echo __('Full name');?></td>
	<td><?php echo $this->Form->input('fullname',array('label'=>false, 'erros'=>true,'style'=>'width: 100%;', 'value'=>''));?></td>
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
		$options['0']='Other Company';
		debug($options);
	?>
	<td><?php echo $this->Form->select('company_id', $options, null, array('empty'=>'-Select-'));?></td>
	
</tr>

<tr>
	<td class="head"><?php echo __('Local phone');?></td>
	<td><?php echo $this->Form->input('local_phone',array('label'=>false,'erros'=>true, 'style'=>'width: 50%;', 'value'=>''));?></td>
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
