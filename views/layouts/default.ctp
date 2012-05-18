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
        echo $html->meta(array('http-equiv' => 'cache-control', 'content' => 'no-cache'));
        echo $html->css(array('style', 'aristo/jquery-ui'));
        echo $html->script(array(
            'jquery',
            'jquery.validate',
        	'common'
        ));
        if (isset($website_head))
            echo $website_head;
        echo $scripts_for_layout;
        ?>
    </head>
    <body>
        <div class="header">
            <?php echo $this->element('header'); ?>

            <?php
            if (isset($page)) {
                echo $this->element('navigator');
            } else {
                echo $this->element('navigator', array('page' => ''));
            }
            ?>
            <div style="margin-left:0;width: 350px;height: 50px"><?php //echo $this->Session->flash(); ?></div>
        </div> 
        <div class="content">
            <?php echo $content_for_layout; ?>
        </div>
        <div id="footer">
            <?php echo $this->element('footer'); ?>
        </div>
    </body>
</html>
