<script type="text/javascript">
    $(document).ready(function(){
        $('#goback').click(function(){
            location.href="../";
        });
    });
</script>
<div id="about">
    <h2 style="text-align: center"><?php __('Reset Password'); ?></h2>
    <?php echo $this->Session->flash(); ?>
    <table style="margin: 50px auto">
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
            <?php echo $form->create('User', array('action' => 'forgotpassword')); ?>
            <tr><td colspan="3"><?php __('Input your true email address to get your new password'); ?></td></tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('Email'); ?></td>
                <td>:</td>
                <td><?php echo $form->text('email', array('style' => 'width: 200px', 'error' => true)); ?></td>
            </tr>
            <tr >
                <td colspan="3" style="text-align: center; padding-top: 30px">
                    <?php echo $form->button(__('Get new password', true), array('div' => false, 'type' => 'submit')); ?>
                </td>
            </tr>
            <?php echo $form->end(); ?>
        <?php endif; ?>
    </table>
</div>
