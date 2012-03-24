<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
/* @var $stt int */
$stt = ($this->Paginator->current() - 1 ) * $limit;
//$this->Paginator->options(array(
//    'update' => '#result_box',
//    'evalScripts' => true
//));
?>
<form name="form1" action="" method="post">
    <div class="module_header">
        <div class="header_action">
            <?php
            echo $form->select('itemaction', array(), null, array('empty' => '--Select--'));
            echo $form->button('Submit', array('type' => 'button'));
            ?>
            <ul class="tabs">
                <li class="mod_hea_bt"><?php echo $html->link(__('Add Room Types', true), array('action' => 'admin_add'), array('title' => __('Add', true))); ?></li>
            </ul>
        </div>
    </div>
    <table class="tablesorter" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <?php //TODO : chinh lai cho dung ten cac truong ?>
                <th style="width: 5%" class="tableheader"><?php __("#"); ?></th>
                <th style="width: 5%" class="tableheader"><?php echo $form->checkbox('SelectAll', array('title' => __('Select all', true), 'class' => 'cb_allItem')); ?></th>
                <th style="width: 20%" class="tableheader"><?php echo $this->Paginator->sort(__('Name', true), 'RoomType.name'); ?></th>
                <th style="width: 60%" class="tableheader"><?php echo $this->Paginator->sort(__('Description', true), 'RoomType.description'); ?></th>
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
                <?php //TODO : chinh lai cho dung cac truong ?>
                <td align="center"><?php echo $stt; ?>&nbsp;</td>
                <td align="center"><?php echo $form->checkbox('RoomType.SelectItem.' . ($stt - 1), array('value' => $item['RoomType']['id'], 'title' => __('Select # ' . $stt, true), 'class' => 'cb_item')); ?></td>
                <td align="left"><?php echo $item['RoomType']['name']; ?>&nbsp;</td>
                <td align="left"><?php echo $item['RoomType']['description']; ?>&nbsp;</td>
                <td align="center">
                    <?php
                    echo $html->image('admin_layout/icn_edit.png', array('url' => array('action' => 'admin_edit', $item['RoomType']['id']), 'title' => __('Edit # ' . $stt, true), 'alt' => 'edit'));
                    echo $html->image('admin_layout/icn_trash.png', array('url' => array('action' => 'admin_delete', $item['RoomType']['id']), 'title' => __('Delete # ' . $stt, true), 'alt' => 'delete', 'onclick' => "return confirm('" . __('Are you sure to delete?', true) . "')"));
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