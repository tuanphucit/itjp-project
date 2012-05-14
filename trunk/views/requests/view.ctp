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
    <h2><?php __('List Booking'); ?></h2>
    <table style="width: 100%">
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Code'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['code']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Room'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Room']['name']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Status'); ?></td>
            <td>:</td>
            <td><?php echo makeupStatus($Request['Request']['status']); ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Begin Time'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['begin_time']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('End Time'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['end_time']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Time'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['time']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Customer'); ?></td>
            <td>:</td>
            <td><?php echo $html->link($Request['Requester']['fullname'], array('controller' => 'users', 'action' => 'admin_view', $Request['Request']['create_by'])); ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Total Expense'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['total_expense']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Rent Expense'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['rent_expense']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Request Expense'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['request_expense']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Detroy Expense'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['detroy_expense']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Punish Expense'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['punish_expense']; ?></td>
        </tr>
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
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Note'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['note']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Created Time'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['create_time']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Last Updated'); ?></td>
            <td>:</td>
            <td><?php echo $Request['Request']['update_time']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Updated By'); ?></td>
            <td>:</td>
            <td><?php echo $html->link($Request['Updater']['fullname'], array('controller' => 'users', 'action' => 'admin_view', $Request['Request']['update_by'])); ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 30%;text-align: right"><?php echo $form->button(__('Back', true), array('onclick' => 'history.back();')); ?></td>
            <td></td>
            <td><?php echo $form->button(__('Detroy', true), array('onclick' => 'doDetroyRequest()')); ?></td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    function doDetroyRequest(){
        window.location = '<?php echo $html->url(array('action'=>'delete',$Request['Request']['id'])); ?>';
    }
</script>