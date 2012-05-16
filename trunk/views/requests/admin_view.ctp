<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $list array */
/* @var $rdurl String */
/* @var $Request array */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('予約管理', true), '/admin/requests');
$html->addCrumb(__('予約表示', true), '/admin/requests/view');

/**
 * Make up Status of Request
 * @param int $statusid
 * @return String
 */
//echo $this->element('sql_dump');
function makeupStatus($statusid) {
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
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('キャンセル', true), array('action' => 'admin_delete', $Request['Request']['id']), array('title' => __('予約をキャンセルする', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('使用した', true), array('action' => 'admin_finish', $Request['Request']['id']), array('title' => __('終了する', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('罰金', true), array('action' => 'admin_bakking', $Request['Request']['id']), array('title' => __('bakking', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('戻る', true), array('action' => 'admin_index'), array('title' => __('一覧ページに戻る', true))); ?></li>
            </ul>
        </div>
    </div>
    <div class="module_content">
        <?php
        //TODO : lam giao dien phan thong tin ve request
        //debug($Request);
        ?>
        <table style="width: 100%">
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('コード'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['code']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('会議室'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Room']['name']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('ステータス'); ?></td>
                <td>:</td>
                <td><?php echo makeupStatus($Request['Request']['status']); ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('日'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['date']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('開始時間'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['begin_time']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('終了時間'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['end_time']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('時間'); ?></td>
                <td>:</td>
                <td><?php
        $timediff = get_time_diff($Request['Request']['begin_time'], $Request['Request']['end_time']);
        echo $timediff['D'] . '日' . $timediff['H'] . '時' . $timediff['I'] . '分';
        ?>
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('テナントさん'); ?></td>
                <td>:</td>
                <td><?php echo $html->link($Request['Requester']['fullname'], array('controller' => 'users', 'action' => 'admin_view', $Request['Request']['create_by'])); ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('費用合計'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['total_expense']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('使用料'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['rent_expense']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('手数料'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['request_expense']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('キャンセル費用'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['detroy_expense']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('罰金'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['punish_expense']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('ノート'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['note']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('作成時間'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['create_time']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('最後更新'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['update_time']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('作成者'); ?></td>
                <td>:</td>
                <td><?php echo $html->link($Request['Updater']['fullname'], array('controller' => 'users', 'action' => 'admin_view', $Request['Request']['update_by'])); ?></td>
            </tr>

        </table>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../requests/list_detail.ajax'); ?>
</div>
