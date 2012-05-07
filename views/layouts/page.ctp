<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
?>
<?php echo $html->docType(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <?php echo $html->charset(); ?>
        <meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
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
        	'common'
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
                    <?php echo $html->link(__('ホーム', true), array('controller' => 'pages', 'action' => 'display', 'home'), array('id' => 'home')); ?>
                </li>
                <li>
                    <?php echo $html->link(__('連絡', true), array('controller' => 'pages', 'action' => 'display', 'contact_us'), array('id' => 'email')); ?>
                </li>
                <?php if ($session->check('Auth.User.id')): ?>
                    <li>
                        <?php
                        __('歓迎');
                        echo $html->link($session->read('Auth.User.fullname'), array('controller' => 'users', 'action' => 'view', $session->read('Auth.User.id')),array('class'=>'userlink'));
                        echo ' ( ' . $html->link(__('ログアウト', true), array('controller' => 'users', 'action' => 'logout'),array('class'=>'userlink')) . ' )';
                        ?>
                    </li>
                <?php else : ?>
                    <li>
                        <?php
                        echo $html->link('ログイン', array('controller' => 'users', 'action' => 'login'),array('class'=>'userlink'));
                        echo ' / ';
                        echo $html->link('登録', array('controller' => 'users', 'action' => 'register'),array('class'=>'userlink'));
                        ?>
                    </li>
                <?php endif; ?>
            </ul>
            <p><?php __('ホートライン'); ?> <span>1-999-666-888</span></p>
            <a id="logo" style="margin-left: 0;width: 350px"><?php echo $this->Session->flash(); ?></a>
            <?php echo $this->element('navigator'); ?>
            <div id="featured">
                <div class="first">
                    <ul>
                        <li class="selected first">
                            <?php echo $html->link(__('会議室', true), array('controller' => 'rooms', 'action' => 'index')); ?>
                            <div>
                                <a><?php echo $html->image('room_img.jpg', array('style' => 'weight:630px;height:341px')); ?></a>
                            </div>
                        </li>
                        <li>
                            <?php echo $html->link(__('ホット会議室', true), array('controller' => 'rooms', 'action' => 'index')); ?>
                            <div>
                                <a href="deals.html"><img src="images/riverside.jpg" alt=""/></a>
                           </div>
                        </li>
                        <li>
                            <?php echo $html->link(__('会議室一覧', true), array('controller' => 'rooms', 'action' => 'index')); ?>
                            <div>
                                <a href="offers.html"><img src="images/mountains.jpg" alt=""/></a>
                               
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3><?php __('会議室検索'); ?></h3>
                    <?php
                    $seatOpts = array(
                        '1' => ' < 10 ' . __('座席', true),
                        '2' => '10 ~ 20 ' . __('座席', true),
                        '3' => '20 ~ 30 ' . __('座席', true),
                        '4' => '30 ~ 50 ' . __('座席', true),
                        '5' => ' > 100 ' . __('座席', true)
                    );
                    echo $form->create('Room', array('url' => array('controller' => 'rooms', 'action' => 'find')));
                    echo $form->select('type', $listRoomTypes, null, array('empty' => __('各タイプ', true)));
                    echo $form->select('seat', $seatOpts, null, array('empty' => __('各座席数量', true)));
                    echo $form->input('ftime', array('type' => 'text', 'id' => 'fTimeInput', 'label' => 'から :'));
                    echo $form->input('ttime', array('type' => 'text', 'id' => 'tTimeInput', 'label' => 'まで :'));
                    echo $form->button('検索', array('type' => 'submit'));
                    echo $form->end();
                    ?>
                    <div>
                        <h3><?php __('Notice'); ?></h3>
                        <ul>
                            <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();" scrolldelay="100" style="height: 200px; margin-top: 13px; margin-bottom: 7px;">
                                <li>
                                    <?php echo $html->link(__('タイトル注意', true), array('')) ?>
                                    <p><?php __('注意内容'); ?></p>
                                </li>
                                <li>
                                    <?php echo $html->link(__('使っていない会議室チェック', true), array('')); ?>
                                    <p><?php __('あなたが会議室をチェックそして、予約できます。'); ?></p>
                                </li>
                            </marquee>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 
        <div id="content">

            <?php echo $content_for_layout; ?>
        </div>
        <div id="footer">
            <?php echo $this->element('footer'); ?>
        </div>
        <script type="text/javascript">
            $(function() {
                var dates = $("#fTimeInput, #tTimeInput").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    numberOfMonths: 1,
                    onSelect: function(selectedDate) {
                        var option = this.id == "fTimeInput" ? "minDate" : "maxDate",
                        instance = $(this).data( "datepicker" ),
                        date = $.datepicker.parseDate(
                        instance.settings.dateFormat ||
                            $.datepicker._defaults.dateFormat,
                        selectedDate, instance.settings );
                        dates.not(this).datepicker( "option", option, date );
                    }
                });
            });    
        </script>
    </body>
</html>
