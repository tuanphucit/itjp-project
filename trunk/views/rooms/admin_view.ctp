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
$html->addCrumb(__('会議室表示', true), '/admin/rooms/view');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('会議室表示') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('会議室編集', true), array('action' => 'admin_edit', $room['Room']['id']), array('title' => __('会議室編集', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('一覧に戻る', true), array('action' => 'admin_index'), array('title' => __('一覧に戻る', true))); ?></li>
            </ul>
        </div>
    </div>
    <div class="module_content"> 
        <?php
        //TODO : lam giao dien phan thong tin ve phong
        //debug($room);
        ?>
        <table>
            <tr>
                <td rowspan="5">
                <?php // echo $html->image($room['Room']['image'], array('alt' => 'Room Image')); 
                ?>
				<?php   echo $html->image('uploads' . DS . 'images' . DS . $room['Room']['image'], array('alt' => 'Room Image')); ?>
                </td>
                <td><?php __('名'); ?></td>
                <td>:</td>
                <td><?php echo $room['Room']['name']; ?></td>
            </tr>
            <tr>
                <td><?php __('タイプ'); ?></td>
                <td>:</td>
                <td><?php echo $room['RoomType']['name']; ?></td>
            </tr>
            <tr>
                <td><?php __('説明'); ?></td>
                <td>:</td>
                <td><?php echo $room['Room']['description']; ?></td>
            </tr>
            <tr>
                <td><?php __('家賃'); ?></td>
                <td>:</td>
                <td><?php echo $room['Room']['renting_fee']; ?></td>
            </tr>
            <tr>
                <td><?php __('座席数量'); ?></td>
                <td>:</td>
                <td><?php echo $room['Room']['quantity_seat']; ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../rooms/list_equips.ajax'); ?>
</div>
