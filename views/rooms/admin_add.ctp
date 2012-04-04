<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
/* @var $listRoomTypes */
$html->addCrumb(__('Website Admin', true), '/admin');
$html->addCrumb(__('Rooms Management', true), '/admin/rooms');
$html->addCrumb(__('Add New Room', true), '/admin/rooms/add');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('Add New Room') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('Back to List', true), array('action' => 'admin_index'), array('title' => __('Back to List', true))); ?></li>
            </ul>
        </div>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin add new room
        echo $form->create('Room',array('url' => array('controller'=>'rooms','action' => 'admin_add')));
        echo $form->input('name', array('label' => __('Room Name', true), 'type' => 'text'));
        echo $form->input('typeid', array('label' => __('Room Type', true), 'type' => 'select', 'options' => $listRoomTypes));
        echo $form->input('quantity_seat', array('label' => __('Quantity Seat', true), 'type' => 'text'));
        //echo $form->input('status');
        echo $form->input('renting_fee', array('label' => __('Renting Fee', true), 'type' => 'text'));
        echo $form->input('image', array('label' => __('Image', true), 'type' => 'file'));
        echo $form->input('description', array('label' => __('Description', true), 'type' => 'textarea'));
        echo $form->end(__('Submit', true));
        ?>
    </div>
</div>