<ul class="navigation">
    <li class="first<?php echo $page == 'home' ? ' selected' : ''; ?>">
        <?php echo $html->link(__('Home', true), array('controller' => 'pages', 'action' => 'display', 'home')); ?>
    </li>
    <li <?php echo $page == 'about_us' ? 'class="selected"' : ''; ?>>
        <?php echo $html->link(__('About Us', true), array('controller' => 'pages', 'action' => 'display', 'about_us')); ?>
    </li>
    <li <?php echo $page == 'service' ? 'class="selected"' : ''; ?>>
        <?php echo $html->link(__('Service', true), array('controller' => 'pages', 'action' => 'display', 'service')); ?>
    </li>
    <li <?php echo $page == 'login' ? 'class="selected"' : ''; ?>>
        <?php echo $html->link(__('Sign In', true), array('controller' => 'users', 'action' => 'login')); ?>
    </li>
    <li <?php echo $page == 'faq' ? 'class="selected"' : ''; ?>>
        <?php echo $html->link(__('FAQ', true), array('controller' => 'pages', 'action' => 'display', 'faq')); ?>
    </li>
</ul>