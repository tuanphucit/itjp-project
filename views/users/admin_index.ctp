<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('Website Admin', true), '/admin');
$html->addCrumb(__('Users Management', true), '/admin/users');
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('Users Management') ?></h3>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin search user
        $stsOptions = array(
            '2' => __('Registerd', true),
            '1' => __('Actived', true),
            '0' => __('Disabled', true)
        );
        echo $form->create('User');
        echo $form->input('fullname', array('label' => __('Full Name', true), 'type' => 'text', 'div' => false));
        echo $form->input('usercode', array('label' => __('User Code', true), 'type' => 'text', 'div' => false));
        echo $form->input('phone', array('label' => __('Phone', true), 'type' => 'text', 'div' => false));
        echo $form->input('email', array('label' => __('Email', true), 'type' => 'text', 'div' => false));
        echo $form->input('company', array('label' => __('Conpany', true), 'type' => 'select', 'options' => $listCompanies, 'empty' => __('-- all --', true), 'div' => false));
        echo $form->input('localphone', array('label' => __('Local Phone', true), 'type' => 'text', 'div' => false));
        echo $form->input('status', array('label' => __('Status', true), 'type' => 'select', 'options' => $stsOptions, 'empty' => __('-- all --', true), 'div' => false));
        echo $form->button(__('Search', true), array('type' => 'submit', 'div' => false));
        echo $form->button(__('Reset', true), array('type' => 'reset', 'div' => false));
        echo $form->end();
        ?>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../users/list.ajax'); ?>
</div>