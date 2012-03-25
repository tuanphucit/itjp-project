<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
/* @var $listRoomTypes */
$html->addCrumb(__('Rooms Management', true), '/admin/rooms');
$html->addCrumb(__('View Room', true), '/admin/rooms/view');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('View Room') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('Edit this room', true), array('action' => 'admin_edit',$room['Room']['id']), array('title' => __('Edit this room', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('Back to List', true), array('action' => 'admin_index'), array('title' => __('Back to List', true))); ?></li>
            </ul>
        </div>
    </div>
    <div class="module_content">
        <?php //debug($room); ?>
    </div>
</div>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('List Booking') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('View all', true), array('controller' => 'requests', 'action' => 'admin_index'), array('title' => __('View all', true))); ?></li>
            </ul>
        </div>
    </div>
    <?php $stt = 0; ?>
    <table class="tablesorter" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <?php //TODO : chinh lai cho dung ten cac truong ?>
                <th style="width: 5%" class="tableheader"><?php __("#"); ?></th>
                <th style="width: 15%" class="tableheader"><?php __('Created By'); ?></th>
                <th style="width: 15%" class="tableheader"><?php __('Created Time'); ?></th>
                <th style="width: 15%" class="tableheader"><?php __('Updated By'); ?></th>
                <th style="width: 15%" class="tableheader"><?php __('Updated Time'); ?></th>
                <th style="width: 10%" class="tableheader"><?php __('Status'); ?></th>
                <th style="width: 10%" class="tableheader"><?php __('Actions'); ?></th>
            </tr>
        </thead>
        <?php foreach ($room['Request'] as $item) : ?>
            <?php
            $class = null;
            if ($stt++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <?php //TODO : chinh lai cho dung cac truong ?>
                <td align="center"><?php echo $stt; ?>&nbsp;</td>
                <td align="left"><?php echo $item['create_by']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['create_time']; ?>&nbsp;</td>
                <td align="left"><?php echo $item['update_by']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['update_time']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['status']; ?>&nbsp;</td>
                <td align="center">
                    <?php
                    echo $html->image('admin_layout/icn_aprove.gif', array('url' => array('controller' => 'requests', 'action' => 'admin_view', $item['id']), 'title' => __('Detail # ' . $stt, true), 'alt' => 'detail'));
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>