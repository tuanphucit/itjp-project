<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $listRoomTypes array */
/* @var $list array */
/* @var $rdurl String */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('会議室管理', true), '/admin/room_types');
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('会議室管理') ?></h3>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : chinh form admin search room
        echo $form->create('Room', array('id' => 'search_form'));
        echo $form->input('name', array('label' => __('会議室', true), 'type' => 'text'));
        echo $form->input('type', array('label' => __('会議室タイプ', true), 'type' => 'select', 'options' => $listRoomTypes, 'empty' => '-- all --'));
        $ele1 = $form->label('quanity_seat', __('座席数量 : ', true));
        $ele2 = $form->input('fromqs', array('label' => __('から', true), 'type' => 'text', 'div' => false));
        echo $form->input('toqs', array('label' => __('まで', true), 'type' => 'text', 'before' => $ele1 . $ele2));
        $ele3 = $form->label('renting_fee', __('使用料 : ', true));
        $ele4 = $form->input('fromrf', array('label' => __('から', true), 'type' => 'text', 'div' => false));
        echo $form->input('torf', array('label' => __('まで', true), 'type' => 'text', 'before' => $ele3 . $ele4));
        echo $form->button(__('サブミット', true), array('type' => 'submit', 'id' => 'bt_submit'));
        echo $form->button(__('リセット', true), array('type' => 'reset', 'id' => 'bt_reset'));
        echo $form->end();
        ?>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../rooms/list.ajax'); ?>
</div>