<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('オプション', true), '/admin/statistic/config');
$unitTimeOptions = array(
    'P0DT0H10M' =>'１０分',
    'P0DT0H20M' =>'２０分',
    'P0DT0H30M' =>'３０分',
    'P0DT0H40M' =>'４０分',
    'P0DT0H50M' =>'５０分',
    'P0DT0H60M' =>'６０分',
    'P0DT1H20M' =>'１時２０分',
    'P0DT1H30M' =>'１時３０分'
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
);
$detroyTimeOptions = array(
    'P0DT0H30M' =>'３０分',
    'P0DT1H' =>'１時',
    'P0DT1H30M' =>'１時３０分',
    'P0DT2H' =>'２時',
    'P0DT2H30M' =>'２時３０分',
    'P0DT6H' =>'６時',
    'P0DT12H' =>'１２時',
    'P1D' =>'１日'
);
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('オプション') ?></h3>
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
        echo $form->input('unit', array('type' => 'select', 'options' => $unitTimeOptions,'label'=>'時間'));
        echo $form->input('limit_time', array('type' => 'select', 'options' => $limitTimeOptions,'label'=>'時間限界'));
        echo $form->input('detroy_time', array('type'=>'select','options'=>$detroyTimeOptions,'label'=>'Limit Cancel'));
        echo $form->input('request', array('type' => 'text','label'=>'予約金'));
        echo $form->input('detroy', array('type' => 'text','label'=>'キャンセル金'));
        echo $form->input('punish', array('type' => 'text','label'=>'罰金'));
        echo $form->end(__('サブミット', true));
        ?>
    </div>
</div>
