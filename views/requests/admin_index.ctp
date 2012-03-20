<div id="content">
    <div id="tab_title">
        <div id="tit">Booking Management</div>
        <div id="csv2"></div>
        <div id="csv"></div>
    </div>
    <div id="form_box">
        <?php echo $this->Form->create('User', array('action' => 'admin_index', 'method' => 'post')); ?>
        <p class="pad">
            <?php echo __('Status'); ?>
            <?php
            $option = array('' => 'Select One',
                '1' => 'Active',
                '0' => 'Disable',
                '2' => 'Registered'
            );
            ?>
            <?php echo $this->Form->select('status', $option, null, array('empty' => '-Select-')); ?>
        <p class="pad">
            <?php echo __('Register Date:'); ?> 
            Y <?php echo $this->Form->year('from', 2012, 2050, null, array('empty' => '- - - -')); ?>
            M <?php echo $this->Form->month('from', null, array('monthNames' => false, 'empty' => '- -')); ?>
            D <?php echo $this->Form->day('from', null, array('empty' => '- -')); ?> 
            ~ 
            Y <?php echo $this->Form->year('to', 2012, 2050, null, array('empty' => '- - - -')); ?>
            M <?php echo $this->Form->month('to', null, array('monthNames' => false, 'empty' => '- -')); ?>
            D <?php echo $this->Form->day('to', null, array('empty' => '- -')); ?> 
        </p>
        <p>
            Text search 
            <?php echo $this->Form->text('email', array('br' => false)); ?>
            <?php echo $this->Form->end(array('label' => 'Refresh and View', 'div' => false)); ?>
        </p>
    </div>

    <div id="user">
        <?php $url = array('controller' => 'users', 'action' => 'admin_action'); ?>
        <form name="form1" action="<?php echo $this->Html->url($url); ?>" method="post">
            <div id="submit_div">
                <?php
                $option = array('1' => 'Active', '2' => 'Disable', '3' => 'Delete', '4' => 'Send Mail');
                //echo $this->Form->create('User', array('action'=>'admin_action', 'name'=>'form1','method'=>'post'));
                echo $this->Form->select('User.action', $option, null, array('empty' => '-Select-'));
                ?>
                <input type="submit" value="Submit" onclick="return submitUserAction(form1);">
                <div id="user_add">
                    <?php echo $this->Html->link('Add request', array('controller' => 'requests', 'action' => 'admin_add')); ?>
                    <?php echo $this->Html->image('icon/add.png', array('width' => 15, 'border' => 0)); ?>
                </div>
            </div>
            <div id="search-result"></div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        loadPiece("<?php echo $html->url(array('action' => 'admin_index')); ?>","#search-result");
    });
    function loadPiece(href,divName) {   
        $(divName).load(href, {}, function(){
            var divPaginationLinks = divName+" #pagination a";
            $(divPaginationLinks).click(function() {     
                var thisHref = $(this).attr("href");
                loadPiece(thisHref,divName);
                return false;
            });
            $('.sortLink a').click(function(){
                var thisHref = $(this).attr("href");
                loadPiece(thisHref,divName);
                return false;
            });
        });
    }
    function changeNumberRecords(href){
        $("#search-result").load(href, {'rd':$("#noRecord").val()}, function(){
            $("#search-result #pagination a").click(function() {     
                var thisHref = $(this).attr("href");
                changeNumberRecords(thisHref);
                return false;
            });
            $('.sortLink a').click(function(){
                var thisHref = $(this).attr("href");
                changeNumberRecords(thisHref);
                return false;
            });
        });
    }
</script>