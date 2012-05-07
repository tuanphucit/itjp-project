<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
?>
<div id="about" style="padding-bottom: 0px;">
    <h2><?php __('無使用会議室検索'); ?></h2>
    <div id="search_box">
        <?php
        $seatOpts = array(
            '1' => ' < 10 ' . __('座席', true),
            '2' => '10 ~ 20 ' . __('座席', true),
            '3' => '20 ~ 30 ' . __('座席', true),
            '4' => '30 ~ 50 ' . __('座席', true),
            '5' => ' > 100 ' . __('座席', true)
        );
        echo $form->create('Room', array('url' => array('controller' => 'rooms', 'action' => 'find_iframe', 'tagert' => 'find_iframe')));
        echo $form->select('type', $listRoomTypes, null, array('empty' => __('各タイプ', true)));
        echo $form->select('seat', $seatOpts, null, array('empty' => __('各座席数量', true)));
        echo $form->input('ftime', array('type' => 'text', 'id' => 'fTimeInput', 'label' => 'から :'));
        echo $form->input('ttime', array('type' => 'text', 'id' => 'tTimeInput', 'label' => 'まで :'));
        echo $form->button('Find', array('type' => 'submit'));
        echo $form->end();
        ?>
    </div>
    <?php echo $html->script(array('jquery-1.5.1.min', 'jquery-ui.min')); ?>
    <?php echo $html->css('aristo/jquery-ui'); ?>
    <script type="text/javascript">
        $(function() {
            var dates = $("#fTimeInput, #tTimeInput").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                numberOfMonths: 1,
                onSelect: function(selectedDate) {
                    var option = this.id == "fTimeInput" ? "minDate" : "maxDate",
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
    <iframe name="find_iframe" src="<?php echo $html->url(array('action' => 'find_iframe')); ?>" style="width: 100%;height: 600px"></iframe>
</div>
