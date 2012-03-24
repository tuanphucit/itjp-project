<!-- Room Management -->
<h3>
    <?php
    __('Management');
    echo $html->link('Hide', '', array('class' => 'toggleLink'));
    ?>
</h3>
<ul class="toggle">
    <li class="icn_categories"><?php echo $html->link(__('Rooms', true), array('controller' => 'rooms', 'action' => 'admin_index')); ?></li>
    <li class="icn_categories"><?php echo $html->link(__('Room Types', true), array('controller' => 'room_types', 'action' => 'admin_index')); ?></li>
    <li class="icn_categories"><?php echo $html->link(__('Equipments', true), array('controller' => 'equipment1s', 'action' => 'admin_index')); ?></li>
    <li class="icn_categories"><?php echo $html->link(__('Booking', true), array('controller' => 'equipment1s', 'action' => 'admin_index')); ?></li>
</ul>
<!-- User Management -->
<h3>
    <?php
    __('Users');
    echo $html->link('Hide', '', array('class' => 'toggleLink'));
    ?>
</h3>
<ul class="toggle">
    <li class="icn_add_user"><?php echo $html->link(__('Add New User', true), array('controller' => 'rooms', 'action' => 'admin_index')); ?></li>
    <li class="icn_view_users"><?php echo $html->link(__('List Users', true), array('controller' => 'room_types', 'action' => 'admin_index')); ?></li>
</ul>
<!-- Statistic  -->
<h3>
    <?php
    __('Statistic');
    echo $html->link('Hide', '', array('class' => 'toggleLink'));
    ?>
</h3>
<ul class="toggle">
    <li class="icn_statistic"><?php echo $html->link(__('Rooms', true), array('controller' => 'rooms', 'action' => 'admin_index')); ?></li>
    <li class="icn_categories"><?php echo $html->link(__('Room Types', true), array('controller' => 'room_types', 'action' => 'admin_index')); ?></li>
    <li class="icn_categories"><?php echo $html->link(__('Equipments', true), array('controller' => 'equipment1s', 'action' => 'admin_index')); ?></li>
</ul>
<!-- Admin -->
<h3>
    <?php
    __('Admin');
    echo $html->link('Hide', '', array('class' => 'toggleLink'));
    ?>
</h3>
<ul class="toggle">
    <li class="icn_settings"><?php echo $html->link(__('Options', true), array('controller' => 'rooms', 'action' => 'admin_index')); ?></li>
    <li class="icn_security"><?php echo $html->link(__('Security', true), array('controller' => 'room_types', 'action' => 'admin_index')); ?></li>
    <li class="icn_profile"><?php echo $html->link(__('Your Profile', true), array('controller' => 'equipment1s', 'action' => 'admin_index')); ?></li>
    <li class="icn_jump_back"><?php echo $html->link(__('Logout', true), array('controller' => 'equipment1s', 'action' => 'admin_index')); ?></li>
</ul>