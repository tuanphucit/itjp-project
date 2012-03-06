<div class="roomTypes view">
<h2><?php  __('Room Type');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $roomType['RoomType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $roomType['RoomType']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $roomType['RoomType']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room Type', true), array('action' => 'edit', $roomType['RoomType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Room Type', true), array('action' => 'delete', $roomType['RoomType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $roomType['RoomType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Types', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Type', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
