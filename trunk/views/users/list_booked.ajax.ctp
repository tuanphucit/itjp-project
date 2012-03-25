<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
/* @var $listRoomTypes */
$stt = ($this->Paginator->current() - 1 ) * $limit;
?>
<div class="module_header">
    <h3 style="width: 40%"><?php __('List Booked') ?></h3>
    <div class="header_action">
        <ul class="tabs">
            <li><?php echo $html->link(__('View all', true), array('controller' => 'requests', 'action' => 'admin_index'), array('title' => __('View all', true))); ?></li>
        </ul>
    </div>
</div>
<table class="tablesorter" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th style="width: 5%" class="tableheader"><?php __("#"); ?></th>
            <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('Room', true), 'Room.name'); ?></th>
            <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('Created By', true), 'Reqester.fullname'); ?></th>
            <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('Created Time', true), 'create_time'); ?></th>
            <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('Updated By', true), 'Updater.fullname'); ?></th>
            <th style="width: 15%" class="tableheader"><?php echo $this->Paginator->sort(__('Updated Time', true), 'update_time'); ?></th>
            <th style="width: 10%" class="tableheader"><?php echo $this->Paginator->sort(__('Status', true), 'status'); ?></th>
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
            <td align="center"><?php echo $stt; ?>&nbsp;</td>
            <td align="left"><?php echo $item['Room']['name']; ?>&nbsp;</td>
            <td align="left"><?php echo $item['Requester']['fullname']; ?>&nbsp;</td>
            <td align="center"><?php echo $item['Request']['create_time']; ?>&nbsp;</td>
            <td align="left"><?php echo $item['Updater']['fullname']; ?>&nbsp;</td>
            <td align="center"><?php echo $item['Request']['update_time']; ?>&nbsp;</td>
            <td align="center"><?php echo $item['Request']['status']; ?>&nbsp;</td>
            <td align="center">
                <?php
                echo $html->image('admin_layout/icn_edit.png', array('url' => array('action' => 'admin_edit', $item['Request']['id']), 'title' => __('Edit # ' . $stt, true), 'alt' => 'edit'));
                echo $html->image('admin_layout/icn_trash.png', array('url' => array('action' => 'admin_delete', $item['Request']['id']), 'title' => __('Delete # ' . $stt, true), 'alt' => 'delete'));
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
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