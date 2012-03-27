<ul id="navigation">
    <li>
        <?php echo $html->link(__('Home', true), array('controller' => 'pages', 'action' => 'display', 'home'), array('id' => 'home')); ?>
    </li>
    <li>
        <?php echo $html->link(__('Contact Us', true), array('controller' => 'pages', 'action' => 'display', 'contact_us'), array('id' => 'email')); ?>
    </li>
    <?php if ($session->check('Auth.User.id')): ?>
        <li>
            <?php
            __('Welcome ');
            echo $html->link($session->read('Auth.User.fullname'), array('controller' => 'users', 'action' => 'view', $session->read('Auth.User.id')), array('class' => 'userlink'));
            echo ' ( ' . $html->link(__('Logout', true), array('controller' => 'users', 'action' => 'logout'), array('class' => 'userlink')) . ' )';
            ?>
        </li>
    <?php else : ?>
        <li>
            <?php
            echo $html->link(__('Login', true), array('controller' => 'users', 'action' => 'login'), array('class' => 'userlink'));
            echo ' / ';
            echo $html->link(__('Register', true), array('controller' => 'users', 'action' => 'register'), array('class' => 'userlink'));
            ?>
        </li>
    <?php endif; ?>
</ul>
<p><?php __('Talk to us by hotline '); ?> <span>1-999-666-888</span></p>
<a id="logo"></a>
