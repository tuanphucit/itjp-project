<ul id="navigation">
    <li>
        <?php echo $html->link(__('Home', true), array('controller' => 'pages', 'action' => 'display', 'home'), array('id' => 'home')); ?>
    </li>
    <li>
        <?php echo $html->link(__('Contact Us', true), array('controller' => 'pages', 'action' => 'display', 'contact_us'), array('id' => 'email')); ?>
    </li>
</ul>
<p><?php __('Talk to us by hotline '); ?> <span>1-999-666-888</span></p>
<a id="logo"></a>
