<div id="activities">
    <h2><?php __('Find free rooms'); ?></h2>
    <div class="module width_full">
        <div class="module_header">
            <h3><?php __('Rooms Management') ?></h3>
        </div>
        <div id="search_box" class="module_content">
            <?php
            //TODO : chinh form admin search room
            echo $form->create('Room', array('id' => 'search_form'));
            echo $form->input('name', array('label' => __('Room', true), 'type' => 'text'));
            echo $form->input('type', array('label' => __('Room Type', true), 'type' => 'select', 'options' => $listRoomTypes, 'empty' => '-- all --'));
            $ele1 = $form->label('quanity_seat', __('Quanity Seat : ', true));
            $ele2 = $form->input('fromqs', array('label' => __('From', true), 'type' => 'text', 'div' => false));
            echo $form->input('toqs', array('label' => __('To', true), 'type' => 'text', 'before' => $ele1 . $ele2));
            $ele3 = $form->label('renting_fee', __('Renting Fee : ', true));
            $ele4 = $form->input('fromqs', array('label' => __('From', true), 'type' => 'text', 'div' => false));
            echo $form->input('toqs', array('label' => __('To', true), 'type' => 'text', 'before' => $ele3 . $ele4));
            echo $form->button(__('Submit', true), array('type' => 'button', 'id' => 'bt_submit'));
            echo $form->button(__('Reset', true), array('type' => 'reset', 'id' => 'bt_reset'));
            echo $form->end();
            ?>
        </div>
    </div>
    <div class="module width_full" id="result_box">
        <?php echo $this->element('../rooms/list.ajax'); ?>
    </div>
</div>