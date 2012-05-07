<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
?>
<div id="about">
    <h2><?php __('Your Profile'); ?></h2>
    <?php //debug($User); ?>
    <table style="margin: 50px auto">
        <tr>
            <td class="head" style="padding: 5px 2px;"><?php __('Full Name'); ?></td>
            <td>:</td>
            <td><?php echo $User['User']['fullname']; ?></td>
        </tr>
        <tr>
            <td class="head" style="padding: 5px 2px;"><?php __('Email'); ?></td>
            <td>:</td>
            <td><?php echo $User['User']['email']; ?></td>
        </tr>
        <tr>
            <td class="head" style="padding: 5px 2px;"><?php __('Phone No.'); ?></td>
            <td>:</td>
            <td><?php echo $User['User']['phone']; ?></td>
        </tr>
        <tr>
            <td class="head" style="padding: 5px 2px;"><?php __('Company'); ?></td>
            <td>:</td>
            <td><?php echo $User['Company']['name']; ?></td>
        </tr>
        <tr>
            <td class="head" style="padding: 5px 2px;"><?php __('Local Phone'); ?></td>
            <td>:</td>
            <td><?php echo $User['User']['local_phone']; ?></td>
        </tr>
        <tr>
            <td class="head" style="padding: 5px 2px;"><?php __('Number of Booked'); ?></td>
            <td>:</td>
            <td><?php echo count($User['Request']); ?></td>
        </tr>
    </table>
</div>
