<!-- File: /app/views/posts/edit.ctp -->
	
<h1>Edit Equipment</h1>
<?php
	echo $this->Form->create('Equipment1', array('action' => 'edit'));
	echo $this->Form->input('id', array('type' => 'hidden')); 
	echo $this->Form->input('code');
	echo $this->Form->input('name');
	echo $this->Form->input('description');
	echo $this->Form->input('price');
	echo $this->Form->input('quantity');
	echo $this->Form->end('Save Post');
?>
