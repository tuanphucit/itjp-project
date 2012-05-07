<div id="header">
    <p id="title" align="center">T09 Administrator</p>
</div>

<div id="login_box">
    <?php
    //echo $this->Session->flash('auth');
    if ($session->check('Auth.User.id')) {
        echo $this->Html->para(null, __('歓迎 ', true) . $session->read('Auth.User.fullname'));
        echo $this->Html->link(__('ログアウト', true), array('controller' => 'users', 'action' => 'reset', 'admin' => false));
    } else {
        ?>
        <table>
            <?php echo $this->Form->create('User', array('action' => 'login')); ?>
            <tr>
                <td class="head">
                    <?php echo __('メールアドレス'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('email', array('label' => false, 'style' => 'width: 100%;')); ?>
                </td>
            </tr>

            <tr>
                <td class="head"><?php echo __('パスワード'); ?></td>
                <td><?php echo $this->Form->input('password', array('label' => false, 'style' => 'width: 100%;')); ?></td>
            </tr>
            <tr>
                <td></td>
                <td style="float: left;">
                    <?php echo $this->Form->end(__('ログイン', true), array('class' => 'buttonStyle')); ?>
                </td>
            </tr>

        <?php } ?>

    </table>

</div>
