<div class="roomTypes form">
<?php echo $this->Form->create('RoomType');?>
	<fieldset>
		<legend><?php __('Add Room Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Room Types', true), array('action' => 'index'));?></li>
	</ul>
</div>