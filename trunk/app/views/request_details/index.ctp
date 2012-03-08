<div class="requestDetails index">
	<h2><?php __('Request Details');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('requestid');?></th>
			<th><?php echo $this->Paginator->sort('begin_time');?></th>
			<th><?php echo $this->Paginator->sort('end_time');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($requestDetails as $requestDetail):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $requestDetail['RequestDetail']['id']; ?>&nbsp;</td>
		<td><?php echo $requestDetail['RequestDetail']['requestid']; ?>&nbsp;</td>
		<td><?php echo $requestDetail['RequestDetail']['begin_time']; ?>&nbsp;</td>
		<td><?php echo $requestDetail['RequestDetail']['end_time']; ?>&nbsp;</td>
		<td><?php echo $requestDetail['RequestDetail']['price']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $requestDetail['RequestDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $requestDetail['RequestDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $requestDetail['RequestDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $requestDetail['RequestDetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Request Detail', true), array('action' => 'add')); ?></li>
	</ul>
</div>