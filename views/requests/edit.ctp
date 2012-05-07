<div class="requests form">
<?php echo $this->Form->create('Request');?>
	<fieldset>
		<legend><?php __('要求編集'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label' => 'ＩＤ'));
		echo $this->Form->input('status',array('label' => 'ステータス'));
		echo $this->Form->input('roomid',array('label' => '会議室ＩＤ'));
		echo $this->Form->input('create_by',array('label' => '作成者'));
		echo $this->Form->input('create_time',array('label' => '作成時間'));
		echo $this->Form->input('note',array('label' => 'ノット'));
		echo $this->Form->input('update_by',array('label' => '更新者'));
		echo $this->Form->input('update_time',array('label' => '更新時間'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('サブミット', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('削除', true), array('action' => 'delete', $this->Form->value('Request.id')), null, sprintf(__('本当に# %s　を削除したいですか？', true), $this->Form->value('Request.id'))); ?></li>
		<li><?php echo $this->Html->link(__('要求一覧', true), array('action' => 'index'));?></li>
	</ul>
</div>