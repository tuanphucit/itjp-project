

<div id="content">
<div id="tab_title">
<div id="tit">Edit User</div>

<div id="csv" style="float: right; width: 46%; text-align: right;">
	<?php 
	$url=array('id'=>'goback','onclick'=>'gotoAdminHome();', 'class' => 'buttonStyle');
	echo $this->Form->button('Back', $url);
?>
</div>
</div>


<div id="input_box">
	<?php
	echo $this->Form->create ( 'User', array ('action' => 'admin_edit', 'name'=>'form1' ) );
	?>
	<center>
<table>
	<tbody>
	
		<tr>
			<td class="head"><?php echo __('Email: ');?></td>
			
			<td class="text">
				<?php echo $user['User']['email'];?>
			</td>
		</tr>
	
		<tr>
			<td class="head same"><?php echo __('Change Email: ')?></td>
			<td class="text same"><?php
			echo $this->Form->input ( 'email', array ('label' => false, 'style' => 'width: 250px;', 'class'=>'writeText' ) );
			?>
		
		</tr>
		
		
		<!--<tr>
			<td class="head"><?php echo __('Password: ');?></td>
			
			<td class="text">
				<?php //echo $user['User']['password'];?>
			</td>
		</tr>
		

		--><tr>
			<td class="head"><?php echo __('Change Password: ')?></td>
			<td class="text">
			<?php
			echo $this->Form->input ( 'User.password_change', array ('label' => false, 'type'=>'password', 'style' => 'width: 250px;' ) );
			?>
					
		</tr>
		
		
		


 		<tr>
			<td class="head same"><?php echo __('Confirm Password: ');?></td>
			<td class="text same">
			<?php
				echo $this->Form->input ( 'User.confirm', array ('label' => false, 'type'=>'password','style' => 'width: 250px;' ) );
			?>
					
		</tr>
		
 		
 		
 		<tr>
 			<td class="head">Information</td>
			<td class="info_box">
				<table align="left">
					<tr>
						<td><?php echo __('Created Time');?></td>
						<td><?php echo ': '.$user['User']['created_time'];?></td>
					</tr>
			
					<tr>
						<td><?php echo __('Last Access');?></td>
						<td><?php echo ': '.$user['User']['last_access'];?></td>
					</tr>
					<tr>
						<td><?php __('Last Booking');?></td>
						<td><?php echo ': '.$user['User']['last_booked'];?></td>
					</tr>
					<tr>
						<td><?php __('Bookings Number');?></td>
						<td><?php echo ': '.$numBookings; ?></td>
					</tr>
				</table>
			</td>
 		</tr>

		
		<tr>
			<td class="head"><?php echo __('Website Critical: ');?></td>
			
			<?php
			$flag = $user['User']['ws_critical'];
			$options = array ('0' => 'Normal', '1' => 'Good', '-1'=>'Bad' );
			$attributes = array ('legend' => false, 'class' => 'radioStyled', 'value' => $flag);
			?>
			<td class="text"><?php
			echo $this->Form->radio ( 'User.ws_critical', $options, $attributes );
		
			?></td>
		</tr>


		<tr>
				<?php
				$option = array ( '1' => 'Active', '0' => 'Disable', '-1' => 'Delete', '2' => 'Registered');
				$attributes = array('legend'=>false, 'class'=>'radioStyled', 'id'=>'Status');
				?>
				<td class="head">Status</td>
			<td class="text">
				<?php
				echo $this->Form->radio ( 'status', $option, $attributes );
				?>
			
		
		
		
		</tr>

		

		<tr>
			<td class="head"></td>
			<td class="text">
					<?php
					echo $this->Form->end ( array ('label' => 'Save', 'class' => 'buttonStyle', 'onclick'=>'return checkDelete(form1);' ) );
					?>
				</td>
		</tr>
	</tbody>
</table>
</center>
</div>

</div>

