<div class="requestDetails form">
<?php echo $this->Form->create('RequestDetail');?>
	<fieldset>
		<legend><?php __('Add Request Detail'); ?></legend>
	<?php
		echo $this->Form->input('requestid');
		echo $this->Form->input('begin_time');
		echo $this->Form->input('end_time');
		echo $this->Form->input('price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Request Details', true), array('action' => 'index'));?></li>
	</ul>
</div>