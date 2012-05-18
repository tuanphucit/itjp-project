<?php

/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('ファイル輸出', true), '/admin/statistic/export_file');
$html->script(array('jquery-1.5.1.min', 'jquery-ui.min'), array('inline' => false));
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('CSV輸出') ?></h3>
        <!--div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('一覧ページに戻る', true), array('action' => 'admin_index'), array('title' => __('一覧ページに戻る', true))); ?></li>
            </ul>
        </div-->
    </div>
    <div id="search_box" class="module_content">
        <?php
        $listYear = array(
        	'2010' => '2010',
        	'2011' => '2011',
        	'2012' => '2012',
        	'2013' => '2013',
        	'2014' => '2014',
        	'2015' => '2015',
        );
        $listMonth = array(
        	'2012-01' => '01',
        	'02' => '02',
        	'03' => '03',
        	'04' => '04',
        	'05' => '05',
        	'06' => '06',
        	'07' => '07',
        	'08' => '08',
        	'09' => '09',
        	'10' => '10',
        	'11' => '11',
        	'12' => '12',
        	
        );
        echo $form->create("");
        //echo $form->input('year', array('label' => 'Year', 'type' => 'select', 'class' => 'list-room-type', 'options' => $listYear, 'empty' => '--選択--'));
        echo $form->input('month', array('label' => __('Month', true), 'type' => 'select', 'options' => $monthOptions, 'empty' => '--選択--'));
//        echo '<span class = "list-rooms"></span>';
//        echo $form->input('create_by', array('label' => __('テナントさん', true), 'type' => 'select', 'options' => $userOptions));
//        //echo $form->input('date', array('label' => __('日', true), 'type' => 'text', 'id' => 'datepicker'));
//        echo $form->label('begindate', __('始まり', true));
//        echo $form->text('begindate', array('id' => 'beginDateInput'));
//        echo $form->input('begintime', array('label' => false, 'div' => false, 'type' => 'select', 'options' => $listTimes));
//
//        echo $form->label('enddate', __('<br>終わり', true));
//        echo $form->text('enddate', array('id' => 'endDateInput'));
//        echo $form->input('endtime', array('label' => false, 'div' => false, 'type' => 'select', 'options' => $listTimes));
//        echo $form->input('note', array('label' => 'ノート', 'type' => 'textarea'));
        echo $form->button(__('OK', true), array('type' => 'submit'));
        ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("select.list-room-type").change(function(){
            if($(this).val()){
                var url = '<?php echo $this->Html->url(array('controller' => 'rooms', 'action' => 'list_rooms')) ?>' + "/" + $(this).val();
                $.ajax({
                    url : url,
                    success : function(data){
                        $("span.list-rooms").html(data);
                    }
                });
            }else{
                $("span.list-rooms").html("");
            }
        });
    });
    function doCheckForm(){
        if($("select.list").val()==null){
            alert("室タイプを選択して欲しいです。");
            return false;
        }
        if($("select.list").val()==""){
            alert("室を選びなさい");
            return false;
        }
        
        $.ajax({
            url:'<?php echo $html->url(array('action' => 'check', 'admin' => false)); ?>',
            data: $('select,input').serializeArray(),
            type: 'POST',
            success: function(data){
                var  redata = $.parseJSON(data);
                if(parseInt(redata.code) == 0){
                    $('form').submit();
                } else{
                    $('#flashMessage').html(redata.msg).addClass('<?php echo CLASS_WARNING_ALERT; ?>');
                }
            },
            error:function(){
                alert('Error Ajax');
            }
        });
        return false;
    }
    //var okchua = false;
    $(function() {
        var dates = $("#beginDateInput, #endDateInput").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0,
            changeMonth: true,
            numberOfMonths: 1,
            onSelect: function(selectedDate) {
                var option = this.id == "beginDateInput" ? "minDate" : "maxDate",
                instance = $(this).data( "datepicker" ),
                date = $.datepicker.parseDate(
                instance.settings.dateFormat ||
                    $.datepicker._defaults.dateFormat,
                selectedDate, instance.settings );
                dates.not(this).datepicker( "option", option, date );
            }
        });
        $('#flashMessage').html('');
    });
<?php if (@$isOk): ?>
        window.close();
        window.opener.alert('予約が成功しました');
        window.opener.location.href="<?php echo $html->url(array('controller' => 'requests', 'action' => 'index')); ?>";
<?php endif; ?>
</script>