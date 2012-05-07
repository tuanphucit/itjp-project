<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('Website Admin', true), '/admin');
$html->addCrumb(__('Companies Management', true), '/admin/companies');
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('Companies Management') ?></h3>
    </div>
    <div id="search_box" class="module_content">
        <?php 
        echo $form->create('Company');
        echo $form->input('code', array('label'=>__('Company Code',true),'type'=>'text','div'=>false));
        echo $form->input('name', array('lable'=>__('Company Name',true),'type'=>'text','div'=>false));
        echo $form->button('Search', array('type'=>'submit'));
        echo $form->button('Reset', array('type'=>'reset'));
        echo $form->end();
        ?>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../companies/list.ajax'); ?>
</div>
