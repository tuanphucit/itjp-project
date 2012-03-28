<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
?>

<div id="about">
    <h2><?php __('Find free rooms'); ?></h2>
    <div id="search_box">
        <?php
        //TODO : chinh form admin search room
        echo $form->create('Room', array('id' => 'search_form'));
        echo 'form tim kiem';
        echo $form->end();
        ?>
    </div>
    <div id="result_box">
        <?php //echo $this->element('../rooms/list_find.ajax'); ?>
    </div>

</div>
