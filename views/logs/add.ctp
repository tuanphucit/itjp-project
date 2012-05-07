<div class="logs form">
<?php echo $this->Form->create('Log');?>
	<fieldset>
		<legend><?php __('ログ追加'); ?></legend>
	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('userid');
		echo $this->Form->input('time');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('サブミット', true));?>
</div>
<div class="actions">
	<h3><?php __('アクション'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('ログリスト', true), array('action' => 'index'));?></li>
	</ul>
</div>