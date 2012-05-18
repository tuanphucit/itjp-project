<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('ファイル輸出', true), '/admin/statistic/export_file');
//$html->script(array('jquery-1.5.1.min', 'jquery-ui.min'), array('inline' => false));
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('CSV輸出') ?></h3>
        <!--div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('一覧ページに戻る', true), array('action' => 'admin_index'), array('title' => __('一覧ページに戻る', true))); ?></li>
            </ul>
        </div-->
    </div>
    <div id="search_box" class="module_content">
        <?php
        echo $form->create(null, array('type' => 'get', 'url' => array('controller' => 'requests', 'action' => 'admin_csvexport')));
        echo $form->input('month', array('label' => __('Month', true), 'type' => 'select', 'options' => $monthOptions, 'empty' => null, 'div' => false, 'selected' => date('Y-m')));
        echo $form->button(__('OK', true), array('type' => 'submit'));
        ?>
    </div>
</div>
