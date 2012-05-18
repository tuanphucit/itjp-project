<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('ユーザ管理', true), '/admin/users');
$html->addCrumb(__('Bakking', true), '/admin/users/bakking');
$html->script(array('jquery-1.5.1.min', 'jquery-ui.min'), array('inline' => false));
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('Bakking') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('リストページへ戻る', true), array('action' => 'admin_index'), array('title' => __('リストページへ戻る', true))); ?></li>
            </ul>
        </div>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin edit user
        echo $form->create('User', array('onsubmit' => "return confirm('" . __('That su ban co muon bakking user nay？', true) . "')"));
        echo $form->input('userid', array('label' => null, 'style' => 'display:none'));
        echo $form->input('fullname', array('label' => __('氏名', true), 'type' => 'text', 'disabled' => 'true'));
        echo $form->input('time', array('label' => __('Date', true), 'type' => 'text', 'id' => 'datepicker'));
        echo $form->input('note', array('label' => __('Note', true), 'type' => 'textarea'));
        echo $form->button(__('サブミット', true), array('type' => 'submit'));
        echo $form->end();
        ?>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var dates = $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            numberOfMonths: 1
        });
    });
</script>