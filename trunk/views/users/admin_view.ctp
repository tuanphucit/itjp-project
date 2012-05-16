<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
/* @var $listRoomTypes */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('テナント管理', true), '/admin/users');
$html->addCrumb(__('テナント見る', true), '/admin/users/view');
?>
<script>
    function doChangePassword(){
        mywin = window.open ("<?php echo $html->url(array('controller' => 'users', 'action' => 'changepwd', 'admin' => false, $user['User']['id'])); ?>","changepwd","status=1,width=400,height=400");
        mywin.focus();
    }
</script>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('プロファイル見る') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('プロファイル変更', true), array('action' => 'admin_edit', $user['User']['id']), array('title' => __('変更', true))); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('パスワード変更', true), array('action' => 'changepwd', 'admin' => false), array('title' => __('Change Paswword', true), 'onclick' => 'doChangePassword();return false;')); ?></li>
            </ul>
            <ul class="tabs" style="margin-right: 5px">
                <li><?php echo $html->link(__('リストページへ戻る', true), array('action' => 'admin_index'), array('title' => __('リストページへ戻る', true))); ?></li>
            </ul>
        </div>
    </div>
    <div class="module_content">
        <?php
        //TODO : lam giao dien phan view thong tin user
        //debug($user); 
        ?>
        <table>
            <tr>
                <td><?php __('氏名'); ?></td>
                <td><?php echo $user['User']['fullname']; ?></td>
            </tr>
            <tr>
                <td><?php __('テナントコード'); ?></td>
                <td><?php echo $user['User']['usercode']; ?></td>
            </tr>
            <tr>
                <td><?php __('携帯電話'); ?></td>
                <td><?php echo $user['User']['phone']; ?></td>
            </tr>
            <tr>
                <td><?php __('メールアドレス'); ?></td>
                <td><?php echo $user['User']['email']; ?></td>
            </tr>
            <tr>
                <td><?php __('会社'); ?></td>
                <td><?php echo $user['Company']['name']; ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../users/list_booked.ajax'); ?>
</div>