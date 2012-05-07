<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('設備一覧') ?></h3>
        <div class="header_action">
            <!--            <ul class="tabs">
                            <li><?php echo $html->link(__('全部表示', true), array('controller' => 'requests', 'action' => 'admin_index'), array('title' => __('全部表示', true))); ?></li>
                        </ul>-->
        </div>
    </div>
    <?php $stt = 0; ?>
    <table class="tablesorter" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 5%" class="tableheader"><?php __("#"); ?></th>
                <th style="width: 15%" class="tableheader"><?php __('作成者'); ?></th>
                <th style="width: 15%" class="tableheader"><?php __('作成時間'); ?></th>
                <th style="width: 15%" class="tableheader"><?php __('更新者'); ?></th>
                <th style="width: 15%" class="tableheader"><?php __('更新時間'); ?></th>
                <th style="width: 10%" class="tableheader"><?php __('ステータス'); ?></th>
                <th style="width: 10%" class="tableheader"><?php __('アクション'); ?></th>
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
                <td align="center"><?php echo $stt; ?>&nbsp;</td>
                <td align="left"><?php echo $item['create_by']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['create_time']; ?>&nbsp;</td>
                <td align="left"><?php echo $item['update_by']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['update_time']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['status']; ?>&nbsp;</td>
                <td align="center">
                    <?php
                    echo $html->image('admin_layout/icn_aprove.gif', array('url' => array('controller' => 'requests', 'action' => 'admin_view', $item['id']), 'title' => __('具体 # ' . $stt, true), 'alt' => 'detail'));
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>