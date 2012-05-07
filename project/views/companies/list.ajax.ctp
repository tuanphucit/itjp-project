<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $list array */
/* @var $rdurl String */
/* @var $stt int */
$stt = ($this->Paginator->current() - 1 ) * $limit;
?>
<form name="form1" action="" method="post">
    <div class="module_header">
        <div class="header_action">
            <?php
            echo $form->select('itemaction', array(), null, array('empty' => '--Select--'));
            echo $form->button('Submit', array('type' => 'button'));
            ?>
            <ul class="tabs">
                <li><?php echo $html->link(__('Add Company', true), array('action' => 'admin_add'), array('title' => __('Add Company', true))); ?></li>
            </ul>
        </div>
    </div>
    <table class="tablesorter" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th style="width: 5%" class="tableheader"><?php __("#"); ?></th>
                <th style="width: 5%" class="tableheader"><?php echo $form->checkbox('SelectAll', array('title' => __('Select all', true), 'class' => 'cb_allItem')); ?></th>
                <th style="width: 20%" class="tableheader"><?php echo $this->Paginator->sort(__('Code', true), 'Company.code'); ?></th>
                <th style="width: 60%" class="tableheader"><?php echo $this->Paginator->sort(__('Name', true), 'Company.name'); ?></th>
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
                    <td align="center"><?php echo $form->checkbox('Company.SelectItem.' . ($stt - 1), array('value' => $item['Company']['id'], 'title' => __('Select # ' . $stt, true), 'class' => 'cb_item')); ?></td>
                    <td align="left"><?php echo $item['Company']['code']; ?>&nbsp;</td>
                    <td align="left"><?php echo $item['Company']['name']; ?>&nbsp;</td>
                    <td align="center">
                        <?php
                        echo $html->image('admin_layout/icn_edit.png', array('url' => array('action' => 'admin_edit', $item['Company']['id']), 'title' => __('Edit # ' . $stt, true), 'alt' => 'edit'));
                        echo $html->image('admin_layout/icn_trash.png', array('url' => array('action' => 'admin_delete', $item['Company']['id']), 'title' => __('Delete # ' . $stt, true), 'alt' => 'delete', 'onclick' => "return confirm('" . __('Are you sure to delete?', true) . "')"));
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