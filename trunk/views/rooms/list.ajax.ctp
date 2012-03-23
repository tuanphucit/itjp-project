<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$stt = 0;
//$this->Paginator->options(array(
//    'update' => '#result_box',
//    'evalScripts' => true
//));
?>
<div id="action_box">
    <?php
    echo $form->create();
    echo $form->select('itemaction', array(), null, array('empty' => '--Select--'));
    echo $form->button('Submit', array('type' => 'button'));
    ?>
</div>
<div id="list_box">
    <table cellpadding="1" cellspacing="1">
        <tr>
            <th style="width: 3%"><?php __("#"); ?></th>
            <th style="width: 3%"><?php echo $this->Form->checkbox('allbox', array('onclick' => 'checkAll()')); ?></th>
            <th style="width: 5%" class="sortLink"><?php echo $this->Paginator->sort(__('Room', true), 'name'); ?></th>
            <th style="width: 10%" class="sortLink"><?php echo $this->Paginator->sort(__('Type', true), 'RoomType.name'); ?></th>
            <th style="width: 8%" class="sortLink"><?php echo $this->Paginator->sort(__('Quantity Seat', true), 'quantity_seat'); ?></th>
            <th style="width: 10%" class="sortLink"><?php echo $this->Paginator->sort(__('Renting Fee', true), 'renting_fee'); ?></th>
            <th style="width: 8%" class="sortLink"><?php echo $this->Paginator->sort(__('Description', true), 'description'); ?></th>
            <th style="width: 35%" class="sortLink"><?php echo $this->Paginator->sort(__('Status', true), 'status'); ?></th>
            <th style="width: 10%" class="sortLink"><?php echo $this->Paginator->sort(__('Image', true), 'image'); ?></th>
            <th style="width: 8%" class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php foreach ($list as $item) : ?>
            <?php
            $class = null;
            if ($stt++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <?php //TODO ?>
                <td align="center"><?php echo $stt; ?>&nbsp;</td>
                <td align="center"><?php echo $form->checkbox('Request.SelectItem.' . ($stt - 1), array('value' => $item['Room']['id'], 'title' => __('Select # ' . $stt, true), 'class' => 'cb_item')); ?></td>
                <td align="left"><?php echo $item['Room']['name']; ?>&nbsp;</td>
                <td align="left"><?php echo $item['RoomType']['name']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['Room']['quantity_seat']; ?>&nbsp;</td>
                <td align="left"><?php echo $item['Room']['renting_fee']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['Room']['description']; ?>&nbsp;</td>
                <td align="left"><?php echo $item['Room']['status']; ?>&nbsp;</td>
                <td align="center"><?php echo $item['Room']['image']; ?>&nbsp;</td>
                <td align="center">
                    <?php
                    echo $html->image('icon/Edit16.png', array('url' => array('action' => 'admin_edit', $item['Room']['id']), 'title' => __('Edit # ' . $stt, true), 'alt' => 'edit'));
                    echo $html->image('icon/Delete16.png', array('url' => array('action' => 'admin_delete', $item['Room']['id']), 'title' => __('Delete # ' . $stt, true), 'alt' => 'delete'));
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<div id="paging_box">
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
//$js->get(".cb_allItem")->event('click', "if(this.checked==false){this.checked=true}else{this.checked=false}");
$js->get("#RequestRd")->event('change', "$('#result_box').load('" . $rdurl . "'+this.value);");
$js->get("a[href*=/sort:], a[href*=/page:]")->event('click', "$('#result_box').load($(this).attr('href'));");
echo $js->writeBuffer();
?>