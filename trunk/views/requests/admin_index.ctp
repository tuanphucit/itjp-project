<div id="content">
    <?php //TODO : sua title cho hop ly voi chuc nang ?>
    <div id="tab_title">
        <div id="tit">Booking Management</div>
        <div id="csv2"></div>
        <div id="csv"></div>
    </div>
    <?php //TODO : sua search form box cho hop ly voi chuc nang ?>
    <div id="form_box">
        <?php echo $this->Form->create('SearchRequest', array('action' => 'admin_index', 'method' => 'post')); ?>
        <p class="pad">
            <?php echo $this->Form->input('room', array('type' => 'text', 'label' => 'Room Name:', 'div' => false)); ?>
        </p>
        <p class="pad">
            <?php echo $this->Form->input('fromtime', array('type' => 'text', 'label' => 'From:', 'div' => false)); ?>
            <?php echo $this->Form->input('totime', array('type' => 'text', 'label' => 'To', 'div' => false)); ?>
        </p>
        <p class="pad">
            <?php echo $this->Form->input('status', array('type' => 'select', 'label' => 'Status', 'div' => false, 'options' => array('1' => 'Moi tao'), 'empty' => '--All--')); ?>
        </p>
        <?php echo $this->Form->end('Search'); ?>
    </div>
    <div id="user">
        <?php //TODO : sua phan submit action cho phu hop ?>
        <?php $url = array('controller' => 'users', 'action' => 'admin_action'); ?>
        <form name="form1" action="<?php echo $this->Html->url($url); ?>" method="post">
            <div id="submit_div">
                <?php
                $option = array('1' => 'Active', '2' => 'Disable', '3' => 'Delete', '4' => 'Send Mail');
                //echo $this->Form->create('User', array('action'=>'admin_action', 'name'=>'form1','method'=>'post'));
                echo $this->Form->select('User.action', $option, null, array('empty' => '-Select-'));
                ?>
                <input type="submit" value="Submit" onclick="return submitUserAction(form1);">
                <?php //TODO : Sua lai link cho phu hop voi chuc nang add ?>
                <div id="user_add">
                    <?php echo $this->Html->image('icon/Add16.png', array('url' => array('action' => 'admin_add'), 'title' => 'Add', 'alt' => 'add')); ?>
                    <?php echo $this->Html->link('Add request', array('controller' => 'requests', 'action' => 'admin_add')); ?>
                </div>
            </div>
            <?php //TODO : bat buoc phai co the div nay ?>
            <div id="search-result"></div>
        </form>
    </div>
</div>
<?php //TODO : phan javascript giu nguyen ?>
<script type="text/javascript">
    $(document).ready(function() {
        loadPiece('<?php echo $html->url(array('action' => 'admin_index')); ?>','<?php echo $limit; ?>','#search-result');
        createDateTimeInput('#SearchRequestFromtime');
        createDateTimeInput('#SearchRequestTotime');
    });
</script>
