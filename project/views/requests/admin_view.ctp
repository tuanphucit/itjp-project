<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $list array */
/* @var $rdurl String */
/* @var $Request array */
$html->addCrumb(__('Website Admin', true), '/admin');
$html->addCrumb(__('Booking Management', true), '/admin/requests');
$html->addCrumb(__('View Booking', true), '/admin/requests/view');

/**
 * Make up Status of Request
 * @param int $statusid
 * @return String
 */
function makeupStatus($statusid) {
    switch ($statusid) {
        case REQUEST_STATUS_INIT:
            return __('Initial', true);
            break;
        case REQUEST_STATUS_APROVED:
            return __('Aproved', true);
            break;
        case REQUEST_STATUS_DENIED:
            return __('Denied', true);
            break;
        case REQUEST_STATUS_HAS_UPDATED:
            return __('Has Updated', true);
            break;
        case REQUEST_STATUS_CANCELED:
            return __('Cancelled', true);
            break;
        case REQUEST_STATUS_FINISH:
            return __('Finished', true);
            break;
        default:
            return __('Unknow', true);
            break;
    }
}
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('View Booking') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('Deny Booking', true), array('action' => 'admin_edit', $Request['Request']['id']), array('title' => __('Edit this booking', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('Approve Booking', true), array('action' => 'admin_edit', $Request['Request']['id']), array('title' => __('Edit this booking', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('Back to List', true), array('action' => 'admin_index'), array('title' => __('Back to List', true))); ?></li>
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
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Customer'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Requester']['fullname']; ?></td>
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
                <td><?php echo $Request['Updater']['fullname']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Status'); ?></td>
                <td>:</td>
                <td><?php echo makeupStatus($Request['Request']['status']); ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Note'); ?></td>
                <td>:</td>
                <td><?php echo $Request['Request']['note']; ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../requests/list_detail.ajax'); ?>
</div>
