<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('統計', true), '/admin/statistic/chart');
//$html->script(array('jquery-1.5.1.min', 'jquery-ui.min'), array('inline' => false));
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('予約管理') ?></h3>
    </div>
    <div id="search_box" class="module_content">
        <?php
        echo $form->create('User', array('url' => array('controller' => 'statistic', 'action' => 'chart')));
        echo $form->input('cust', array('label' => __('テナントさん', true)));
        echo $form->input('mouth', array('label' => __('月', true)));
        //echo $form->end();
        echo $form->end(array('label' => '検索', 'div' => false));
        ?>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('/../statistic/list.ajax'); ?>
</div>
<?php
//debug($list);
//echo $this->element('sql_dump');
?>