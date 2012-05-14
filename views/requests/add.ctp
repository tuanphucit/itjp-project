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
    </tr>
    <tr>
        <td><?php echo $form->label('begindate', __('から', true)); ?></td>
        <td>
            <?php echo $form->text('begindate', array('id' => 'beginDateInput')); ?>
            <?php echo $form->select('begintime', $listTimes, null, array('empty' => false, 'id' => 'beginSelector')); ?>
        </td>

    </tr>
    <tr>
        <td><?php echo $form->label('enddate', __('from', true)); ?></td>
        <td>
            <?php echo $form->text('enddate', array('id' => 'endDateInput')); ?>
            <?php echo $form->select('endtime', $listTimes, null, array('empty' => false, 'id' => 'endSelector')); ?>
        </td>
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
        var dates = $("#beginDateInput, #endDateInput").datepicker({
            dateFormat: 'yy-mm-dd',
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
    function doCheckForm(){
        $.ajax({
            url:'<?php echo $html->url(array('action' => 'check')); ?>',
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
<?php if (@$isOk): ?>
        window.close();
        window.opener.alert('Add request successful!');
        window.opener.location.reload();
<?php endif; ?>
</script>
