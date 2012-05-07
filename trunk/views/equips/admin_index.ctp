<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $list array */
/* @var $rdurl String */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('設備管理', true), '/admin/equips');
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('設備管理') ?></h3>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin search thiet bi
        echo $form->create('Equip');
        echo $form->input('code', array('label' => __('コード', true), 'type' => 'text', 'div' => false));
        echo $form->input('name', array('label' => __('名', true), 'type' => 'text', 'div' => false));
        //$ele1 = $form->label('quanity_seat', __('Quanity Seat : ', true));
        //$ele2 = $form->input('fromqs', array('label' => __('From', true), 'type' => 'text', 'div' => false));
        //echo $form->input('toqs', array('label' => __('To', true), 'type' => 'text', 'before' => $ele1 . $ele2));
        //$ele3 = $form->label('renting_fee', __('Renting Fee : ', true));
        //$ele4 = $form->input('fromrf', array('label' => __('From', true), 'type' => 'text', 'div' => false));
        //echo $form->input('torf', array('label' => __('To', true), 'type' => 'text', 'before' => $ele3 . $ele4));
        //echo $form->input('start_time', array('label' => __('Start Time', true), 'type' => 'text', 'div' => false));
        echo $form->button(__('サブミット', true), array('type' => 'submit', 'id' => 'bt_submit'));
        echo $form->button(__('リセット', true), array('type' => 'reset', 'id' => 'bt_reset'));
        echo $form->end();
        ?>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../equips/list.ajax'); ?>
</div>