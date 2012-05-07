<div class="positionsOfEquipments view">
	<h2>
	<?php  __('設備の位置');?>
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
		<?php __('会議室ＩＤ'); ?>
		</dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $positionsOfEquipments['PositionsOfEquipments']['roomid']; ?>
			&nbsp;
		</dd>
		<dt <?php if ($i % 2 == 0) echo $class;?>>
		<?php __('設備ＩＤ'); ?>
		</dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $positionsOfEquipments['PositionsOfEquipments']['equipmentid']; ?>
			&nbsp;
		</dd>
		<dt <?php if ($i % 2 == 0) echo $class;?>>
		<?php __('数量'); ?>
		</dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $positionsOfEquipments['PositionsOfEquipments']['quantity']; ?>
			&nbsp;
		</dd>
		<dt <?php if ($i % 2 == 0) echo $class;?>>
		<?php __('移動時間'); ?>
		</dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $positionsOfEquipments['PositionsOfEquipments']['move_time']; ?>
			&nbsp;
		</dd>
		<dt <?php if ($i % 2 == 0) echo $class;?>>
		<?php __('ノット'); ?>
		</dt>
		<dd <?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo $positionsOfEquipments['PositionsOfEquipments']['note']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3>
	<?php __('アクション'); ?>
	</h3>
	<ul>
		<li><?php echo $this->Html->link(__('設備の位置編集', true), array('action' => 'edit', $positionsOfEquipments['PositionsOfEquipments']['id'])); ?>
		</li>
		<li><?php echo $this->Html->link(__('設備の位置削除', true), array('action' => 'delete', $positionsOfEquipments['PositionsOfEquipments']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $positionsOfEquipments['PositionsOfEquipments']['id'])); ?>
		</li>
		<li><?php echo $this->Html->link(__('設備の位置リスト', true), array('action' => 'index')); ?>
		</li>
		<li><?php echo $this->Html->link(__('新設備の位置', true), array('action' => 'add')); ?>
		</li>
	</ul>
</div>
