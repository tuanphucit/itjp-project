<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
$html->addCrumb(__('Website Admin', true), '/admin');
$html->addCrumb(__('Config', true), '/admin/statistic/config');
$unitTimeOptions = array(
    'P0DT0H10M' =>'10',
    'P0DT0H20M' =>'20',
    'P0DT0H30M' =>'30',
    'P0DT0H40M' =>'40',
    'P0DT0H50M' =>'50',
    'P0DT0H60M' =>'60',
    'P0DT1H20M' =>'80',
    'P0DT1H30M' =>'90'
);
$limitTimeOptions = array(
    'P5Y' =>'５年',
    'P4Y' =>'４年',
    'P3Y' =>'３年',
    'P2Y6M' =>'２年６月',
    'P2Y' =>'２年',
    'P1Y6M' =>'１年６月',
    'P1Y' =>'１年',
    'P6M' =>'６月'
)
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('Config') ?></h3>
        <!--div class="header_action">
            <ul class="tabs">
                <li><?php //echo $html->link(__('Back to List', true), array('action' => 'admin_index'), array('title' => __('Back to List', true)));  ?></li>
            </ul>
        </div-->
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin add new company
        echo $form->create(null, array('action' => 'config'));
        echo $form->input('begin', array('type' => 'time', 'timeFormat' => '24','label'=>'開始'));
        echo $form->input('end', array('type' => 'time', 'timeFormat' => '24','label'=>'終了'));
        echo $form->input('unit', array('type' => 'select', 'options' => $unitTimeOptions, 'after' => '分','label'=>'時間'));
        echo $form->input('limit_time', array('type' => 'select', 'options' => $limitTimeOptions,'label'=>'時間限界'));
        echo $form->input('request', array('type' => 'text','label'=>'予約金'));
        echo $form->input('detroy', array('type' => 'text','label'=>'キャンセル金'));
        echo $form->input('punish', array('type' => 'text','label'=>'罰金'));
        echo $form->end(__('サブミット', true));
        ?>
    </div>
</div>
