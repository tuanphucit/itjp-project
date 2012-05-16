<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $list array */
/* @var $rdurl String */
$stt = ($this->Paginator->current() - 1 ) * $limit;
$rdurl = $html->url(array('action' => 'view', $rdurl));

/**
 * Make up Status of Request
 * @param int $statusid
 * @return String
 */
function makeupDetailStatus($statusid) {
    switch ($statusid) {
        
        case REQUEST_STATUS_APROVED:
            return __('予約した', true);
            break;
        
        case REQUEST_STATUS_CANCELED:
            return __('キャンセル', true);
            break;
        case REQUEST_STATUS_FINISH:
            return __('使用した', true);
            break;
        default:
            return __('知らない', true);
            break;
    }
}
?>
<div class="module_header">
    <h3 style="width: 40%"><?php __('コードと同じ予約一覧'); ?></h3>
</div>
<table class="tablesorter" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th style="width: 5%" class="tableheader"><?php __("#"); ?></th>
            <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('会議室', true), 'Room.name'); ?></th>
            <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('日', true), 'date'); ?></th>
            <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('開始', true), 'begin_time'); ?></th>
            <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('終了', true), 'end_time'); ?></th>
            <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('時間', true), 'time'); ?></th>
            <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('価格', true), 'price'); ?></th>
            <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('ステータス', true), 'status'); ?></th>
            <th style="width: 15%" class="tableheader"><?php __('アクション'); ?></th>
        </tr>
    </thead>
<?php if (count($list) == 0): ?>
        <tr>
            <td colspan="11" align="center" style="height: 100px">
                <strong><?php __('Not found any records'); ?></strong>
            </td>
        </tr>
    <?php else: ?>
        <?php foreach ($list as $item) : ?>
            <?php
            $class = null;
            if ($stt++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            $timediff = get_time_diff($item['Request']['begin_time'], $item['Request']['end_time']);
            $item['Request']['time'] = $timediff['D'] . '日' . $timediff['H'] . '時' . $timediff['I'] . '分';
            ?>
            <tr<?php echo $class; ?>>
                <td align="center"><?php echo $stt; ?>&nbsp;</td>
                <td align="center"><?php echo $item['Room']['name']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['Request']['date']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['Request']['begin_time']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['Request']['end_time']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['Request']['time']; ?>&nbsp;</td>
                <td align="right"><?php echo $item['Request']['total_expense']; ?>&nbsp;</td>
                <td align="center"><?php echo makeupDetailStatus($item['Request']['status']); ?>&nbsp;</td>
                <td align="center">
                    <?php
                    echo $html->image('admin_layout/icn_edit.png', array('url' => array('controller' => 'Requests', 'action' => 'admin_edit', $item['Request']['id']), 'title' => __('編集 # ' . $stt, true), 'alt' => 'edit'));
                    echo $html->image('admin_layout/icn_trash.png', array('url' => array('controller' => 'Requests', 'action' => 'admin_delete', $item['Request']['id']), 'title' => __('削除 # ' . $stt, true), 'alt' => 'delete'));
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
<?php endif; ?>
</table>
<div class="module_footer">
    <div id="limit">
        <?php
        $rdOption = array('5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25');
        echo sprintf(__('%s個のレコードパーページで表示。', true), $form->select('rd', $rdOption, $limit, array('empty' => false)));
        ?>
    </div>
    <div id="pagination">
        <?php
        echo $this->Paginator->prev('<< ' . __('前', true), array(), null, array('class' => 'disabled'));
        echo ' | ';
        echo $this->Paginator->numbers();
        echo ' | ';
        echo $this->Paginator->next(__('次', true) . ' >>', array(), null, array('class' => 'disabled'));
        ?>
    </div>
    <div id="count">
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('%current%レコード/合計%count%個。', true)
        ));
        ?>
    </div>
</div>
<?php
$js->get("#rd")->event('change', "$('#result_box').load('" . $rdurl . "'+this.value);");
$js->get("a[href*=/sort:], a[href*=/page:]")->event('click', "$('#result_box').load($(this).attr('href'));");
echo $js->writeBuffer();
?>