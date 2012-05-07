<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('設備管理', true), '/admin/equips');
$html->addCrumb(__('設備移動', true), '/admin/equips/move');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('設備移動') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('リストページに戻る', true), array('action' => 'admin_index'), array('title' => __('リストページに戻る', true))); ?></li>
            </ul>
        </div>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin move equipment
        echo $form->create('Equip');
        echo $form->input('id', array('type' => 'select', 'label' => __('設備 :', true), 'options' => $listEquips));
        echo $form->input('fid', array('type' => 'select', 'label' => __('会議室から :', true), 'options' => $listRooms, 'empty' => __('庫', true)));
        echo $form->input('tid', array('type' => 'select', 'label' => __('会議室まで :', true), 'options' => $listRooms, 'empty' => __('庫', true)));
        echo $form->input('quantity', array('type' => 'text', 'label' => __('数量 :', true), 'div' => false));
        echo $form->end(__('移動', true));
        ?>
    </div>
</div>