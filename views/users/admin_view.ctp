<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
/* @var $listRoomTypes */
$html->addCrumb(__('Website Admin', true), '/admin');
$html->addCrumb(__('Users Management', true), '/admin/users');
$html->addCrumb(__('View User', true), '/admin/users/view');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('View Profile') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('Edit this user', true), array('action' => 'admin_edit', $user['User']['id']), array('title' => __('Edit this user', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('Back to List', true), array('action' => 'admin_index'), array('title' => __('Back to List', true))); ?></li>
            </ul>
        </div>
    </div>
    <div class="module_content">
        <?php 
        //TODO : lam giao dien phan view thong tin user
        //debug($user); 
        ?>
        <table>
            <tr>
                <td><?php __('Full Name');?></td>
                <td><?php echo $user['User']['fullname'];?></td>
            </tr>
            <tr>
                <td><?php __('User Code');?></td>
                <td><?php echo $user['User']['usercode'];?></td>
            </tr>
            <tr>
                <td><?php __('Phone');?></td>
                <td><?php echo $user['User']['phone'];?></td>
            </tr>
            <tr>
                <td><?php __('Email');?></td>
                <td><?php echo $user['User']['email'];?></td>
            </tr>
            <tr>
                <td><?php __('Company');?></td>
                <td><?php echo $user['Company']['name'];?></td>
            </tr>
        </table>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../users/list_booked.ajax'); ?>
</div>