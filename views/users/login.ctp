<div id="about">
    <h2 style="text-align: center"><?php __('Sign In'); ?></h2>
    <?php echo $this->Session->flash(); ?>
    <table style="margin: 20px auto">
        <?php if ($session->check('Auth.User.id')) : ?>
            <tr>
                <td>
                    <?php echo $html->para(null, __('Welcome ', true) . $session->read('Auth.User.fullname')); ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $html->link(__('Logout', true), array('controller' => 'users', 'action' => 'logout')); ?></td>
            </tr>
        <?php else : ?>
            <?php echo $form->create('User', array('action' => 'login', 'name' => 'form')); ?>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('Email'); ?></td>
                <td>:</td>
                <td><?php echo $form->text('email', array('div' => false, 'style' => 'width: 200px')); ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('Password'); ?></td>
                <td>:</td>
                <td><?php echo $form->text('password', array('div' => false, 'style' => 'width: 200px')); ?></td>
            </tr>
            <tr >
                <td colspan="3" style="text-align: center; padding-top: 30px">
                    <?php echo $form->button(__('Login', true), array('div' => false, 'type' => 'submit')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">
                    <?php echo $this->Html->link('Create An Acount?', array('controller' => 'users', 'action' => 'register')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">
                    <?php echo $this->Html->link('Forgot Your Password?', array('controller' => 'users', 'action' => 'forgotpassword')); ?>
                </td>
            </tr>
            <?php echo $form->end(); ?>
        <?php endif; ?>
    </table>
</div>

