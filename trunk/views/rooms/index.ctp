<style type="text/css">
    table.room_index {
        font-family: verdana,arial,sans-serif;
        font-size:11px;
        color:#333333;
        border-width: 1px;
        border-color: #666666;
        border-collapse: collapse;
    }
    table.room_index th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #dedede;
    }
    table.room_index td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #666666;
        background-color: #ffffff;
    }
</style>

<div id="about">
    <h2><?php __('Rooms'); ?></h2>

    <table class="room_index" cellpadding="0" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Seat</th>
            <th>Rending</th>
            <th>Status</th>
            <th>Image</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        foreach ($rooms as $room):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $room['Room']['id']; ?>&nbsp;</td>
                <td><?php echo $room['Room']['name']; ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($room['RoomType']['name'], array('controller' => 'room_types', 'action' => 'view', $room['RoomType']['id'])); ?>
                </td>
                <td><?php echo $room['Room']['quantity_seat']; ?>&nbsp;</td>
                <td><?php echo $room['Room']['renting_fee']; ?></td>
                <td><?php echo $room['Room']['status']; ?>&nbsp;</td>
                <td>
                    <?php echo $html->image('uploads' . DS . 'images' . DS . $room['Room']['image'], array('alt' => 'Room Image')); ?>
                </td>
                <td><?php echo $room['Room']['description']; ?>&nbsp;</td>
                <td><?php echo $html->link(__('予約', true), array('controller' => 'resquests', 'action' => 'add', $room['Room']['id']), array('title' => __('予約', true),'onclick'=>'doAddRequest('.$room['Room']['id'].');return false;')); ?>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>

</div>
<script type="text/javascript">
    function doAddRequest(id){
        mywin = window.open ("<?php echo $html->url(array('controller' => 'requests', 'action' => 'add', 'admin' => false)); ?>/"+id,"addRequest","status=1,width=400,height=300");
        mywin.focus();
    }
</script>
