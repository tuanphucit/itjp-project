<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
/* @var $listRoomTypes */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('会議室管理', true), '/admin/rooms');
$html->addCrumb(__('新会議室追加', true), '/admin/rooms/add');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('新会議室追加') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('一覧に戻る', true), array('action' => 'admin_index'), array('title' => __('一覧に戻る', true))); ?></li>
            </ul>
        </div>
    </div>
    <div id="search_box" class="module_content">
    	<?php echo $form->create('Room',array('type' => 'file')); ?>
        <?php
        //TODO : make style cho form admin add new room
        //echo $form->create('Room');
        echo $form->input('name', array('label' => __('会議室名', true), 'type' => 'text'));
        echo $form->input('typeid', array('label' => __('会議室タイプ', true), 'type' => 'select', 'options' => $listRoomTypes));
        echo $form->input('quantity_seat', array('label' => __('座席数量', true), 'type' => 'text'));
        //echo $form->input('status');
        echo $form->input('renting_fee', array('label' => __('家賃', true), 'type' => 'text'));
        echo $form->input('image', array('label' => __('イメージ', true), 'type' => 'file'));


        echo $form->input('description', array('label' => __('説明', true), 'type' => 'textarea'));
        echo $form->end(__('サブミット', true));
        ?>
    </div>
</div>