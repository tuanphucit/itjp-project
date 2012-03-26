<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
?>
<?php echo $html->docType(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $html->charset(); ?>
        <title><?php __('T09'); ?><?php echo ' :: ' . $title_for_layout; ?></title>
        <?php
        echo $html->meta('icon');
        echo $html->css('style');
        echo $html->script(array(
            'jquery',
            'jquery.validate'
        ));
        if (isset($website_head))
            echo $website_head;
        echo $scripts_for_layout;
        ?>
    </head>
    <body>
        <div id="header">
            <ul id="navigation">
                <li>
                    <?php echo $html->link(__('Home', true), array('controller' => 'pages', 'action' => 'display', 'home'), array('id' => 'home')); ?>
                </li>
                <li>
                    <?php echo $html->link(__('Contact Us', true), array('controller' => 'pages', 'action' => 'display', 'contactus'), array('id' => 'email')); ?>
                </li>
            </ul>
            <p><?php __('Talk to us by hotline '); ?> <span>1-999-666-888</span></p>
            <a href="" id="logo"><!--img src="images/logo.jpg" alt="logo"/--></a>
            <?php echo $this->element('navigator'); ?>
            <div id="featured">
                <div class="first">
                    <ul>
                        <li class="selected first">
                            <a href="featured.html">Featured Destinations</a>
                            <div>
                                <a href="featured.html"><img src="images/couples.jpg" alt=""/></a>
                                <p>This website template has been designed by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> for you, for free. You can replace all this text with your own text.</p>
                            </div>
                        </li>
                        <li>
                            <a href="deals.html">Hot Deals</a>
                            <div>
                                <a href="deals.html"><img src="images/riverside.jpg" alt=""/></a>
                                <p>You can remove any link to our website from this website template, you're free to use this website template without linking back to us.</p>
                            </div>
                        </li>
                        <li>
                            <a href="offers.html">Special Offers</a>
                            <div>
                                <a href="offers.html"><img src="images/mountains.jpg" alt=""/></a>
                                <p>If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forum/">Forum</a>.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3><?php __('Find room'); ?></h3>
                    <form action="">
                        <select name="" id="">
                            <option value="month">Any Month</option>
                        </select>
                        <select name="" id="">
                            <option value="destinations">Any Destinations</option>
                        </select>
                        <select name="" id="">
                            <option value="ship">Any Ship</option>
                        </select>
                        <select name="" id="">
                            <option value="port">Any Departure Port</option>
                        </select>
                        <input type="submit" value=""/>
                    </form>
                    <div>
                        <h3><?php __('Notice'); ?></h3>
                        <ul>
                            <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();" scrolldelay="100" style="height: 200px; margin-top: 13px; margin-bottom: 7px;">
                                <li>
                                    <?php echo $html->link(__('Notice title', true), array('')) ?>
                                    <p><?php __('Content of notice'); ?></p>
                                </li>
                                <li>
                                    <?php echo $html->link(__('Check free time of room', true), array('')); ?>
                                    <p><?php __('You have to check free time of room before booked this. You can check that easily.'); ?></p>
                                </li>
                            </marquee>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 

        <div id="content">
            <?php
            echo $this->Session->flash();
            echo $content_for_layout;
            ?>
        </div>
        <div id="footer">
            <?php $this->element('footer'); ?>
        </div>
    </body>
</html>
