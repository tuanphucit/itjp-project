<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $list array */
/* @var $rdurl String */
$stt = ($this->Paginator->current() - 1 ) * $limit;

/**
 * Make up Status of Request
 * @param int $statusid
 * @return String
 */
function makeupDetailStatus($statusid) {
    switch ($statusid) {
        case REQUEST_DETAIL_STATUS_INIT:
            return __('Initial', true);
            break;
        case REQUEST_DETAIL_STATUS_APROVED:
            return __('Aproved', true);
            break;
        case REQUEST_DETAIL_STATUS_DENIED:
            return __('Denied', true);
            break;
        case REQUEST_DETAIL_STATUS_HAS_UPDATED:
            return __('Updated', true);
            break;
        case REQUEST_DETAIL_STATUS_CANCELED:
            return __('Cancelled', true);
            break;
        case REQUEST_DETAIL_STATUS_FINISH:
            return __('Finished', true);
            break;
        default:
            return __('Unknow', true);
            break;
    }
}
?>
<div class="module_header">
    <h3 style="width: 40%"><?php __('List Details'); ?></h3>
</div>
<table class="tablesorter" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th style="width: 5%" class="tableheader"><?php __("#"); ?></th>
            <th style="width: 20%" class="tableheader"><?php echo $this->Paginator->sort(__('Begin', true), 'begin_time'); ?></th>
            <th style="width: 20%" class="tableheader"><?php echo $this->Paginator->sort(__('End', true), 'end_time'); ?></th>
            <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('Time', true), 'time'); ?></th>
            <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('Price', true), 'price'); ?></th>
            <th style="width: 12%" class="tableheader"><?php echo $this->Paginator->sort(__('Status', true), 'status'); ?></th>
            <th style="width: 13%" class="tableheader"><?php __('Actions'); ?></th>
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
            ?>
            <tr<?php echo $class; ?>>
                <td align="center"><?php echo $stt; ?>&nbsp;</td>
                <td align="left"><?php echo $item['RequestDetail']['begin_time']; ?>&nbsp;</td>
                <td align="left"><?php echo $item['RequestDetail']['end_time']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['RequestDetail']['time']; ?>&nbsp;</td>
                <td align="left"><?php echo $item['RequestDetail']['price']; ?>&nbsp;</td>
                <td align="left"><?php echo makeupDetailStatus($item['RequestDetail']['status']); ?>&nbsp;</td>
                <td align="center">
                    <?php
                    echo $html->image('admin_layout/icn_edit.png', array('url' => array('controller' => 'RequestDetail', 'action' => 'admin_edit', $item['RequestDetail']['id']), 'title' => __('Edit # ' . $stt, true), 'alt' => 'edit'));
                    echo $html->image('admin_layout/icn_trash.png', array('url' => array('controller' => 'RequestDetail', 'action' => 'admin_delete', $item['RequestDetail']['id']), 'title' => __('Delete # ' . $stt, true), 'alt' => 'delete'));
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
        echo sprintf(__('Show %s records on a page.', true), $form->select('rd', $rdOption, $limit, array('empty' => false)));
        ?>
    </div>
    <div id="pagination">
        <?php
        echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled'));
        echo ' | ';
        echo $this->Paginator->numbers();
        echo ' | ';
        echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));
        ?>
    </div>
    <div id="count">
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Result %current% records out of %count% total.', true)
        ));
        ?>
    </div>
</div>
<?php
$js->get("#rd")->event('change', "$('#result_box').load('" . $rdurl . "'+this.value);");
$js->get("a[href*=/sort:], a[href*=/page:]")->event('click', "$('#result_box').load($(this).attr('href'));");
echo $js->writeBuffer();
?>