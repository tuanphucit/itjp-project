<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
?>
<div id="about">
    <h2 style="text-align: center"><?php __('ログイン'); ?></h2>
    <?php echo $this->Session->flash(); ?>
    <table style="margin: 80px auto">
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
            <?php echo $form->create('User', array('action' => 'login', 'name' => 'form')); ?>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('メールアドレス'); ?></td>
                <td>:</td>
                <td><?php echo $form->text('email', array('div' => false, 'style' => 'width: 200px')); ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('パスワード'); ?></td>
                <td>:</td>
                <td><?php echo $form->password('password', array('div' => false, 'style' => 'width: 200px')); ?></td>
            </tr>
            <tr >
                <td colspan="3" style="text-align: center; padding-top: 30px">
                    <?php echo $form->button(__('ログイン', true), array('div' => false, 'type' => 'submit')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">
                    <?php echo $this->Html->link('新しいアカウントを作成する', array('controller' => 'users', 'action' => 'register')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">
                    <?php echo $this->Html->link('パスワードを忘れてしまいました？', array('controller' => 'users', 'action' => 'forgotpassword')); ?>
                </td>
            </tr>
            <?php echo $form->end(); ?>
        <?php endif; ?>
    </table>
</div>

