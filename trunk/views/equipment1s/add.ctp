<!-- File: /app/views/posts/add.ctp -->

<h1>Add Equipment</h1>
<?php
echo $this->Form->create('Equipment1', array('action'=>'add'));
echo $this->Form->input('code');
echo $this->Form->input('name');
echo $this->Form->input('description');
echo $this->Form->input('price');
echo $this->Form->input('quantity');
echo $this->Form->end('Save Equipment');
?>