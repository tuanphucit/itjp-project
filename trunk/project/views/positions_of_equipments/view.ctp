<div class="positionsOfEquipments view">
	<h2>
	<?php  __('Positions Of Equipment');?>
	</h2>
	<dl>
	<?php $i = 0; $class = ' class="altrow"';?>
		<dt <?php if ($i % 2 == 0) echo $class;?>>
		<?php __('Id'); ?>
		</dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $positionsOfEquipments['PositionsOfEquipments']['id']; ?>
			&nbsp;
		</dd>
		<dt <?php if ($i % 2 == 0) echo $class;?>>
		<?php __('Roomid'); ?>
		</dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $positionsOfEquipments['PositionsOfEquipments']['roomid']; ?>
			&nbsp;
		</dd>
		<dt <?php if ($i % 2 == 0) echo $class;?>>
		<?php __('Equipmentid'); ?>
		</dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $positionsOfEquipments['PositionsOfEquipments']['equipmentid']; ?>
			&nbsp;
		</dd>
		<dt <?php if ($i % 2 == 0) echo $class;?>>
		<?php __('Quantity'); ?>
		</dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $positionsOfEquipments['PositionsOfEquipments']['quantity']; ?>
			&nbsp;
		</dd>
		<dt <?php if ($i % 2 == 0) echo $class;?>>
		<?php __('Move Time'); ?>
		</dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $positionsOfEquipments['PositionsOfEquipments']['move_time']; ?>
			&nbsp;
		</dd>
		<dt <?php if ($i % 2 == 0) echo $class;?>>
		<?php __('Note'); ?>
		</dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $positionsOfEquipments['PositionsOfEquipments']['note']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3>
	<?php __('Actions'); ?>
	</h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Positions Of Equipment', true), array('action' => 'edit', $positionsOfEquipments['PositionsOfEquipments']['id'])); ?>
		</li>
		<li><?php echo $this->Html->link(__('Delete Positions Of Equipment', true), array('action' => 'delete', $positionsOfEquipments['PositionsOfEquipments']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $positionsOfEquipments['PositionsOfEquipments']['id'])); ?>
		</li>
		<li><?php echo $this->Html->link(__('List Positions Of Equipments', true), array('action' => 'index')); ?>
		</li>
		<li><?php echo $this->Html->link(__('New Positions Of Equipment', true), array('action' => 'add')); ?>
		</li>
	</ul>
</div>
