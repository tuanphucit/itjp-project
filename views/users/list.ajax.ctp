<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$stt = ($this->Paginator->current() - 1 ) * $limit;
$rdurl = $html->url(array('action' => 'index', $rdurl));
/**
 * makeup for status of user
 * @var int $statusid
 * @return String
 */
function makeupStatus($statusid) {
    switch ((int) $statusid) {
        case USER_STATUS_REGISTERED:
            return __('未確認', true);
            break;
        case USER_STATUS_ACTIVE:
            return __('アクティブ', true);
            break;
        case USER_STATUS_DISABLE:
            return __('無効化', true);
            break;
        case USER_STATUS_DELETE:
            return __('削除', true);
            break;
        default:
            return __('知らない', true);
            break;
    }
}

/**
 * makeup for type of user
 * @var int $statusid
 * @return String
 */
function makeupType($typeid) {
    switch ((int) $typeid) {
        case USER_ROLE_ADMIN:
            return __('管理者', true);
            break;
        case USER_ROLE_NORMAL_USER:
            return __('テナント', true);
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
            <?php
            echo $form->select('itemaction', array(), null, array('empty' => '--選択--'));
            echo $form->button('サブミット', array('type' => 'button'));
            ?>
            <ul class="tabs">
                <li><?php echo $html->link(__('新テナントを追加', true), array('action' => 'admin_add'), array('title' => __('新テナント追加', true))); ?></li>
            </ul>
        </div>
    </div>
    <table class="tablesorter" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 5%" class="tableheader"><?php __("#"); ?></th>
                <th style="width: 5%" class="tableheader"><?php echo $form->checkbox('allbox', array('onclick' => 'checkAll()')); ?></th>
                <th style="width: 6%" class="tableheader"><?php echo $this->Paginator->sort(__('コード', true), 'usercode'); ?></th>
                <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('氏名', true), 'fullname'); ?></th>
                <th style="width: 8%" class="tableheader"><?php echo $this->Paginator->sort(__('内線電話', true), 'local_phone'); ?></th>
                <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('メールアドレス', true), 'email'); ?></th>
                <th style="width: 8%" class="tableheader"><?php echo $this->Paginator->sort(__('タイプ', true), 'type'); ?></th>
                <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('作成時間', true), 'created_time'); ?></th>
                <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('最終予約', true), 'last_booked'); ?></th>
                <th style="width: 8%" class="tableheader"><?php echo $this->Paginator->sort(__('状態', true), 'status'); ?></th>
                <th style="width: 10%" class="tableheader"><?php __('行動'); ?></th>
            </tr>
        </thead>
        <?php if (count($list) == 0): ?>
            <tr>
                <td colspan="11" align="center" style="height: 100px">
                    <strong><?php __('一人のテナントさんも見つけません'); ?></strong>
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
                    <td align="center"><?php echo $form->checkbox('User.SelectItem.' . ($stt - 1), array('value' => $item['User']['id'], 'title' => __('Select # ' . $stt, true), 'class' => 'cb_item')); ?></td>
                    <td align="left"><?php echo $item['User']['usercode']; ?>&nbsp;</td>
                    <td align="left"><?php echo $item['User']['fullname']; ?>&nbsp;</td>
                    <td align="right"><?php echo $item['User']['local_phone']; ?>&nbsp;</td>
                    <td align="left"><?php echo $item['User']['email']; ?>&nbsp;</td>
                    <td align="center"><?php echo makeupType($item['User']['role']); ?>&nbsp;</td>
                    <td align="center"><?php echo $item['User']['created_time']; ?>&nbsp;</td>
                    <td align="center"><?php echo $item['User']['last_booked']; ?>&nbsp;</td>
                    <td align="center"><?php echo makeupStatus($item['User']['status']); ?>&nbsp;</td>
                    <td style="padding: 5px 5px" align="center">
                        <?php
                        echo $html->image('admin_layout/icn_aprove.gif', array('url' => array('action' => 'admin_view', $item['User']['id']), 'title' => __('View # ' . $stt, true), 'alt' => 'view'));
                        echo $html->image('admin_layout/icn_edit.png', array('url' => array('action' => 'admin_edit', $item['User']['id']), 'title' => __('Edit # ' . $stt, true), 'alt' => 'edit'));
                        echo $html->image('admin_layout/icn_trash.png', array('url' => array('action' => 'admin_delete', $item['User']['id']), 'title' => __('Delete # ' . $stt, true), 'alt' => 'delete', 'onclick' => "return confirm('" . __('Are you sure to delete?', true) . "')"));
                        echo $html->image('admin_layout/icn_alert_warning.png', array('url' => array('action' => 'admin_bakking', $item['User']['id']), 'title' => __('Punish # ' . $stt, true), 'alt' => 'punish', 'onclick' => "return confirm('" . __('Are you sure to punish?', true) . "')"));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</form>
<div class="module_footer">
    <div id="limit">
        <?php
        $rdOption = array('5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25');
        echo sprintf(__('%s個のレコードパーページで表示.', true), $form->select('rd', $rdOption, $limit, array('empty' => false)));
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
            'format' => __('%current%レコード/合計%count%個.', true)
        ));
        ?>
    </div>
</div>
<?php
$js->get("#rd")->event('change', "$('#result_box').load('" . $rdurl . "'+this.value);");
$js->get("a[href*=/sort:], a[href*=/page:]")->event('click', "$('#result_box').load($(this).attr('href'));");
echo $js->writeBuffer();
?>