<!-- File: /app/views/Equipment1s/index.ctp  (edit links added) -->

<h1>Equipment</h1>
<p>
<?php echo $this->Html->link("Add Equipment", array('action' => 'add')); ?>
</p>
<table>
	<tr>
		<th>Id</th>
		<th>Code</th>
		<th>Name</th>
		<th>Description</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Start time</th>
		<th>Action</th>
	</tr>

	<!-- Here's where we loop through our $posts array, printing out post info -->

	<?php foreach ($equipments as $post): ?>
	<tr>
		<td><?php echo $post['Equipment1']['id']; ?></td>
		<td><?php echo $post['Equipment1']['code']; ?></td>
		<td><?php echo $this->Html->link($post['Equipment1']['name'],array('action'=>'view',$post['Equipment1']['id'])); ?></td>
		<td><?php echo $post['Equipment1']['description']; ?></td>
		<td><?php echo $post['Equipment1']['price']; ?></td>
		<td><?php echo $post['Equipment1']['quantity']; ?></td>
		<td><?php echo $post['Equipment1']['start_time']; ?></td>		
		<td><?php echo $this->Html->link(
				'Delete', 
		array('action' => 'delete', $post['Equipment1']['id']),
		null,
				'Are you sure?'
				)?> <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Equipment1']['id']));?>
		</td>
	</tr>
	<?php endforeach; ?>

</table>
