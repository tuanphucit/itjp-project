<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $session SessionHelper */
/* @var $this View */
?>
<?php echo $html->docType(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $html->charset(); ?>
        <title><?php __('T09'); ?> <?php echo ' :: ' . $title_for_layout; ?>
        </title>
        <?php
        echo $html->meta('icon');
        echo $html->css('aristo/jquery-ui');
        //echo $html->css('aristo/jquery-ui-timepicker-addon');
        echo $html->css('admin_layout');
        echo $html->script('jquery.js');
        //echo $html->script('jquery-ui.min.js');
        //echo $html->script('jquery-ui-timepicker-addon');
        //echo $html->script('jquery-ui-sliderAccess');
        echo $html->script('common');
        echo $html->script('admin_check');
        echo $html->script('hideshow');
        echo $scripts_for_layout;
        ?>
    </head>
    <body>
        <div id="header">
            <h1 class="site_title">
                <?php __('管理者サイト'); ?>
            </h1>
            <h2 class="section_title"><?php echo $title_for_layout; ?></h2>
            <div class="btn_view_site">
                <?php echo $html->link(__('サイトビュー', true), array('controller' => 'pages', 'action' => 'display', 'admin' => false, 'home')); ?>
            </div>
        </div>
        <div id="secondary_bar">
            <div class="user">
                <?php echo $html->para(null, $session->read('Auth.User.fullname')); ?>
                <?php echo $html->link(__('ログアウト', true), array('controller' => 'users', 'action' => 'admin_logout'), array('title' => __('Logout', true), 'class' => 'logout_user')); ?>
            </div>
            <div class="breadcrumbs_container">
                <div class="breadcrumbs">
                    <?php echo $html->getCrumbs('<div class="breadcrumb_divider"></div>'); ?>
                </div>
            </div>
        </div>
        <div id="sidebar" class="column">
            <form class="quick_search">
                <input type="text" value="Quick Search" onfocus="if(this.value=='Quick Search'){this.value=''}" onblur="if(this.value==''){this.value='Quick Search'}" />
            </form>
            <hr />
            <?php echo $this->element('sitebar'); ?>
            <hr style="clear: both" />
            <div id="footer">
                <p>
                    <strong><?php printf(__('Copyright &copy; %d Team 09 - IT Japanese', true), date('Y')); ?></strong>
                </p>
            </div>
        </div>
        <div id="main" class="column">
            <?php echo $this->Session->flash(); ?>
            <div id="content">
                <?php echo $content_for_layout; ?>
            </div>
        </div>
        <?php //echo $this->element('sql_dump');  ?>
    </body>
</html>
