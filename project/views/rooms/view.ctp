<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $room array */
?>
<div id="about">
    <h2>
        <?php
        __('Room');
        echo ' ' . $room['Room']['name'];
        ?>
    </h2>
    <?php echo $this->Session->flash(); ?>
    <?php //debug($room); ?>
    <table style="margin: 50px auto; width: 90%">
        <tr>
            <td rowspan="5" style="width: 30%">
                <?php
                //TODO : hien thi anh cua phong
                echo $html->image('room_img01.png', array('class' => 'room_img', 'alt' => __('Room Image', true)));
                ?>
            </td>
            <td style="width: 20%"><?php __('Room Name'); ?></td>
            <td style="width: 50%"><?php echo $room['Room']['name']; ?></td>
        </tr>
        <tr>
            <td><?php __('Room Type'); ?></td>
            <td><?php echo $room['RoomType']['name']; ?></td>
        </tr>
        <tr>
            <td><?php __('Quantity Seat'); ?></td>
            <td><?php echo $room['Room']['quantity_seat']; ?></td>
        </tr>
        <tr>
            <td><?php __('Renting Fee'); ?></td>
            <td><?php echo $room['Room']['renting_fee']; ?></td>
        </tr>
        <tr>
            <td><?php __('Number of request'); ?></td>
            <td><?php echo count($room['Request']); ?></td>
        </tr>
        <tr>
            <td colspan="3"><?php echo $room['Room']['description']; ?></td>
        </tr>
    </table>
</div>
