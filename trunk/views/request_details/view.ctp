<div class="requestDetails view">
<h2><?php  __('Request Detail');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $requestDetail['RequestDetail']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Requestid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $requestDetail['RequestDetail']['requestid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Begin Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $requestDetail['RequestDetail']['begin_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('End Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $requestDetail['RequestDetail']['end_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $requestDetail['RequestDetail']['price']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Request Detail', true), array('action' => 'edit', $requestDetail['RequestDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Request Detail', true), array('action' => 'delete', $requestDetail['RequestDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $requestDetail['RequestDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Request Details', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Request Detail', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
