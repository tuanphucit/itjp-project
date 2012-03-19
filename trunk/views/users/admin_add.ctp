<div id="content">
<div id="tab_title">
<div id="tit">Add New User</div>
<div id="csv" style="float: right; width: 46%; text-align: right;">
	<?php 
	$url=array('id'=>'gobackFromAdd','onclick'=>'gobackFromAdd();');
	echo $this->Form->button('Back', $url);
?>
</div>
</div>
<div id="input_box" style="border: 3px solid #41A317;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	color: #41A317;
	padding: 2px;	">
	
<center>
	<?php
	echo $this->Form->create ( 'User', array ('action' => 'admin_add', 'method' => 'post' ) );
	?>
<table style="border: 0;">
	<tbody>
		<tr>
			<td class="head">Email</td>
			<td class="text"><?php
			echo $this->Form->input ( 'email', array ('label' => false, 'style' => 'width: 100%;') );
			?>
			
		
		
		
		</tr>

		<tr>
			<td class="head">Password</td>
			<td class="text">
			<?php
			echo $this->Form->input ( 'password', array ('label' => false, 'style' => 'width: 100%;', 'value'=>'' ) );
			?>
					
		</tr>

 		<tr>
			<td class="head">Confirm Password</td>
			<td class="text">
			<?php
			echo $this->Form->input ( 'confirm', array ('label' => false, 'type'=>'password','style' => 'width: 100%;' ) );
			?>
					
		</tr>
		
		
		
		
		<tr>
				<?php
				$option = array ( '1' => 'Active' , '0' => 'Disable');
				$attributes = array ('legend' => false, 'value' => '1', 'class' => 'radioStyled');
				?>
				<td class="head"><?php echo __('Status', true);?></td>
			<td class="text">
				<?php
				echo $this->Form->radio( 'status', $option, $attributes );
				?>
			
		
		
		
		</tr>


		<tr>
			<td class="head">
			
			</td>
			<td class="text">
				<?php
				echo $this->Form->end ( array ('label' => 'Add', 'style' => 'width: 100px;' ) );
				?>
				
			</td>
		</tr>
	</tbody>
</table>
</center>


</div>
</div>

