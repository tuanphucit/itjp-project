<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
?>
<?php
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('予約管理', true), '/admin/requests');
$html->addCrumb(__('新予約追加', true), '/admin/requests/add');
$html->script(array('jquery-1.5.1.min', 'jquery-ui.min'), array('inline' => false));
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('新予約追加') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('一覧ページに戻る', true), array('action' => 'admin_index'), array('title' => __('一覧ページに戻る', true))); ?></li>
            </ul>
        </div>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin add new booking
        $userOptions = array();
        foreach ($listUsers as $user){
        	$userOptions[$user['User']['id']] = $user['User']['fullname'];
        }
        
        
        echo $form->create('Request');
        echo $form->input('roomtypeid', array('label' => '室タイプ', 'type' => 'select', 'class' => 'list-room-type', 'options'=>$listRoomType, 'empty'=>'--選択--'));
        //echo $form->input('roomid', array('label' => __('会議室', true), 'type' => 'select', 'options' => $listRooms));
        echo '<span class = "list-rooms"></span>';
        echo $form->input('create_by', array('label' => __('テナントさん', true), 'type' => 'select', 'options' => $userOptions));
        //echo $form->input('date', array('label' => __('日', true), 'type' => 'text', 'id' => 'datepicker'));
        echo $form->label('begindate', __('始まり', true)); 
        echo $form->text('begindate', array('id' => 'beginDateInput'));
        echo $form->input('begintime', array('label' => false, 'div'=>false, 'type' => 'select', 'options' => $listTimes));
        
        echo $form->label('enddate', __('<br>終わり', true));
        echo $form->text('enddate', array('id' => 'endDateInput'));
        echo $form->input('endtime', array('label' => false, 'div'=>false, 'type' => 'select', 'options' => $listTimes));
        echo $form->input('note', array('label' =>'ノート','type' => 'textarea'));
        echo $form->button(__('予約', true), array('type' => 'submit', 'onclick' => 'return doCheckForm()'));
        ?>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("select.list-room-type").change(function(){
			if($(this).val()){
			var url = '<?php echo $this->Html->url(array('controller' => 'rooms','action' => 'list_rooms'))?>' + "/" + $(this).val();
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
            url:'<?php echo $html->url(array('action' => 'check', 'admin'=>false)); ?>',
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
	var okchua = false;
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
    
    $(function() {
        $('#datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0,
            changeMonth: true,
            numberOfMonths: 1
        });
    });
   
   
   
</script>