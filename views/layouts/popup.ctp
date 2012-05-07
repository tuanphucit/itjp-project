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
            'alert_style',
            'aristo/jquery-ui'
        ));
        echo $html->script(array(
            'jquery-1.5.1.min',
            'jquery-ui.min'
        ));
        echo $scripts_for_layout;
        ?>
    </head>
    <body>
        <?php echo $this->Session->flash(); ?>
        <?php echo $content_for_layout; ?>
        <?php //echo $this->element('sql_dump'); ?>
    </body>
</html>
