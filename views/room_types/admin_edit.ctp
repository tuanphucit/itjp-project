<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
$html->addCrumb(__('Room Types Management', true), '/admin/room_types');
$html->addCrumb(__('Edit Room Type', true), '/admin/room_types/edit');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('Edit Room Type') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('Back to List', true), array('action' => 'admin_index'), array('title' => __('Back to List', true))); ?></li>
            </ul>
        </div>
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