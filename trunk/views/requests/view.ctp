<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */

/**
 * Make up Status of Request
 * @param int $statusid
 * @return String
 */
function makeupStatus($statusid) {
    switch ($statusid) {
        case REQUEST_STATUS_INIT:
            return __('初期', true);
            break;
        case REQUEST_STATUS_APROVED:
            return __('承認', true);
            break;
        case REQUEST_STATUS_DENIED:
            return __('拒否', true);
            break;
        case REQUEST_STATUS_HAS_UPDATED:
            return __('更新した', true);
            break;
        case REQUEST_STATUS_CANCELED:
            return __('キャンセルした', true);
            break;
        case REQUEST_STATUS_FINISH:
            return __('完了した', true);
            break;
        default:
            return __('知らない', true);
            break;
    }
}
?>
<div id="about">
    <h2><?php __('予約リスト'); ?></h2>
    <table style="width: 100%">
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('コード'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['code']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('室'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Room']['name']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('状態'); ?></td>
            <td>:</td>
            <td><?php echo makeupStatus($Request['Request']['status']); ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('始まり'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['begin_time']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('終わり'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['end_time']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('時間'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['time']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('テナントさん'); ?></td>
            <td>:</td>
            <td><?php echo $html->link($Request['Requester']['fullname'], array('controller' => 'users', 'action' => 'admin_view', $Request['Request']['create_by'])); ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('課金合計'); ?></td>
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
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('キャンセル費'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['detroy_expense']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('課徴金'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['punish_expense']; ?></td>
        </tr><!--
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Paid'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['paid']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Can thanh toan'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['canthanhtoan']; ?></td>
        </tr>
        --><tr>
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
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('最終更新'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['update_time']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('更新者'); ?></td>
            <td>:</td>
            <td><?php echo $html->link($Request['Updater']['fullname'], array('controller' => 'users', 'action' => 'admin_view', $Request['Request']['update_by'])); ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php echo $form->button(__('戻る', true), array('onclick' => 'history.back();')); ?></td>
            <td></td>
            <td><?php echo $form->button(__('キャンセル', true), array('onclick' => 'doDetroyRequest()')); ?></td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    function doDetroyRequest(){
        window.location = '<?php echo $html->url(array('action'=>'delete',$Request['Request']['id'])); ?>';
    }
</script>