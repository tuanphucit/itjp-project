<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
?>
<?php echo $html->docType(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $html->charset(); ?>
        <title><?php __('T09'); ?> <?php echo ' :: ' . $title_for_layout; ?>
        </title>
        <?php
        echo $html->meta('icon');
        echo $html->css(array(
            'popup',
            'aristo/jquery-ui',
            'aristo/jquery-ui-timepicker-addon'
        ));
        echo $html->script(array(
            'jquery-1.5.1.min',
            'jquery-ui.min',
            'jquery-ui-timepicker-addon',
            'jquery-ui-sliderAccess'
        ));
        echo $scripts_for_layout;
        ?>
    </head>
    <body>
        <?php echo $content_for_layout; ?>
    </body>
</html>
