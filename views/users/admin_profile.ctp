<?php
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('管理者', true), '/admin/users');
$html->addCrumb(__('プロファイル', true), '/admin/users/profile');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('プロファイル見る') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('プロファイル変更', true), array('action' => 'admin_edit', $session->read('Auth.User.id')), array('title' => __('変更', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('パスワード変更', true), array('action' => 'changepwd', 'admin' => true), array('title' => __('リストページへ戻る', true), 'onclick' => 'doChangePassword();return false;')); ?></li>
            </ul>
        </div>
    </div>
    <div class="module_content">
        <?php
        //TODO : lam giao dien phan view thong tin user
        //debug($uInfo); 
        ?>
        <table style="margin: 50px auto">
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('氏名'); ?></td>
                <td>:</td>
                <td><?php echo $uInfo['User']['fullname']; ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('メールアドレス'); ?></td>
                <td>:</td>
                <td><?php echo $uInfo['User']['email']; ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('携帯電話 '); ?></td>
                <td>:</td>
                <td><?php echo $uInfo['User']['phone']; ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('会社'); ?></td>
                <td>:</td>
                <td><?php echo $uInfo['Company']['name']; ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('内線電話'); ?></td>
                <td>:</td>
                <td><?php echo $uInfo['User']['local_phone']; ?></td>
            </tr>
            <tr>
                <td class="head" style="padding: 5px 2px;"><?php __('Number of Booked'); ?></td>
                <td>:</td>
                <td><?php echo count($uInfo['Request']); ?></td>
            </tr>
        </table>
    </div>
</div>
<script>
    function doChangePassword(){
        mywin = window.open ("<?php echo $html->url(array('controller' => 'users', 'action' => 'changepwd', 'admin' => true)); ?>","changepwd","status=1,width=400,height=400");
        mywin.focus();
    }
</script>