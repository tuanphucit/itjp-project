<div id="content">
<div id="tab_title">
<div id="tit">View User</div>

<div id="csv" style="float: right; width: 46%; text-align: right;">
	<?php 
	$url=array('id'=>'gotoUserEdit','onclick'=>'gotoUserEdit();');
	echo $this->Form->button('Edit', $url);
	?>
	<?php 
	$url=array('id'=>'goback','onclick'=>'gotoAdminHome();');
	echo $this->Form->button('Back', $url);
	?>
</div>
</div>


<div id="input_box">
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
 			<td class="head">Information</td>
			<td class="info_box">
				<table align="left" >
					<tr>
						<td><?php echo __('Created Time');?></td>
						<td><?php echo ': '.$user['User']['created_time'];?></td>
					</tr>
					
					<tr>
						<td><?php __('Last Booked');?></td>
						<td><?php echo ': '.$user['User']['last_booked'];?></td>
					</tr>
					<tr>
						<td><?php echo __('Last Access');?></td>
						<td><?php echo ': '.$user['User']['last_access'];?></td>
					</tr>
					
					<tr>
						<td><?php __('No of Booking');?></td>
						<td><?php echo ': '.count($user['Request']); ?></td>
					</tr>
				</table>
			</td>
 		</tr>
		
		
		<tr>
			<td class="head"><?php echo __('Website Critical: ');?></td>
			
			<?php
			$flag = $user['User']['ws_critical'];
			
			?>
			<td class="text"><?php
			if (isset($flag)){
				if ($flag==1)
					echo 'Good';
				elseif ($flag ==0)
					echo 'Normal';
				else echo 'Bad';
			}
			else echo 'まだ';
			?></td>
		</tr>
			
		

		<tr>
			<td class="head"><?php echo __('Status: ')?></td>
			<td class="text">
				<?php
				$status = $user['User']['status'];
				if (isset($status)){
					if ($status==1)
						echo __('Active');
					elseif ($status ==0)
						echo __('Disable');
					elseif ($status ==2)
						echo __('Registered');	
					else echo __('Delete');
				}
				else echo 'Active/Disable';
				?>
			
		
		
		
		</tr>

		

		
	</tbody>
</table>
</center>
</div>



<div id="analysis">
	<div id="title"><?php echo __('Bookings', true);?></div>
	<div id="user">
		
		
		
		
		
		
		
		
		
		<table cellpadding="0" cellspacing="0">
	
	<tr>
			<th><?php echo __('#');?></th>
			
			<th><?php echo $this->Paginator->sort('Website Name', 'website_name');?></th>
			<th><?php echo $this->Paginator->sort('URL', 'url');?></th>
			<th><?php echo $this->Paginator->sort('Category','Category.category_name');?></th>
			
			<th><?php echo $this->Paginator->sort('last_update');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('Flag', 'critical_flag');?></th>
			<!--<th><?php echo $this->Paginator->sort('Type','user_type');?></th>
			
			--><th><?php echo __('Pages');?></th>
			
			
			
			
	</tr>
	<?php
	$i = 0;
	$row=0;
	$index=0;
	debug($requests);
	foreach ($requests as $request):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		//$type_id=$website['User']['user_type'];
		$status_id=$request['Request']['status'];
		
		
		//Flag
		
		$flag_id=$request['Request']['status'];
		if (isset($flag_id)){
			if ($flag_id == 1)
				$flag = 'Good';
			elseif ($flag_id==0)
				$flag = 'Normal';
			else $flag = 'Bad';
		}
		else $flag = 'Good/Normal/Bad';
	?>
	<tr<?php echo $class;?>>
		<?php $id=$request['Request']['id'];
		$index++;
		$row++;?>
		<td><?php echo $row+($page-1)*$limit; ?>&nbsp;</td>
		
		<td class="email"><?php echo $this->Html->link($request['Request']['website_name'], array('controller'=>'websites', 'action'=>'view', $id)); ?>&nbsp;</td>
		
		<td><?php echo $website['Website']['website_url']; ?>&nbsp;</td>
		
		<td><?php echo $website['Category']['category_name']; ?>&nbsp;</td>
		
		<td><?php echo $website['Website']['last_update']; ?>&nbsp;</td>
		<td><?php
		if (isset($status_id)){
			switch ($status_id){
				case 1:{
					__('Active');
					break;
				}
				case 0:{
					__('Disable');
					break;
				}
				case -1:{
					__('Delete');
					break;	
				}
			}
		} 
		else echo 'Active/Disable';
		?>&nbsp;</td>
		<td><?php echo $flag;?>&nbsp;</td>
		
		<td><?php echo count($website['Webpage']);?>&nbsp;</td>
		
	</tr>
<?php endforeach;?>
	
	
	
	</table>
		
		
		
		
		
		
		
		
		
		
	</div>
</div>
</div>

