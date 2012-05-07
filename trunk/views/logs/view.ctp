<div class="logs view">
<h2><?php  __('ログ');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ＩＤ'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $log['Log']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('コード'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $log['Log']['code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ユーザＩＤ'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $log['Log']['userid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('時間'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $log['Log']['time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('説明'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $log['Log']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('アクション'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('ログ編集', true), array('action' => 'edit', $log['Log']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('ログ削除', true), array('action' => 'delete', $log['Log']['id']), null, sprintf(__('本当に%s個を削除したいですか？', true), $log['Log']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('ログリスト', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('新ログ', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
