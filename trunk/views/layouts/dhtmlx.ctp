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
        echo $html->css(array('style', '/codebase/dhtmlxscheduler'));
        echo $html->script(array('/codebase/dhtmlxscheduler', '/codebase/ext/dhtmlxscheduler_timeline', '/codebase/ext/dhtmlxscheduler_treetimeline'));
        if (isset($website_head))
            echo $website_head;
        echo $scripts_for_layout;
        ?>
        <style type="text/css" media="screen">
            html, body{
                margin:0px;
                padding:0px;
                height:100%;
                overflow:hidden;
            }	
            .one_line{
                white-space:nowrap;
                overflow:hidden;
                padding-top:5px; padding-left:5px;
                text-align:left !important;
            }
        </style>
        <?php echo $content_for_layout; ?>
    </head>
    <body onload="init()">
        <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
            <div class="dhx_cal_navline">
                <div class="dhx_cal_prev_button">&nbsp;</div>
                <div class="dhx_cal_next_button">&nbsp;</div>
                <div class="dhx_cal_today_button"></div>
                <div class="dhx_cal_date"></div>
                <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
                <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
                <div class="dhx_cal_tab" name="timeline_tab" style="right:280px;"></div>
                <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
            </div>
            <div class="dhx_cal_header">
            </div>
            <div class="dhx_cal_data">
            </div>		
        </div>
    </body>
</html>
