<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('予約管理', true), '/admin/requests');
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('予約管理') ?></h3>
    </div>
    <div id="search_box" class="module_content">
        <?php
        $stsOptions= array(
        	REQUEST_STATUS_APROVED => '使用待ち状態',
        	REQUEST_STATUS_FINISH => '終了',
        	REQUEST_STATUS_CANCELED => 'キャンセル',
        );
        //TODO : chinh form admin search request
        echo $form->create();
        echo $form->input('fsstatus', array('label' => '状態:', 'type' => 'select', 'options' => $stsOptions, 'div' => false, 'empty' => '--全て--'));
        echo $form->input('fsformtime', array('label' => 'から:', 'type' => 'text', 'div' => false));
        echo $form->input('fstotime', array('label' => 'まで:', 'type' => 'text', 'div' => false));
        echo $form->input('fscustomer', array('label' => '顧客:', 'type' => 'text', 'div' => false));
        echo $form->end(array('label' => '検索', 'div' => false));
        ?>
    </div>
    
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('/../requests/list.ajax'); ?>
</div>

<script type="text/javascript">
	function gotoCSVExport(){
		location.href="./requests/csvexport";
	}
	
</script>
