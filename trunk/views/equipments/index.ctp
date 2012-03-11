<!-- File: /app/views/equipments/index.ctp  (edit links added) -->

<h1>Equipment</h1>
<p>
<?php echo $this->Html->link("Add equipment", array('action' => 'add')); ?>
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
		<td><?php echo $post['Equipment']['id']; ?></td>
		<td><?php echo $post['Equipment']['code']; ?></td>
		<td><?php echo $this->Html->link($post['Equipment']['name'],array('action'=>'view',$post['Equipment']['id'])); ?></td>
		<td><?php echo $post['Equipment']['description']; ?></td>
		<td><?php echo $post['Equipment']['price']; ?></td>
		<td><?php echo $post['Equipment']['quantity']; ?></td>
		<td><?php echo $post['Equipment']['start_time']; ?></td>		
		<td><?php echo $this->Html->link(
				'Delete', 
		array('action' => 'delete', $post['Equipment']['id']),
		null,
				'Are you sure?'
				)?> <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Equipment']['id']));?>
		</td>
	</tr>
	<?php endforeach; ?>

</table>
