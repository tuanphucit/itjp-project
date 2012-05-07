<div class="requests form">
<?php echo $this->Form->create('Request');?>
	<fieldset>
		<legend><?php __('Edit Request'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Request.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Request.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Requests', true), array('action' => 'index'));?></li>
	</ul>
</div>