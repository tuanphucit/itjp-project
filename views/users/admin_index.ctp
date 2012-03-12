<div id="content">
	<div id="tab_title">
		<div id="tit">User Management</div>
		
		<div id="csv2">
			<?php $url=array('controller'=>'users', 'action'=>'admin_export');?>
			<form method="post" 
			action="<?php echo $this->Html->url($url);?>">
			<input type="submit" value="CSV Export"/>
			</form>
		</div>
		<div id="csv">
			<?php $url=array('controller'=>'users', 'action'=>'#');?>
			<form enctype="multipart/form-data" method="post" 
			action="<?php echo $this->Html->url($url);?>">
			Import CSV
			<input type="file" name="file" />
			<input type="submit" value="Upload" />
			</form>
		</div>
		
		

	</div>
	
	<div id="form_box">
	
	<?php echo $this->Form->create('User', array('action'=>'admin_index', 'method'=>'post'));?>
	<p class="pad">
		<?php echo __('Status');?>
		<?php $option=array(''=>'Select One',
							'1'=>'Active', 
							'0'=>'Disable',
							'2'=>'Registered'
		);?>
		<?php echo $this->Form->select('status', $option, null, array('empty'=>'-Select-'));?>
		
		<p class="pad">
		<?php  echo __('Register Date:'); ?> 
		Y <?php echo $this->Form->year('from', 2012, 2050, null, array('empty'=>'- - - -'));?>
		M <?php echo $this->Form->month('from',null, array('monthNames'=>false, 'empty'=>'- -'));?>
		D <?php echo $this->Form->day('from',null, array('empty'=>'- -'));?> 
		~ 
		Y <?php echo $this->Form->year('to', 2012, 2050, null, array('empty'=>'- - - -'));?>
		M <?php echo $this->Form->month('to', null, array('monthNames'=>false, 'empty'=>'- -'));?>
		D <?php echo $this->Form->day('to', null, array('empty'=>'- -'));?> 
		
		</p>
		
		<p>
		Text search 
		<?php echo $this->Form->text('email', array('br'=>false)); ?>
		<?php echo $this->Form->end(array('label'=>'Refresh and View', 'div'=>false));?>
		
		</p>
	
		
	</div>

	<div id="user_add">
		<?php echo $this->Html->link('Add user', array('controller'=>'users', 'action'=>'admin_add'));?>
		<?php echo $this->Html->image('user_add.png', array('width'=>15, 'border'=>0, 
		));?>
		
	</div>
	
	
	<div>
	
	<div id="user">
	<?php $url=array('controller'=>'users', 'action'=>'admin_action');?>
	<form name="form1" action="<?php echo $this->Html->url($url);?>" method="post">
	<div id="submit_div">
	
		<?php $option=array('1'=>'Active', '2'=>'Disable', '3'=>'Delete', '4'=>'Send Mail');
		//echo $this->Form->create('User', array('action'=>'admin_action', 'name'=>'form1','method'=>'post'));
		echo $this->Form->select('User.action', $option, null, array('empty'=>'-Select-'));?>
		<input type="submit" value="Submit" onclick="return submitUserAction(form1);">
		
		<span style="text-align: right; color: white; float: right; padding-top:5px; "><?php echo $this->Paginator->counter(array(
		'format' => __('Result %current% records of %count%', true)
		));?></span>

	</div>
	

	
	<table cellpadding="0" cellspacing="0">
	
	<tr>
			<th><?php echo __('#');?></th>
			<th><?php echo $this->Form->checkbox('allbox', array('onclick'=>'checkAll()'));?></th>
			<th><?php echo $this->Paginator->sort('User', 'email');?></th>
			
			<th><?php echo $this->Paginator->sort('Created','created_time');?></th>
			
			<th><?php echo $this->Paginator->sort('last_access');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('Critical', 'ws_critical');?></th>
			<th><?php echo __('No of booking');?></th>
			<th><?php echo __('Edit');?></th>
			
			
	</tr>
	<?php
	$i = 0;
	$row=0;
	$index=0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		$type_id=$user['User']['role'];
		$status_id=$user['User']['status'];
		if ($type_id==0)
			continue;
	?>
	<tr<?php echo $class;?>>
		<?php $id=$user['User']['id'];
		$index++;
		$row++;?>
		<td><?php echo $row+($page-1)*$limit; ?>&nbsp;</td>
		<td><?php echo $this->Form->checkbox('User.check.'.($index-1), array('value'=>$id));?></td>
		<td class="email"><?php echo $this->Html->link($user['User']['email'], array('action'=>'view', $id)); ?>&nbsp;</td>
		
		<td><?php echo $user['User']['created_time']; ?>&nbsp;</td>
		
		<td><?php echo $user['User']['last_access']; ?>&nbsp;</td>
		<td><?php
			switch ($status_id){
				case 2:
					__('Registerd');
					break;
				case 1:{
					__('Active');
					break;
				}
				case 0:{
					__('Disable');
					break;
				}
			} 
		?>&nbsp;</td>
		
		<td>
			<?php
			if (isset($user['User']['ws_critical'])){
				$flag_id=$user['User']['ws_critical'];
				if ($flag_id == 1)
					$flag = 'Good';
				elseif ($flag_id==0)
					$flag = 'Normal';
				else $flag = 'Bad';
			}else $flag = 'Good/Normal/Bad';
			echo $flag; 
			?>
			
		</td>
		
		<td>Chua lam&nbsp;</td>
		<td><?php echo $this->Html->image('user_edit.png', array('width'=>18, 'border'=>0, 
		'url'=>array('controller'=>'users', 'action'=>'admin_edit', $id)));?></td>
		
	</tr>
<?php endforeach; ?>
	
	
	
	</table>
	</form>
	<div id="count">
	</div>
	
	<div style="margin-top: 1em;">
	<div class="show">
		<?php $url=array('controller'=>'users', 'action'=>'admin_index');?>
		<form action="<?php echo $this->Html->url($url);?>" method="post">
		<?php echo __('Rows of a page: ', true);?>
		<input type="text" name="data[show]" style="width: 40px;" 
		value="<?php echo (isset($show) ? $show : '');?>" />
		<input type="submit" value="Show">
		</form>
	</div>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	
	
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?></li>
	</ul>
</div>

</div>
</div>
