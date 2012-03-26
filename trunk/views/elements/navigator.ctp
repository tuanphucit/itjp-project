<ul class="navigation">
    <li class="selected first">
        <?php echo $html->link(__('Home', true), array('controller' => 'pages', 'action' => 'display', 'home')); ?>
    </li>
    <li>
        <?php echo $html->link(__('About Us', true), array('controller' => 'pages', 'action' => 'display', 'aboutus')); ?>
    </li>
    <li>
        <?php echo $html->link(__('Service', true), array('controller' => 'pages', 'action' => 'display', 'service')); ?>
    </li>
    <li>
        <?php echo $html->link(__('Sign In', true), array('controller' => 'users', 'action' => 'login')); ?>
    </li>
    <li>
        <?php echo $html->link(__('FAQ', true), array('controller' => 'pages', 'action' => 'display', 'faq')); ?>
    </li>
</ul>