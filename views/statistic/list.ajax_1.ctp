<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
/* @var $stt int */
$stt = 0;

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
<form name="form1" action="statistic/action" method="post">
    <div class="module_header">
        <!--div class="header_action">
        <?php
        $options = array(
            1 => '終了',
            2 => 'キャンセル'
        );
        echo $form->select('itemaction', $options, null, array('empty' => '--Select--'));
        echo $form->button('Submit', array('type' => 'submit'));
        ?>
        <!--ul class="tabs">
            <li class="mod_hea_bt"><?php echo $html->link(__('Add Request', true), array('action' => 'admin_add'), array('title' => __('Add', true))); ?></li>
        </ul-->
        <!--ul class="tabs" style="margin-right: 5px">
            <li class="mod_hea_bt"><?php echo $html->link(__('Export CSV', true), array('action' => 'admin_csvexport'), array('title' => __('Export CSV', true), 'onclick' => 'gotoCSVExport();return false;')); ?></li>
        </ul-->
        </div-->
    </div>
    <table class="tablesorter" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 5%" class="tableheader"><?php __("#"); ?></th>
                <!--th style="width: 5%" class="tableheader"><?php echo $form->checkbox('allbox', array('title' => __('Select all', true), 'class' => 'cb_allItem', 'onclick' => 'checkAll()')); ?></th-->
                <th style="width: 20%" class="tableheader"><?php echo $this->Paginator->sort(__('Room', true), 'Room.name'); ?></th>
                <!--th style="width: 10%" class="tableheader"><?php __('Total Time'); ?></th-->
                <th style="width: 20%" class="tableheader"><?php echo $this->Paginator->sort(__('始まり', true), 'Request.begin_time'); ?></th>
                <th style="width: 20%" class="tableheader"><?php echo $this->Paginator->sort(__('終わり', true), 'Request.end_time'); ?></th>
                <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('時間', true), 'time'); ?></th>
                <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('費の合計', true), 'total_price'); ?></th>
                <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('状態', true), 'Request.status'); ?></th>
        <!--th style="width: 10%" class="tableheader"><?php __('Actions'); ?></th-->
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
                    <!--td align="center"><?php echo $form->checkbox('Request.SelectItem.' . ($stt - 1), array('value' => $item['User']['id'], 'title' => __('Select # ' . $stt, true), 'class' => 'cb_item')); ?></td-->
                    <td align="center"><?php echo $item['Room']['name']; ?>&nbsp;</td>
                    <!--td align="left"><?php echo @$item['total_time']; ?>&nbsp;</td-->
                    <td align="center"><?php echo $item['Request']['begin_time']; ?>&nbsp;</td>
                    <td align="left"><?php echo $item['Request']['end_time']; ?>&nbsp;</td>
                    <td align="center"><?php echo $item['Request']['time']; ?>&nbsp;</td>
                    <td align="center"><?php echo $item['Request']['total_expense']; ?>&nbsp;</td>
                    <td align="center"><?php echo makeupStatus($item['Request']['status']); ?>&nbsp;</td>
                    <!--td style="padding: 5px 5px" align="center">
                    <?php
                    //echo $html->image('admin_layout/icn_aprove.gif', array('url' => array('action' => 'view', $item['User']['id']), 'title' => __('View # ' . $stt, true), 'alt' => 'view'));
                    //echo $html->image('admin_layout/icn_edit.png', array('url' => array('action' => 'admin_edit', $item['Request']['id']), 'title' => __('Edit # ' . $stt, true), 'alt' => 'edit'));
                    //echo $html->image('admin_layout/icn_trash.png', array('url' => array('action' => 'delete', $item['User']['id']), 'title' => __('Delete # ' . $stt, true), 'alt' => 'delete'));
                    ?>
                    </td-->
                </tr>
            <?php endforeach; ?>
<?php endif; ?>
    </table>
</form>
<script type="text/javascript">
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