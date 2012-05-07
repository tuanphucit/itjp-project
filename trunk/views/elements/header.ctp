<ul id="navigation">
    <li>
        <?php echo $html->link(__('ホーム', true), array('controller' => 'pages', 'action' => 'display', 'home'), array('id' => 'home')); ?>
    </li>
    <li>
        <?php echo $html->link(__('連絡', true), array('controller' => 'pages', 'action' => 'display', 'contact_us'), array('id' => 'email')); ?>
    </li>
    <?php if ($session->check('Auth.User.id')): ?>
        <li>
            <?php
            __('ようこそ ');
            echo $html->link($session->read('Auth.User.fullname'), array('controller' => 'users', 'action' => 'view', $session->read('Auth.User.id')), array('class' => 'userlink'));
            echo ' ( ' . $html->link(__('ログアウト', true), array('controller' => 'users', 'action' => 'logout'), array('class' => 'userlink')) . ' )';
            ?>
        </li>
    <?php else : ?>
        <li>
            <?php
            echo $html->link(__('ログイン', true), array('controller' => 'users', 'action' => 'login'), array('class' => 'userlink'));
            echo ' / ';
            echo $html->link(__('登録', true), array('controller' => 'users', 'action' => 'register'), array('class' => 'userlink'));
            ?>
        </li>
    <?php endif; ?>
</ul>
<p><?php __('ホトライン '); ?> <span>1-999-666-888</span></p>
<a id="logo"></a>
