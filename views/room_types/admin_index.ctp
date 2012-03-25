<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('Website Admin', true), '/admin');
$html->addCrumb(__('Room Types Management', true), '/admin/room_types');
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('Room Types Management') ?></h3>
    </div>
    <!--div id="search_box" class="module_content">
        <?php //ko can form search ?>
    </div-->
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../room_types/list.ajax'); ?>
</div>
