<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('Website Admin', true), '/admin');
$html->addCrumb(__('Equipments Management', true), '/admin/equipments');
$html->addCrumb(__('Edit Equipments', true), '/admin/equipments/edit');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('Edit Equipment') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('Back to List', true), array('action' => 'admin_index'), array('title' => __('Back to List', true))); ?></li>
            </ul>
        </div>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin add new equipment
        echo $form->create('Equipment', array('url' => array('controller' => 'equipments', 'action' => 'edit')));
        echo $form->input('code', array('label' => __('Code', true), 'type' => 'text'));
        echo $form->input('name', array('label' => __('Name', true), 'type' => 'text'));
        echo $form->input('description', array('label' => __('Description', true), 'type' => 'textarea'));
        echo $form->input('price', array('label' => __('Price', true), 'type' => 'text'));
        echo $form->input('quantity', array('label' => __('Quantity', true), 'type' => 'text'));
        echo $form->end(__('Submit', true));
        ?>
    </div>
</div>