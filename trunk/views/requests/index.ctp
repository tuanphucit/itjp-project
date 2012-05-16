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
    REQUEST_STATUS_APROVED => '予約した',
   	REQUEST_STATUS_FINISH => '使用した',
   	REQUEST_STATUS_CANCELED => 'キャンセル',
);
$total = 0;
?>
<div id="about">
    <h2><?php __('予約履歴'); ?></h2>
    <?php echo $this->Session->flash(); ?>
    <div id="search_box">
        <?php
        echo $form->create();
        echo $form->input('fsstatus', array('label' => '状態:', 'type' => 'select', 'options' => $stsOptions, 'div' => false, 'empty' => '--選択--'));
        echo $form->input('fsfromtime', array('type' => 'text', 'id' => 'fTimeInput', 'label' => '始まり :', 'div' => false));
        echo $form->input('fstotime', array('type' => 'text', 'id' => 'tTimeInput', 'label' => '終わり:', 'div' => false));
        echo $form->end(array('label' => '検索', 'div' => false));
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
                    return __('予約', true);
                    break;
                case REQUEST_STATUS_DENIED:
                    return __('Denied', true);
                    break;
                case REQUEST_STATUS_HAS_UPDATED:
                    return __('Has Updated', true);
                    break;
                case REQUEST_STATUS_CANCELED:
                    return __('キャンセル', true);
                    break;
                case REQUEST_STATUS_FINISH:
                    return __('終了', true);
                    break;
                default:
                    return __('Unknow', true);
                    break;
            }
        }
        ?>
        <form name="form1" action="requests/action" method="post">
            <div class="module_header">
                <div class="header_action">
                    <ul class="tabs">
                        <li class="mod_hea_bt"><?php echo $html->link(__('予約追加', true), array('action' => 'admin_add'), array('title' => __('Add', true), 'onclick' => 'doAddRequest();return false;')); ?></li>
                    </ul>
                    <!--<ul class="tabs" style="margin-right: 5px">
                        <li class="mod_hea_bt"><?php echo $html->link(__('Export CSV', true), array('action' => 'admin_csvexport'), array('title' => __('Export CSV', true), 'onclick' => 'gotoCSVExport();return false;')); ?></li>
                    </ul>
                    --><?php
        $options = array(
            1 => 'キャンセル'
        );
        echo $form->select('itemaction', $options, null, array('empty' => '--選択--'));
        echo $form->button('サブミット', array('type' => 'submit'));
        ?>
                </div>
            </div>
            <hr />
            <table class="tablesorter" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width: 5%" class="tableheader"><?php __("#"); ?></th>
                        <th style="width: 5%" class="tableheader"><?php echo $form->checkbox('allbox', array('title' => __('全て選択', true), 'class' => 'cb_allItem', 'onclick' => 'checkAll()')); ?></th>
                        <th style="width: 5%" class="tableheader"><?php echo $this->Paginator->sort(__('室', true), 'Room.name'); ?></th>
<!--                        <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('Date', true), 'Request.date'); ?></th>-->
                        <th style="width: 20%" class="tableheader"><?php echo $this->Paginator->sort(__('始まり', true), 'Request.begin_time'); ?></th>
                        <th style="width: 20%" class="tableheader"><?php echo $this->Paginator->sort(__('終わり', true), 'Request.end_time'); ?></th>
                        <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('時間', true), 'time'); ?></th>
                        <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('費の合計', true), 'total_expense'); ?></th>
                        <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('状態', true), 'Request.status'); ?></th>
                        <th style="width: 10%" class="tableheader"></th>
                    </tr>
                </thead>
                <?php if (count($list) == 0): ?>
                    <tr>
                        <td colspan="11" align="center" style="height: 100px">
                            <strong><?php __('何の結果もありません'); ?></strong>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($list as $item) : ?>
                        <?php
                        $class = null;
                        if ($stt++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                        $total += $item['Request']['total_expense'];
                        ?>
                        <tr<?php echo $class; ?>>
                            <td align="center"><?php echo $stt; ?>&nbsp;</td>
                            <td align="center"><?php echo $form->checkbox('Request.SelectItem.' . ($stt - 1), array('value' => $item['Request']['id'], 'title' => __('Select # ' . $stt, true), 'class' => 'cb_item')); ?></td>
                            <td align="left"><?php echo $item['Room']['name']; ?>&nbsp;</td>
                            <!--<td align="left"><?php echo $item['Request']['date']; ?>&nbsp;</td>
                            --><td align="center"><?php echo $item['Request']['begin_time']; ?>&nbsp;</td>
                            <td align="left"><?php echo $item['Request']['end_time']; ?>&nbsp;</td>
                            <td align="center"><?php echo $item['Request']['time']; ?>&nbsp;</td>
                            <td align="center"><?php echo $item['Request']['total_expense']; ?>&nbsp;</td>
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
        <hr />
        <?php
        __('費の合計');
        echo ': ' . $total;
        ?>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        var dates = $("#fTimeInput, #tTimeInput").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            minDate: '-2Y',
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
    function checkAll(){
        for (var i=0;i<document.form1.elements.length;i++)
        {
            var e=document.form1.elements[i];
            if ((e.name != 'allbox') && (e.type=='checkbox'))
            {
                e.checked=document.form1.allbox.checked;
            }
        }
    }
</script>