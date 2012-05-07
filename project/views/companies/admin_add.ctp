<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
$html->addCrumb(__('Website Admin', true), '/admin');
$html->addCrumb(__('Companies Management', true), '/admin/companies');
$html->addCrumb(__('Add Company', true), '/admin/companies/add');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('Add Companies') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('Back to List', true), array('action' => 'admin_index'), array('title' => __('Back to List', true))); ?></li>
            </ul>
        </div>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin add new company
        echo $form->create('Company');
        echo $form->input('code', array('type' => 'text'));
        echo $form->input('name', array('type' => 'text'));
        echo $form->end(__('Submit', true));
        ?>
    </div>
</div>