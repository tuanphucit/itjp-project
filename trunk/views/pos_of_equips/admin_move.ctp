<div class="positionsOfEquipments form">
<?php echo $this->Form->create('PositionsOfEquipment');?>
	<fieldset>
		<legend>
		<?php __('設備の位置追加'); ?>
		</legend>
		<?php
		echo nl2br("Room ID");
		echo $this->Form->select('roomid', $roomids, null, array());
		echo nl2br("\nEquipment ID");
		echo $this->Form->select('equipmentid',$equipmentids, null, array());
		echo $this->Form->input('quantity');
		echo $this->Form->input('move_time');
		echo $this->Form->input('note');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('提出', true));?>
</div>
<div class="actions">
	<h3>
	<?php __('アクション'); ?>
	</h3>
	<ul>

		<li><?php echo $this->Html->link(__('設備の位置リスト', true), array('action' => 'index'));?>
		</li>
	</ul>
</div>
