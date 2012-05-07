<div class="rooms view">
<h2><?php  __('Room');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $room['Room']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $room['Room']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Room Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($room['RoomType']['name'], array('controller' => 'room_types', 'action' => 'view', $room['RoomType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Quantity Seat'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $room['Room']['quantity_seat']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $room['Room']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Renting Fee'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $room['Room']['renting_fee']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $room['Room']['image']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $room['Room']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room', true), array('action' => 'edit', $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Room', true), array('action' => 'delete', $room['Room']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types', true), array('controller' => 'room_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type', true), array('controller' => 'room_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requests', true), array('controller' => 'requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Request', true), array('controller' => 'requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pos Of Equips', true), array('controller' => 'pos_of_equips', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pos Of Equip', true), array('controller' => 'pos_of_equips', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Requests');?></h3>
	<?php if (!empty($room['Request'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Code'); ?></th>
		<th><?php __('Status'); ?></th>
		<th><?php __('Roomid'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('Begin Time'); ?></th>
		<th><?php __('End Time'); ?></th>
		<th><?php __('Rent Expense'); ?></th>
		<th><?php __('Request Expense'); ?></th>
		<th><?php __('Detroy Expense'); ?></th>
		<th><?php __('Punish Expense'); ?></th>
		<th><?php __('Paid'); ?></th>
		<th><?php __('Note'); ?></th>
		<th><?php __('Create By'); ?></th>
		<th><?php __('Create Time'); ?></th>
		<th><?php __('Update By'); ?></th>
		<th><?php __('Update Time'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($room['Request'] as $request):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $request['id'];?></td>
			<td><?php echo $request['code'];?></td>
			<td><?php echo $request['status'];?></td>
			<td><?php echo $request['roomid'];?></td>
			<td><?php echo $request['date'];?></td>
			<td><?php echo $request['begin_time'];?></td>
			<td><?php echo $request['end_time'];?></td>
			<td><?php echo $request['rent_expense'];?></td>
			<td><?php echo $request['request_expense'];?></td>
			<td><?php echo $request['detroy_expense'];?></td>
			<td><?php echo $request['punish_expense'];?></td>
			<td><?php echo $request['paid'];?></td>
			<td><?php echo $request['note'];?></td>
			<td><?php echo $request['create_by'];?></td>
			<td><?php echo $request['create_time'];?></td>
			<td><?php echo $request['update_by'];?></td>
			<td><?php echo $request['update_time'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'requests', 'action' => 'view', $request['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'requests', 'action' => 'edit', $request['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'requests', 'action' => 'delete', $request['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $request['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Request', true), array('controller' => 'requests', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Pos Of Equips');?></h3>
	<?php if (!empty($room['PosOfEquip'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Roomid'); ?></th>
		<th><?php __('Equipmentid'); ?></th>
		<th><?php __('Quantity'); ?></th>
		<th><?php __('Move Time'); ?></th>
		<th><?php __('Note'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($room['PosOfEquip'] as $posOfEquip):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $posOfEquip['id'];?></td>
			<td><?php echo $posOfEquip['roomid'];?></td>
			<td><?php echo $posOfEquip['equipmentid'];?></td>
			<td><?php echo $posOfEquip['quantity'];?></td>
			<td><?php echo $posOfEquip['move_time'];?></td>
			<td><?php echo $posOfEquip['note'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'pos_of_equips', 'action' => 'view', $posOfEquip['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'pos_of_equips', 'action' => 'edit', $posOfEquip['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'pos_of_equips', 'action' => 'delete', $posOfEquip['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $posOfEquip['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pos Of Equip', true), array('controller' => 'pos_of_equips', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
