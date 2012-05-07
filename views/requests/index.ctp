<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->script(array('jquery-1.5.1.min', 'jquery-ui.min.js'), array('inline' => false));
$html->link(array('aristo/jquery-ui'), array('inline' => false));
$stt = 0;
$stsOptions = array(
    REQUEST_STATUS_INIT => 'Khoi tao',
    REQUEST_STATUS_APROVED => 'Da dc phe duyet',
    REQUEST_STATUS_CANCELED => 'Da huy',
    REQUEST_STATUS_FINISH => 'Ket thuc'
);
?>
<div id="about">
    <h2><?php __('List Booking'); ?></h2>
    <div id="search_box">
        <?php
        echo $form->create();
        echo $form->input('fsstatus', array('label' => 'Status:', 'type' => 'select', 'options' => $stsOptions, 'div' => false, 'empty' => '--All--'));
        echo $form->input('fsfromtime', array('type' => 'text', 'id' => 'fTimeInput', 'label' => 'から :', 'div' => false));
        echo $form->input('fstotime', array('type' => 'text', 'id' => 'tTimeInput', 'label' => 'まで :', 'div' => false));
        echo $form->end(array('label' => 'Search', 'div' => false));
        ?>
    </div>
    <div id="result_box">
        <?php

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
        <form name="form1" action="" method="post">
            <div class="module_header">
                <div class="header_action">
                    <ul class="tabs">
                        <li class="mod_hea_bt"><?php echo $html->link(__('Add Request', true), array('action' => 'admin_add'), array('title' => __('Add', true),'onclick'=>'doAddRequest();return false;')); ?></li>
                    </ul>
                    <ul class="tabs" style="margin-right: 5px">
                        <li class="mod_hea_bt"><?php echo $html->link(__('Export CSV', true), array('action' => 'admin_csvexport'), array('title' => __('Export CSV', true), 'onclick' => 'gotoCSVExport();return false;')); ?></li>
                    </ul>
                    <?php
                    echo $form->select('itemaction', array(), null, array('empty' => '--Select--'));
                    echo $form->button('Submit', array('type' => 'button'));
                    ?>
                </div>
            </div>
            <table class="tablesorter" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 5%" class="tableheader"><?php __("#"); ?></th>
                        <th style="width: 5%" class="tableheader"><?php echo $form->checkbox('SelectAll', array('title' => __('Select all', true), 'class' => 'cb_allItem')); ?></th>
                        <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('Room', true), 'Room.name'); ?></th>
                        <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('Date', true), 'Request.date'); ?></th>
                        <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('Begin Time', true), 'Request.begin_time'); ?></th>
                        <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('End Time', true), 'Request.end_time'); ?></th>
                        <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('Time', true), 'time'); ?></th>
                        <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('Total Expense', true), 'total_price'); ?></th>
                        <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('Status', true), 'Request.status'); ?></th>
                        <th style="width: 10%" class="tableheader"><?php __('Actions'); ?></th>
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
                            <td align="center"><?php echo $form->checkbox('Request.SelectItem.' . ($stt - 1), array('value' => $item['Request']['id'], 'title' => __('Select # ' . $stt, true), 'class' => 'cb_item')); ?></td>
                            <td align="left"><?php echo $item['Room']['name']; ?>&nbsp;</td>
                            <td align="left"><?php echo $item['Request']['date']; ?>&nbsp;</td>
                            <td align="center"><?php echo $item['Request']['begin_time']; ?>&nbsp;</td>
                            <td align="left"><?php echo $item['Request']['end_time']; ?>&nbsp;</td>
                            <td align="center"><?php echo $item['0']['time']; ?>&nbsp;</td>
                            <td align="center"><?php echo $item['0']['total_price']; ?>&nbsp;</td>
                            <td align="center"><?php echo makeupStatus($item['Request']['status']); ?>&nbsp;</td>
                            <td style="padding: 5px 5px" align="center">
                                <?php
                                echo $html->image('admin_layout/icn_aprove.gif', array('url' => array('action' => 'view', $item['Request']['id']), 'title' => __('View # ' . $stt, true), 'alt' => 'view'));
                                //echo $html->image('admin_layout/icn_edit.png', array('url' => array('action' => 'admin_edit', $item['Request']['id']), 'title' => __('Edit # ' . $stt, true), 'alt' => 'edit'));
                                echo $html->image('admin_layout/icn_trash.png', array('url' => array('action' => 'delete', $item['Request']['id']), 'title' => __('Delete # ' . $stt, true), 'alt' => 'delete'));
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        var dates = $("#fTimeInput, #tTimeInput").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            numberOfMonths: 1,
            onSelect: function(selectedDate) {
                var option = this.id == "fTimeInput" ? "minDate" : "maxDate",
                instance = $(this).data( "datepicker" ),
                date = $.datepicker.parseDate(
                instance.settings.dateFormat ||
                    $.datepicker._defaults.dateFormat,
                selectedDate, instance.settings );
                dates.not(this).datepicker( "option", option, date );
            }
        });
    });
    function doAddRequest(){
        mywin = window.open ("<?php echo $html->url(array('controller' => 'requests', 'action' => 'add', 'admin' => false)); ?>","addRequest","status=1,width=400,height=300");
        mywin.focus();
    }
</script>