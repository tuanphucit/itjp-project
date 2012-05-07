<ul class="navigation">
    <li class="first<?php echo $page == 'home' ? ' selected' : ''; ?>">
        <?php echo $html->link(__('ホーム', true), array('controller' => 'pages', 'action' => 'display', 'home')); ?>
    </li>
    <li <?php echo $page == 'Booking' ? 'class="selected"' : ''; ?>>
        <?php echo $html->link(__('予約', true), array('controller' => 'requests', 'action' => 'index')); ?>
    </li>
    <li <?php echo $page == 'about_us' ? 'class="selected"' : ''; ?>>
        <?php echo $html->link(__('アバウト', true), array('controller' => 'pages', 'action' => 'display', 'about_us')); ?>
    </li>
    <li <?php echo $page == 'contact_us' ? 'class="selected"' : ''; ?>>
        <?php echo $html->link(__('連絡', true), array('controller' => 'pages', 'action' => 'display', 'contact_us')); ?>
    </li>
    <?php if ($session->check('Auth.User.id')): ?>
        <li <?php echo $page == 'profile' ? 'class="selected"' : ''; ?>>
            <?php echo $html->link(__('プロファイル', true), array('controller' => 'users', 'action' => 'view')); ?>
        </li>
    <?php else : ?>
        <li <?php echo $page == 'login' ? 'class="selected"' : ''; ?>>
            <?php echo $html->link(__('ログイン', true), array('controller' => 'users', 'action' => 'login')); ?>
        </li>
    <?php endif; ?>
    <li <?php echo $page == 'faq' ? 'class="selected"' : ''; ?>>
        <?php echo $html->link(__('FAQ', true), array('controller' => 'pages', 'action' => 'display', 'faq')); ?>
    </li>
</ul>