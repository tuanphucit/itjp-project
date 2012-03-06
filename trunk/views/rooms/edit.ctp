<div class="rooms form">
<?php echo $this->Form->create('Room');?>
	<fieldset>
		<legend><?php __('Edit Room'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('typeid');
		echo $this->Form->input('quantity_seat');
		echo $this->Form->input('status');
		echo $this->Form->input('renting_fee');
		echo $this->Form->input('image');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Room.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Room.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rooms', true), array('action' => 'index'));?></li>
	</ul>
</div>