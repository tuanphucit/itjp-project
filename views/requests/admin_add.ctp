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
        echo $form->input('roomtypeid', array('label' => '室タイプ', 'type' => 'select', 'class' => 'list-room-type', 'options'=>$listRoomType));
        //echo $form->input('roomid', array('label' => __('会議室', true), 'type' => 'select', 'options' => $listRooms));
        echo '<span class = "list-rooms"></span>';
        echo $form->input('create_by', array('label' => __('テナントさん', true), 'type' => 'select', 'options' => $userOptions));
        echo $form->input('date', array('label' => __('日', true), 'type' => 'text', 'id' => 'datepicker'));
        echo $form->input('begin_time', array('label' => __('から', true), 'type' => 'select', 'options' => $listTimes));
        echo $form->input('end_time', array('label' => __('まで', true), 'type' => 'select', 'options' => $listTimes));
        echo $form->input('note', array('label' =>'ノート','type' => 'textarea'));
        echo $form->end(__('サブミット', true));
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


    $(function() {
        $('#datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            numberOfMonths: 1
        });
    });
   
   
   
</script>