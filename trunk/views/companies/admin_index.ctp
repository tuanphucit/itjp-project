<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('会社管理', true), '/admin/companies');
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('会社管理') ?></h3>
    </div>
    <div id="search_box" class="module_content">
        <?php 
        echo $form->create('会社');
        echo $form->input('code', array('label'=>__('会社コード',true),'type'=>'text','div'=>false));
        echo $form->input('name', array('lable'=>__('会社名',true),'type'=>'text','div'=>false));
        echo $form->button('検索', array('type'=>'submit'));
        echo $form->button('リセット', array('type'=>'reset'));
        echo $form->end();
        ?>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../companies/list.ajax'); ?>
</div>
