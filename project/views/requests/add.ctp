<div class="requests form">
<?php echo $this->Form->create('Request');?>
	<fieldset>
		<legend><?php __('Add Request'); ?></legend>
	<?php
		echo $this->Form->input('status');
		echo $this->Form->input('roomid');
		echo $this->Form->input('create_by');
		echo $this->Form->input('create_time');
		echo $this->Form->input('note');
		echo $this->Form->input('update_by');
		echo $this->Form->input('update_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Requests', true), array('action' => 'index'));?></li>
	</ul>
</div>