<!-- Room Management -->
<h3>
    <?php
    __('管理');
    echo $html->link('非表示', '', array('class' => 'toggleLink'));
    ?>
</h3>
<ul class="toggle">
    <li class="icn_categories"><?php echo $html->link(__('会議室', true), array('controller' => 'rooms', 'action' => 'admin_index')); ?></li>
    <li class="icn_categories"><?php echo $html->link(__('会議室タイプ', true), array('controller' => 'room_types', 'action' => 'admin_index')); ?></li>
    <li class="icn_categories"><?php echo $html->link(__('設備', true), array('controller' => 'equips', 'action' => 'admin_index')); ?></li>
    <li class="icn_categories"><?php echo $html->link(__('会社', true), array('controller' => 'companies', 'action' => 'admin_index')); ?></li>
    <li class="icn_categories"><?php echo $html->link(__('予約', true), array('controller' => 'requests', 'action' => 'admin_index')); ?></li>
</ul>
<!-- User Management -->
<h3>
    <?php
    __('テナント');
    echo $html->link('非表示', '', array('class' => 'toggleLink'));
    ?>
</h3>
<ul class="toggle">
    <li class="icn_add_user"><?php echo $html->link(__('新テナントを追加', true), array('controller' => 'users', 'action' => 'admin_add')); ?></li>
    <li class="icn_view_users"><?php echo $html->link(__('全てのテナント表示', true), array('controller' => 'users', 'action' => 'admin_index')); ?></li>
</ul>
<!-- Statistic  -->
<h3>
    <?php
    __('課金実績管理');
    echo $html->link('非表示', '', array('class' => 'toggleLink'));
    ?>
</h3>
<ul class="toggle">
    <li class="icn_statistic"><?php echo $html->link(__('課金実績統計', true), array('controller' => 'statistic', 'action' => 'chart')); ?></li>
    <li class="icn_exprot"><?php echo $html->link(__('CSV輸出', true), array('controller' => 'statistic', 'action' => 'export_file')); ?></li>
</ul>
<!-- Admin -->
<h3>
    <?php
    __('管理者');
    echo $html->link('非表示', '', array('class' => 'toggleLink'));
    ?>
</h3>
<ul class="toggle">
    <li class="icn_settings"><?php echo $html->link(__('オプション', true), array('controller' => 'statistic', 'action' => 'config')); ?></li>
    <li class="icn_security"><?php echo $html->link(__('セキュリティ', true), '#'); ?></li>
    <li class="icn_profile"><?php echo $html->link(__('プロファイル', true), array('controller' => 'users', 'action' => 'admin_profile')); ?></li>
    <li class="icn_jump_back"><?php echo $html->link(__('ログアウト', true), array('controller' => 'users', 'action' => 'admin_logout')); ?></li>
</ul>
