<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
$html->addCrumb(__('Room Types Management', true), '/admin/room_types');
$html->addCrumb(__('Add Room Type', true), '/admin/room_types/add');
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('Add Room Type') ?></h3>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : chinh form 
        echo $form->create('RoomType');
        echo $form->input('name', array('type' => 'text'));
        echo $form->input('description', array('type' => 'textarea'));
        echo $form->end(__('Submit', true));
        ?>
    </div>
</div>