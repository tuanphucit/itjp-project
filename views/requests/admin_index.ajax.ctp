<table cellpadding="1" cellspacing="1">
    <tr>
        <th><?php __("#"); ?></th>
        <th class="sortLink"><?php echo $this->Paginator->sort('status'); ?></th>
        <th class="sortLink"><?php echo $this->Paginator->sort('roomid'); ?></th>
        <th class="sortLink"><?php echo $this->Paginator->sort('create_by'); ?></th>
        <th class="sortLink"><?php echo $this->Paginator->sort('create_time'); ?></th>
        <th class="sortLink"><?php echo $this->Paginator->sort('note'); ?></th>
        <th class="sortLink"><?php echo $this->Paginator->sort('update_by'); ?></th>
        <th class="sortLink"><?php echo $this->Paginator->sort('update_time'); ?></th>
        <th class="actions"><?php __('Actions'); ?></th>
    </tr>
    <?php
    $i = 0;
    foreach ($requests as $request):
        $class = null;
        if ($i++ % 2 == 0) {
            $class = ' class="altrow"';
        }
        ?>
        <tr<?php echo $class; ?>>
            <td><?php echo $i; ?>&nbsp;</td>
            <td><?php echo $request['Request']['status']; ?>&nbsp;</td>
            <td><?php echo $request['Request']['roomid']; ?>&nbsp;</td>
            <td><?php echo $request['Request']['create_by']; ?>&nbsp;</td>
            <td><?php echo $request['Request']['create_time']; ?>&nbsp;</td>
            <td><?php echo $request['Request']['note']; ?>&nbsp;</td>
            <td><?php echo $request['Request']['update_by']; ?>&nbsp;</td>
            <td><?php echo $request['Request']['update_time']; ?>&nbsp;</td>
            <td class="actions">
                <?php
                echo $html->image('icon/pencil.png', array('url' => array('action' => 'edit', $request['Request']['id']), 'title' => 'edit', 'alt' => 'edit'));
                echo $html->image('icon/delete.png', array('url' => array('action' => 'delete', $request['Request']['id']), 'title' => 'delete', 'alt' => 'delete'));
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<div id="count"></div>
<div style="margin-top: 1em;">
    <div class="show">
        <?php
        echo $this->Form->create('NoRecords', array('onsubmit' => 'return false;'));
        echo 'Show: ';
        echo $this->Form->select('Record', array('1' => '1', '2' => '2', '20' => '20', '50' => '50'), $limit, array('label' => 'Rows of a page', 'empty' => false, 'id' => 'noRecord', 'onchange' => "changeNumberRecords('".$html->url(array('action' => 'admin_index'))."')"));
        echo ' records on a page';
        echo $this->Form->end();
        ?>
    </div>
    <div class="paging" id="pagination">
        <?php echo $this->Paginator->prev('<< ' . __('previous  ', true), array(), null, array('class' => 'disabled')); ?>
        | <?php echo $this->Paginator->numbers(); ?> |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
    <div class="showNoRecord">
        <span style="text-align: right; color: black; float: right;">
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Result %current% records out of %count% total       ', true)
            ));
            ?>
        </span>
    </div>

</div>