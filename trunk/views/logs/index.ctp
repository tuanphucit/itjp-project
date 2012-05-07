<div class="logs index">
	<h2><?php __('Logs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('code');?></th>
			<th><?php echo $this->Paginator->sort('userid');?></th>
			<th><?php echo $this->Paginator->sort('time');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php __('アクション');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($logs as $log):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $log['Log']['id']; ?>&nbsp;</td>
		<td><?php echo $log['Log']['code']; ?>&nbsp;</td>
		<td><?php echo $log['Log']['userid']; ?>&nbsp;</td>
		<td><?php echo $log['Log']['time']; ?>&nbsp;</td>
		<td><?php echo $log['Log']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('表示', true), array('action' => 'view', $log['Log']['id'])); ?>
			<?php echo $this->Html->link(__('編集', true), array('action' => 'edit', $log['Log']['id'])); ?>
			<?php echo $this->Html->link(__('削除', true), array('action' => 'delete', $log['Log']['id']), null, sprintf(__('本当に%s個を削除したいですか？', true), $log['Log']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('ページ %page% の %pages%,合計%count%個の%current%を表示する , 開始リコード　： %start%, 終了リコード　： %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('前', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('次', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('アクション'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('新ログ', true), array('action' => 'add')); ?></li>
	</ul>
</div>