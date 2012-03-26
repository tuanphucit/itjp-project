<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('Website Admin', true), '/admin');
$html->addCrumb(__('Equipments Management', true), '/admin/equipments');
$html->addCrumb(__('View Equipment', true), '/admin/equipments/view');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('View Equipment') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('Move equipment', true), array('action' => 'admin_move'), array('title' => __('Move this equipment', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('Edit equipment', true), array('action' => 'admin_edit', $equipment['Equipment']['id']), array('title' => __('Edit this equipment', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('Back to List', true), array('action' => 'admin_index'), array('title' => __('Back to List', true))); ?></li>
            </ul>
        </div>
    </div>
    <div class="module_content">
        <?php
        //TODO : lam giao dien phan thong tin ve phong
        ?>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../equipments/list_poe.ajax'); ?>
</div>