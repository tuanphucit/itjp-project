<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('会議室タイプ管理', true), '/admin/room_types');
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('会議室タイプ管理') ?></h3>
    </div>
    <!--div id="search_box" class="module_content">
        <?php //ko can form search ?>
    </div-->
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../room_types/list.ajax'); ?>
</div>
