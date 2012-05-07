<div class="positionsOfEquipments index">
	<h2>
	<?php __('設備の位置');?>
	</h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('id');?>
			</th>
			<th><?php echo $this->Paginator->sort('roomid');?>
			</th>
			<th><?php echo $this->Paginator->sort('equipmentid');?>
			</th>
			<th><?php echo $this->Paginator->sort('quantity');?>
			</th>
			<th><?php echo $this->Paginator->sort('move_time');?>
			</th>
			<th><?php echo $this->Paginator->sort('note');?>
			</th>
			<th class="actions"><?php __('アクション');?>
			</th>
		</tr>
		<?php
		$i = 0;
		foreach ($positionsOfEquipments as $positionsOfEquipment):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		?>
		<tr <?php echo $class;?>>
			<td><?php echo $positionsOfEquipment['PositionsOfEquipments']['id']; ?>
			</td>
			<td><?php echo $positionsOfEquipment['PositionsOfEquipments']['roomid']; ?>
			</td>
			<td><?php echo $positionsOfEquipment['PositionsOfEquipments']['equipmentid']; ?>
			</td>
			<td><?php echo $positionsOfEquipment['PositionsOfEquipments']['quantity']; ?>
			</td>
			<td><?php echo $positionsOfEquipment['PositionsOfEquipments']['move_time']; ?>
			</td>
			<td><?php echo $positionsOfEquipment['PositionsOfEquipments']['note']; ?>&nbsp;</td>
			<td class="actions"><?php echo $this->Html->link(__('表示', true), array('action' => 'view', $positionsOfEquipment['PositionsOfEquipments']['id'])); ?>
			<?php echo $this->Html->link(__('編集', true), array('action' => 'edit', $positionsOfEquipment['PositionsOfEquipments']['id'])); ?>
			<?php echo $this->Html->link(__('削除', true), array('action' => 'delete', $positionsOfEquipment['PositionsOfEquipments']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $positionsOfEquipment['PositionsOfEquipments']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>
	</p>

	<div class="paging">
	<?php echo $this->Paginator->prev('<< ' . __('前', true), array(), null, array('class'=>'disabled'));?>
		|
		<?php echo $this->Paginator->numbers();?>
		|
		<?php echo $this->Paginator->next(__('次', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3>
	<?php __('アクション'); ?>
	</h3>
	<ul>
		<li><?php echo $this->Html->link(__('新設備の位置', true), array('action' => 'add')); ?>
		</li>
	</ul>
</div>
