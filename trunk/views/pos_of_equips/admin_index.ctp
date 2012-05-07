<div class="positionsOfEquipments form">
<?php echo $this->Form->create('PositionsOfEquipment');?>
	<fieldset>
		<legend><?php __('設備の位置編集'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label' => 'ＩＤ'));
		echo $this->Form->input('roomid',array('label' => '会議室ＩＤ'));
		echo $this->Form->input('equipmentid',array('label' => '設備ＩＤ'));
		echo $this->Form->input('quantity',array('label' => '数量'));
		echo $this->Form->input('move_time',array('label' => '移動時間'));
		echo $this->Form->input('note',array('label' => 'ノット'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('提出', true));?>
</div>
<div class="actions">
	<h3><?php __('アクション'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('削除', true), array('action' => 'delete', $this->Form->value('PositionsOfEquipment.id')), null, sprintf(__('本当に%s個を削除したいですか？', true), $this->Form->value('PositionsOfEquipment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('設備の位置リスト', true), array('action' => 'index'));?></li>
	</ul>
</div>