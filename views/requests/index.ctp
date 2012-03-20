<div class="requests index">
	<h2><?php __('Requests');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('roomid');?></th>
			<th><?php echo $this->Paginator->sort('create_by');?></th>
			<th><?php echo $this->Paginator->sort('create_time');?></th>
			<th><?php echo $this->Paginator->sort('note');?></th>
			<th><?php echo $this->Paginator->sort('update_by');?></th>
			<th><?php echo $this->Paginator->sort('update_time');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($requests as $request):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $request['Request']['id']; ?>&nbsp;</td>
		<td><?php echo $request['Request']['status']; ?>&nbsp;</td>
		<td><?php echo $request['Request']['roomid']; ?>&nbsp;</td>
		<td><?php echo $request['Request']['create_by']; ?>&nbsp;</td>
		<td><?php echo $request['Request']['create_time']; ?>&nbsp;</td>
		<td><?php echo $request['Request']['note']; ?>&nbsp;</td>
		<td><?php echo $request['Request']['update_by']; ?>&nbsp;</td>
		<td><?php echo $request['Request']['update_time']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $request['Request']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $request['Request']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $request['Request']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $request['Request']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Request', true), array('action' => 'add')); ?></li>
	</ul>
</div>