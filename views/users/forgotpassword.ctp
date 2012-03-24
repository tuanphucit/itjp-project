
<script type="text/javascript">
$(document).ready(function(){
	$('#goback').click(function(){
		location.href="../";
	});
});
</script>

<div id="header">
<p id="title">Welcome to Room Booking System</p>
</div>

<div id="login_box">
<?php
//echo $this->Session->flash('auth');
if ($session->check ( 'Auth.User.id' )) {
	echo $this->Html->para ( null, __ ( 'Welcome ', true ) . $session->read ( 'Auth.User.email' ) );
	echo $this->Html->link ( __ ( 'Logout', true ), array ('controller' => 'users', 'action' => 'logout' ) );
} else {
	?>
<table>	

<?php
	echo $this->Form->create ( 'User', array ('action' => 'forgotpassword' ) );
	?>
<tr>
	<?php
	echo __ ( 'Input your true email address to get your new password', true )?>
</tr>

	<tr>
		<td class="head" style="padding-top: 20px;">
		<?php
	echo __ ( 'Email' );
	?>
	</td>
		<td style="padding-top: 20px;">
		<?php
	echo $this->Form->input ( 'email', array ('label' => false, 'style' => 'width: 100%;' ) );
	?>
	</td>
	</tr>

	<tr>
		<td></td>
		<td>
	<?php
	echo $this->Form->end ( __ ( 'Send', true ), array ('div' => false ) );
	?>
	<!--<span style="text-align: right;float: right;"><?php
	$url = array ('id' => 'goback', 'onclick' => 'gotoAdminHome();', 'style' => 'width: 60px;' );
	echo $this->Form->button ( 'Back', $url );
	?>
	</span>
	--></td>
	</tr>



<?php
}
?>

</table>
</div>
