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
        echo $html->css(array(
            'style',
            'aristo/jquery-ui',
//            'aristo/jquery-ui-timepicker-addon'
        ));
        echo $html->script(array(
            'jquery-1.5.1.min',
            'jquery-ui.min',
//            'jquery-ui-timepicker-addon',
//            'jquery-ui-sliderAccess'
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
            <a id="logo"></a>
            <?php echo $this->element('navigator'); ?>
            <div id="featured">
                <div class="first">
                    <ul>
                        <li class="selected first">
                            <?php echo $html->link(__('Conference Room',true), array('controller'=>'rooms','action'=>'index')); ?>
                            <div>
                                <a><?php echo $html->image('room_img.jpg', array('style' => 'weight:630px;height:341px')); ?></a>
                                <p>This website template has been designed by <a href="">Free Website Templates</a> for you, for free. You can replace all this text with your own text.</p>
                            </div>
                        </li>
                        <li>
                            <?php echo $html->link(__('Hot Rooms',true), array('controller'=>'rooms','action'=>'index')); ?>
                            <div>
                                <a href="deals.html"><img src="images/riverside.jpg" alt=""/></a>
                                <p>You can remove any link to our website from this website template, you're free to use this website template without linking back to us.</p>
                            </div>
                        </li>
                        <li>
                            <?php echo $html->link(__('List Rooms',true), array('controller'=>'rooms','action'=>'index')); ?>
                            <div>
                                <a href="offers.html"><img src="images/mountains.jpg" alt=""/></a>
                                <p>If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="">Forum</a>.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3><?php __('Find room'); ?></h3>
                    <?php
                    $seatOpts = array(
                        '1' => ' < 10 ' . __('seats', true),
                        '2' => '10 ~ 20 ' . __('seats', true),
                        '3' => '20 ~ 30 ' . __('seats', true),
                        '4' => '30 ~ 50 ' . __('seats', true),
                        '5' => ' > 100 ' . __('seats', true)
                    );
                    echo $form->create('Room', array('url' => array('controller' => 'rooms', 'action' => 'index')));
                    echo $form->select('type', $listRoomTypes, null, array('empty' => __('Any Type', true)));
                    echo $form->select('seat', $seatOpts, null, array('empty' => __('Any Number Seats', true)));
                    echo $form->input('ftime', array('type' => 'text', 'id' => 'fTimeInput', 'label' => 'From :'));
                    echo $form->input('ttime', array('type' => 'text', 'id' => 'tTimeInput', 'label' => 'To :'));
                    echo $form->button('Find', array('type' => 'submit'));
                    echo $form->end();
                    ?>
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
            <?php echo $this->element('footer'); ?>
        </div>
        <script type="text/javascript">
            $(function() {
                var dates = $("#fTimeInput, #tTimeInput").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear:true,
                    numberOfMonths: 1,
                    onSelect: function( selectedDate ) {
                        var option = this.id == "fTimeInput" ? "minDate" : "maxDate",
                        instance = $( this ).data( "datepicker" ),
                        date = $.datepicker.parseDate(
                        instance.settings.dateFormat ||
                            $.datepicker._defaults.dateFormat,
                        selectedDate, instance.settings );
                        dates.not( this ).datepicker( "option", option, date );
                    }
                });
            });    
        </script>
    </body>
</html>
