<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('設備管理', true), '/admin/equips');
$html->addCrumb(__('新設備追加', true), '/admin/equips/add');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('新設備追加') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('リストに戻る', true), array('action' => 'admin_index'), array('title' => __('リストに戻る', true))); ?></li>
            </ul>
        </div>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin add new equipment
        echo $form->create('Equip');
        echo $form->input('code', array('label' => __('コード', true), 'type' => 'text'));
        echo $form->input('name', array('label' => __('名', true), 'type' => 'text'));
        echo $form->input('description', array('label' => __('説明', true), 'type' => 'textarea'));
        echo $form->input('price', array('label' => __('価格', true), 'type' => 'text'));
        echo $form->input('quantity', array('label' => __('数量', true), 'type' => 'text'));
        echo $form->button(__('サブミット', true), array('type' => 'submit'));
        echo $form->button(__('リセット', true), array('type' => 'reset'));
        echo $form->end();
        ?>
    </div>
</div>