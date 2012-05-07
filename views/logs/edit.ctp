<div class="logs form">
<?php echo $this->Form->create('Log');?>
	<fieldset>
		<legend><?php __('ログ編集'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label' => 'ＩＤ'));
		echo $this->Form->input('code',array('label' => 'コード'));
		echo $this->Form->input('userid',array('label' => 'ユーザＩＤ'));
		echo $this->Form->input('time',array('label' => '時間'));
		echo $this->Form->input('description',array('label' => '説明'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('サブミット', true));?>
</div>
<div class="actions">
	<h3><?php __('アクション'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('削除', true), array('action' => 'delete', $this->Form->value('Log.id')), null, sprintf(__('本当に%s個を削除したいですか。?', true), $this->Form->value('Log.id'))); ?></li>
		<li><?php echo $this->Html->link(__('ログリスト', true), array('action' => 'index'));?></li>
	</ul>
</div>