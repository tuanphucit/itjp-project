<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('予約管理', true), '/admin/requests');
$html->script(array('jquery-1.5.1.min', 'jquery-ui.min'), array('inline' => false));
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('予約管理') ?></h3>
    </div>
    <div id="search_box" class="module_content">
        <?php
        $stsOptions = array(
            REQUEST_STATUS_APROVED => '予約した',
            REQUEST_STATUS_FINISH => '使用した',
            REQUEST_STATUS_CANCELED => 'キャンセル',
        );
        //TODO : chinh form admin search request
        echo $form->create();
        echo $form->input('fsstatus', array('label' => '状態:', 'type' => 'select', 'options' => $stsOptions, 'div' => false, 'empty' => '--全て--'));
        echo $form->input('fsformtime', array('label' => '始まり:', 'type' => 'text', 'div' => false));
        echo $form->input('fstotime', array('label' => '終わり:', 'type' => 'text', 'div' => false));
        echo $form->input('fscustomer', array('label' => 'テナントさん:', 'type' => 'text', 'div' => false));
        echo $form->end(array('label' => '検索', 'div' => false));
        ?>
    </div>

</div>
<script type="text/javascript">
    function gotoCSVExport(){
        location.href="./requests/csvexport";
    }
    function doAddRequest(){
        mywin = window.open ("<?php echo $html->url(array('controller' => 'requests', 'action' => 'add')); ?>","addRequest","status=1,width=400,height=400");
        mywin.focus();
    }
    $(function() {
        var dates = $("#RequestFsformtime, #RequestFstotime").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            minDate: '-2Y',
            numberOfMonths: 1,
            onSelect: function(selectedDate) {
                var option = this.id == "RequestFsformtime" ? "minDate" : "maxDate",
                instance = $(this).data( "datepicker" ),
                date = $.datepicker.parseDate(
                instance.settings.dateFormat ||
                    $.datepicker._defaults.dateFormat,
                selectedDate, instance.settings );
                dates.not(this).datepicker( "option", option, date );
            }
        });
    });
</script>
<div class="module width_full" id="result_box">
    <?php echo $this->element('/../requests/list.ajax'); ?>
</div>