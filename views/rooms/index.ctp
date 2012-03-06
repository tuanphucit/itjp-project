<div class="rooms index">
	<h2><?php __('Rooms');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('typeid');?></th>
			<th><?php echo $this->Paginator->sort('quantity_seat');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('renting_fee');?></th>
			<th><?php echo $this->Paginator->sort('image');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rooms as $room):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $room['Room']['id']; ?>&nbsp;</td>
		<td><?php echo $room['Room']['name']; ?>&nbsp;</td>
		<td><?php echo $room['Room']['typeid']; ?>&nbsp;</td>
		<td><?php echo $room['Room']['quantity_seat']; ?>&nbsp;</td>
		<td><?php echo $room['Room']['status']; ?>&nbsp;</td>
		<td><?php echo $room['Room']['renting_fee']; ?>&nbsp;</td>
		<td><?php echo $room['Room']['image']; ?>&nbsp;</td>
		<td><?php echo $room['Room']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $room['Room']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $room['Room']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $room['Room']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $room['Room']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
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
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Room', true), array('action' => 'add')); ?></li>
	</ul>
</div>