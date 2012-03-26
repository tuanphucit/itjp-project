<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $list array */
/* @var $rdurl String */
$html->addCrumb(__('Website Admin', true), '/admin');
$html->addCrumb(__('Equipments Management', true), '/admin/equipments');
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('Equipments Management') ?></h3>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : chinh form admin search thiet bi
//        echo $form->create();
//        echo $form->input('fsstatus', array('label' => 'Status:', 'type' => 'select', 'options' => array(), 'div' => false, 'empty' => '--All--'));
//        echo $form->input('fsformtime', array('label' => 'From:', 'type' => 'text', 'div' => false));
//        echo $form->input('fstotime', array('label' => 'To:', 'type' => 'text', 'div' => false));
//        echo $form->input('fscustomer', array('label' => 'Customer:', 'type' => 'text', 'div' => false));
//        echo $form->end(array('label' => 'Search', 'div' => false));
        ?>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../equipments/list.ajax'); ?>
</div>