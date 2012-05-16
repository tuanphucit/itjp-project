<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('統計', true), '/admin/statistic/chart');
//$html->script(array('jquery-1.5.1.min', 'jquery-ui.min'), array('inline' => false));
?>
<div id="about">
    <h2><?php __('予約履歴'); ?></h2>
    <?php echo $this->Session->flash(); ?>
    <div id="search_box">
        <?php
        echo $form->create('User', array('url' => array('controller' => 'statistic', 'action' => 'chart')));
        echo $form->input('mouth', array('label' => __('Time', true)));
        //echo $form->end();
        echo $form->end(array('label' => '検索', 'div' => false));
        ?>
    </div>
    <div id="result_box">
         <?php echo $this->element('/../statistic/list.ajax_1'); ?>
    </div>
</div>
<?php
//debug($list);
//echo $this->element('sql_dump');
?>