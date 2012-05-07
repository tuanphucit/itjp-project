<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('設備管理', true), '/admin/equips');
$html->addCrumb(__('設備表示', true), '/admin/equips/view');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('設備表示') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('設備移動', true), array('action' => 'admin_move', $equip['Equip']['id']), array('title' => __('設備を移動する', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('設備編集', true), array('action' => 'admin_edit', $equip['Equip']['id']), array('title' => __('設備を編集する', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('リストページに戻る', true), array('action' => 'admin_index'), array('title' => __('リストページに戻る', true))); ?></li>
            </ul>
        </div>
    </div>
    <div class="module_content">
        <?php
        //TODO : lam giao dien phan thong tin ve equipments
        //debug($equip);
        ?>
        <table>
            <tr>
                <td><?php __('名'); ?></td>
                <td>:</td>
                <td><?php echo $equip['Equip']['name']; ?></td>
            </tr>
            <tr>
                <td><?php __('コード'); ?></td>
                <td>:</td>
                <td><?php echo $equip['Equip']['code']; ?></td>
            </tr>
            <tr>
                <td><?php __('説明'); ?></td>
                <td>:</td>
                <td><?php echo $equip['Equip']['description']; ?></td>
            </tr>
            <tr>
                <td><?php __('価格'); ?></td>
                <td>:</td>
                <td><?php echo $equip['Equip']['price']; ?></td>
            </tr>
            <tr>
                <td><?php __('数量'); ?></td>
                <td>:</td>
                <td><?php echo $equip['Equip']['quantity']; ?></td>
            </tr>
            <tr>
                <td><?php __('開始時間'); ?></td>
                <td>:</td>
                <td><?php echo $equip['Equip']['start_time']; ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../equips/list_poe.ajax'); ?>
</div>