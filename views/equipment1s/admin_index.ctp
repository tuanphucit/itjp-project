<!-- File: /app/views/Equipment1s/index.ctp  (edit links added) -->

<h1>Equipment</h1>
<p>
<?php echo $this->Html->link("Add Equipment", array('action' => 'add')); ?>
</p>
<table>
	<tr>
		<th>ID</th> 
		<th>Code</th>
		<th>Name</th>
		<th>Description</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Start time</th>
		<th>Action</th>
	</tr>

	<!-- Here's where we loop through our $equipments array, printing out equipment info -->

	<?php foreach ($equipment1s as $equipment): ?>
	<tr>
		<td><?php echo $equipment['Equipment1']['id']; ?></td>
		<td><?php echo $equipment['Equipment1']['code']; ?></td>
		<td><?php echo $this->Html->link($equipment['Equipment1']['name'],array('action'=>'view',$equipment['Equipment1']['id'])); ?></td>
		<td><?php echo $equipment['Equipment1']['description']; ?></td>
		<td><?php echo $equipment['Equipment1']['price']; ?></td>
		<td><?php echo $equipment['Equipment1']['quantity']; ?></td>
		<td><?php echo $equipment['Equipment1']['start_time']; ?></td>		
		<td><?php echo $this->Html->link(
				'Delete', 
		array('action' => 'delete', $equipment['Equipment1']['id']),
		null,
				'Are you sure?'
				)?> <?php echo $this->Html->link('Edit', array('action' => 'edit', $equipment['Equipment1']['id']));?>
		</td>
	</tr>
	<?php endforeach; ?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</table>
