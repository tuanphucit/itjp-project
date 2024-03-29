<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
?>
<div id="about">
    <h2><?php __('会議室予約管理システムへようこそ'); ?></h2>
    <?php echo $this->Session->flash(); ?>
    <table style="margin: 50px auto">
        <?php if ($session->check('Auth.User.id')) : ?>
            <tr>
                <td>
                    <?php echo $html->para(null, __('歓迎 ', true) . $session->read('Auth.User.fullname')); ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $html->link(__('ログアウト', true), array('controller' => 'users', 'action' => 'logout')); ?></td>
            </tr>
        <?php else : ?>
            <?php echo $form->create('User', array('action' => 'register')); ?>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('メールアドレス'); ?></td>
                <td>:</td>
                <td><?php echo $form->text('email', array('style' => 'width: 200px', 'error' => true)); ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('パスワード'); ?></td>
                <td>:</td>
                <td><?php echo $form->password('password', array('style' => 'width: 200px', 'error' => true)); ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('パスワード再タイプ'); ?></td>
                <td>:</td>
                <td><?php echo $form->password('password_confirm', array('style' => 'width: 200px', 'error' => true)); ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('氏名'); ?></td>
                <td>:</td>
                <td><?php echo $form->text('fullname', array('style' => 'width: 200px', 'error' => true)); ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('携帯電話 '); ?></td>
                <td>:</td>
                <td><?php echo $form->text('phone', array('style' => 'width: 200px', 'error' => true)); ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('会社'); ?></td>
                <td>:</td>
                <td><?php echo $form->select('companyid', $listCompanies, null, array('empty' => '-- select --', 'error' => true, 'style' => 'width: 200px')); ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('内線電話'); ?></td>
                <td>:</td>
                <td><?php echo $form->text('local_phone', array('div' => false, 'style' => 'width: 200px','error'=>true)); ?></td>
            </tr>
             <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('住所'); ?></td>
                <td>:</td>
                <td><?php echo $form->text('address', array('div' => false, 'style' => 'width: 200px','error'=>true)); ?></td>
            </tr>
            <tr >
                <td colspan="3" style="text-align: center; padding-top: 30px">
                    <?php echo $form->button(__('登録', true), array('div' => false, 'type' => 'submit')); ?>
                </td>
            </tr>
            <?php echo $form->end(); ?>
        <?php endif; ?>
    </table>
</div>
<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function() { alert("submitted!"); }
    });
    $.ready(function() {
        // validate signup form on keyup and submit
        $("#about").validate({
            rules: {
                firstname: "required",
                lastname: "required",
                username: {
                    number: true,
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                firstname: "",
                lastname: "Please enter your lastname",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",
                agree: "Please accept our policy"
            }
        });
    });
</script>
