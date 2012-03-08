<div class="positionsOfEquipments form">
<?php echo $this->Form->create('PositionsOfEquipment');?>
	<fieldset>
		<legend><?php __('Add Positions Of Equipment'); ?></legend>
	<?php
		echo $this->Form->input('roomid');
		echo $this->Form->input('equipmentid');
		echo $this->Form->input('quantity');
		echo $this->Form->input('move_time');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Positions Of Equipments', true), array('action' => 'index'));?></li>
	</ul>
</div>