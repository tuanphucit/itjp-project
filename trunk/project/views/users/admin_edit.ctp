<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('Website Admin', true), '/admin');
$html->addCrumb(__('Users Management', true), '/admin/users');
$html->addCrumb(__('Edit User', true), '/admin/users/edit');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('Edit User') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('Back to List', true), array('action' => 'admin_index'), array('title' => __('Back to List', true))); ?></li>
            </ul>
        </div>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin edit user
        $stsOptions = array(
            '2' => __('Registerd', true),
            '1' => __('Actived', true),
            '0' => __('Disabled', true)
        );
        $roleOptions = array(
            '1' => __('Nomal', true),
            '2' => __('Admin', true)
        );
        echo $form->create('User', array('onsubmit' => "return confirm('" . __('Are you sure to edit?', true) . "')"));
        echo $form->input('fullname', array('label' => __('Full Name', true), 'type' => 'text'));
        echo $form->input('email', array('label' => __('Email', true), 'type' => 'text'));
        echo $form->input('phone', array('label' => __('Phone', true), 'type' => 'text'));
        echo $form->input('company', array('label' => __('Company', true), 'type' => 'select', 'options' => $listCompanies, 'empty' => __(' -- select -- ', true)));
        echo $form->input('localphone', array('label' => __('Local Phone', true), 'type' => 'text'));
        echo $form->input('usercode', array('label' => 'User Code', 'type' => 'text', 'disabled' => true));
        //echo $form->input('role', array('label' => __('User Type', true), 'type' => 'radio', 'options' => $roleOptions, 'value' => '1'));
        echo $form->input('status', array('label' => __('Status', true), 'type' => 'radio', 'options' => $stsOptions));
        echo $form->button(__('Submit', true), array('type' => 'submit'));
        echo $form->end();
        ?>
    </div>
</div>
