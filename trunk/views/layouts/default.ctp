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
        <div class="header">
            <?php echo $this->element('header'); ?>
            <?php
            if (isset($page)) {
                echo $this->element('navigator');
            } else {
                echo $this->element('navigator', array('page' => ''));
            }
            ?>
        </div> 
        <div class="content">
            <?php
            //echo $this->Session->flash();
            echo $content_for_layout;
            ?>
        </div>
        <div id="footer">
            <?php echo $this->element('footer'); ?>
        </div>
    </body>
</html>
