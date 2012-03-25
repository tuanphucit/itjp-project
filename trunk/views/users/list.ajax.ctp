<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$stt = ($this->Paginator->current() - 1 ) * $limit;

/**
 * makeup for status of user
 * @var int $statusid
 * @return String
 */
function makeupStatus($statusid) {
    switch ((int) $statusid) {
        case USER_STATUS_REGISTERED:
            return __('Registerd', true);
            break;
        case USER_STATUS_ACTIVE:
            return __('Actived', true);
            break;
        case USER_STATUS_DISABLE:
            return __('Disabled', true);
            break;
        case USER_STATUS_DELETE:
            return __('Deleted', true);
            break;
        default:
            return __('Unknow', true);
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
            return __('Admin', true);
            break;
        case USER_ROLE_NORMAL_USER:
            return __('Normal', true);
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
            echo $form->select('itemaction', array(), null, array('empty' => '--Select--'));
            echo $form->button('Submit', array('type' => 'button'));
            ?>
            <ul class="tabs">
                <li><?php echo $html->link(__('Add New User', true), array('action' => 'admin_add'), array('title' => __('Add New User', true))); ?></li>
            </ul>
        </div>
    </div>
    <table class="tablesorter" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <?php //TODO : chinh lai cho dung ten cac truong    ?>
                <th style="width: 5%" class="tableheader"><?php __("#"); ?></th>
                <th style="width: 5%" class="tableheader"><?php echo $form->checkbox('allbox', array('onclick' => 'checkAll()')); ?></th>
                <th style="width: 16%" class="tableheader"><?php echo $this->Paginator->sort(__('Fullname', true), 'fullname'); ?></th>
                <th style="width: 8%" class="tableheader"><?php echo $this->Paginator->sort(__('Local Phone', true), 'local_phone'); ?></th>
                <th style="width: 20%" class="tableheader"><?php echo $this->Paginator->sort(__('Email', true), 'email'); ?></th>
                <th style="width: 8%" class="tableheader"><?php echo $this->Paginator->sort(__('Type', true), 'type'); ?></th>
                <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('Created', true), 'created_time'); ?></th>
                <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('Last Booked', true), 'last_booked'); ?></th>
                <th style="width: 8%" class="tableheader"><?php echo $this->Paginator->sort(__('Status', true), 'status'); ?></th>
                <th style="width: 10%" class="tableheader"><?php __('Actions'); ?></th>
            </tr>
        </thead>
        <?php foreach ($list as $item) : ?>
            <?php
            $class = null;
            if ($stt++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <?php //TODO    ?>
                <td align="center"><?php echo $stt; ?>&nbsp;</td>
                <td align="center"><?php echo $form->checkbox('User.SelectItem.' . ($stt - 1), array('value' => $item['User']['id'], 'title' => __('Select # ' . $stt, true), 'class' => 'cb_item')); ?></td>
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
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>
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