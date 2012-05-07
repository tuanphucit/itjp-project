<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('会議室タイプ管理', true), '/admin/room_types');
$html->addCrumb(__('会議室タイプ編集', true), '/admin/room_types/edit');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('会議室タイプ編集') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('一覧に戻る', true), array('action' => 'admin_index'), array('title' => __('一覧に戻る', true))); ?></li>
            </ul>
        </div>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin edit room type
        echo $form->create('RoomType');
        echo $form->input('name', array('type' => 'text','label' => '名'));
        echo $form->input('description', array('type' => 'textarea', 'label' => '説明'));
        echo $form->end(__('サブミット', true));
        ?>
    </div>
</div>