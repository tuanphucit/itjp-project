<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $listRooms array */
/* @var $listTimes array */
?>
<?php echo $form->create('Request', array('action' => 'add')); ?>
<table>
    <tr>
        <td><?php echo $form->label('room', __('会議室', true)); ?></td>
        <td><?php echo $form->select('roomid', $listRooms, null, array('empty' => null, 'id' => 'stsSelector')); ?></td>
        <td><?php echo $form->label('date', __('日', true)); ?></td>
        <td><?php echo $form->text('date', array('id' => 'dateInput')); ?></td>
    </tr>
    <tr>
        <td><?php echo $form->label('begin_time', __('から', true)); ?></td>
        <td><?php echo $form->select('begin_time', $listTimes, null, array('empty' => false, 'id' => 'beginSelector')); ?></td>
        <td><?php echo $form->label('end_time', __('from', true)); ?></td>
        <td><?php echo $form->select('end_time', $listTimes, null, array('empty' => false, 'id' => 'endSelector')); ?></td>
    </tr>
    <tr>
        <td><?php echo $form->label('note', __('note', true)); ?></td>
        <td colspan="3"><?php echo $form->textarea('note', array('id' => 'noteInput')); ?></td>
    </tr>
    <tr>
        <td colspan="4">
            <?php
            echo $form->button(__('予約', true), array('type' => 'button', 'onclick' => 'doCheckForm()'));
            echo $form->button(__('リセット', true), array('type' => 'reset'));
            //echo $form->button(__('check', true), array('type' => 'button', 'onclick' => 'doCheckRequest()'));
            ?>
        </td>
    </tr>
</table>
<div id="flashMessage"></div>
<?php echo $form->end(); ?>
<script type="text/javascript">
    var okchua = false;
    $(function() {
        var dates = $("#dateInput").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            numberOfMonths: 1
        });
        $('#flashMessage').html('');
    });
    function doCheckForm(){
        $.ajax({
            url:'<?php echo $html->url(array('action' => 'check')); ?>',
            data: $('select,input').serializeArray(),
            type: 'POST',
            success: function(data){
                if(parseInt(data)!=0){
                    $('#flashMessage').html('Khong the dat phong trong khoang thoi gian nay').addClass('<?php echo CLASS_WARNING_ALERT; ?>');
                } else{
                    $('form').submit();
                }
            },
            error:function(){
                alert('Error Ajax');
            }
        });
        return false;
    }
<?php if (@$isOk): ?>
            window.close();
            window.opener.alert('Add request successful!');
            window.opener.location.reload();
<?php endif; ?>
</script>
