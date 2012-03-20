<table cellpadding="1" cellspacing="1">
    <tr>
        <?php //TODO : chinh lai head cua table ?>
        <th style="width: 3%"><?php __("#"); ?></th>
        <th style="width: 3%"><?php echo $this->Form->checkbox('allbox', array('onclick' => 'checkAll()')); ?></th>
        <th style="width: 5%" class="sortLink"><?php echo $this->Paginator->sort(__('Room', true), 'Room.name'); ?></th>
        <th style="width: 10%" class="sortLink"><?php echo $this->Paginator->sort(__('Created By', true), 'Reqester.fullname'); ?></th>
        <th style="width: 8%" class="sortLink"><?php echo $this->Paginator->sort(__('Created Time', true), 'create_time'); ?></th>
        <th style="width: 10%" class="sortLink"><?php echo $this->Paginator->sort(__('Updated By', true), 'Updater.fullname'); ?></th>
        <th style="width: 8%" class="sortLink"><?php echo $this->Paginator->sort(__('Updated Time', true), 'update_time'); ?></th>
        <th style="width: 35%" class="sortLink"><?php echo $this->Paginator->sort(__('Note', true), 'Request.note'); ?></th>
        <th style="width: 10%" class="sortLink"><?php echo $this->Paginator->sort(__('Status', true), 'status'); ?></th>
        <th style="width: 8%" class="actions"><?php __('Actions'); ?></th>
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
            <?php //TODO : chinh lai body cua table ?>
            <td><?php echo $i; ?>&nbsp;</td>
            <td><?php echo $this->Form->checkbox('User.check.' . ($i - 1), array('value' => $request['Request']['id'])); ?></td>

            <td><?php echo $request['Room']['name']; ?>&nbsp;</td>
            <td><?php echo $request['Requester']['fullname']; ?>&nbsp;</td>
            <td><?php echo $request['Request']['create_time']; ?>&nbsp;</td>
            <td><?php echo $request['Updater']['fullname']; ?>&nbsp;</td>
            <td><?php echo $request['Request']['update_time']; ?>&nbsp;</td>
            <td><?php echo $request['Request']['note']; ?>&nbsp;</td>
            <td><?php echo $request['Request']['status']; ?>&nbsp;</td>
            <td class="actions">
                <?php
                echo $html->image('icon/Edit16.png', array('url' => array('action' => 'admin_edit', $request['Request']['id']), 'title' => 'Edit', 'alt' => 'edit'));
                echo $html->image('icon/Delete16.png', array('url' => array('action' => 'admin_delete', $request['Request']['id']), 'title' => 'Delete', 'alt' => 'delete'));
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php //TODO : phan con lai phia sau giu nguyen ?>
</table>
<div id="count"></div>
<div style="margin-top: 1em;">
    <div class="show">
        <?php
        $showRecords = array('1' => '1', '2' => '2', '20' => '20', '50' => '50');
        echo $this->Form->create('Show', array('onsubmit' => 'return false;'));
        echo 'Show: ';
        echo $this->Form->select('Record', $showRecords, $limit, array('empty' => false, 'onchange' => "loadPiece('" . $html->url(array('action' => 'admin_index')) . "',$('#ShowRecord').val(),'#search-result')"));
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