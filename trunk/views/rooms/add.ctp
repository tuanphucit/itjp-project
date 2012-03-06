<div class="rooms form">
<?php echo $this->Form->create('Room');?>
	<fieldset>
		<legend><?php __('Add Room'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Rooms', true), array('action' => 'index'));?></li>
	</ul>
</div>