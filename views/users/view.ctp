<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
?>
<div id="about">
    <h2><?php __('あなたのプロファイル'); ?></h2>
    <?php //debug($User); ?>
    <div style="text-align: right;">
    	<button onclick="gotoEditUser();">情報変更</button>
    	<button onclick="gotoChangePassword();">パスワード変更</button>
    </div>
    <table style="margin: 50px auto">
        <tr>
            <td class="head" style="padding: 5px 2px;"><?php __('氏名'); ?></td>
            <td>:</td>
            <td><?php echo $User['User']['fullname']; ?></td>
        </tr>
        <tr>
            <td class="head" style="padding: 5px 2px;"><?php __('メールアドレス'); ?></td>
            <td>:</td>
            <td><?php echo $User['User']['email']; ?></td>
        </tr>
        <tr>
            <td class="head" style="padding: 5px 2px;"><?php __('携帯電話 '); ?></td>
            <td>:</td>
            <td><?php echo $User['User']['phone']; ?></td>
        </tr>
        <tr>
            <td class="head" style="padding: 5px 2px;"><?php __('会社'); ?></td>
            <td>:</td>
            <td><?php echo $User['Company']['name']; ?></td>
        </tr>
        <tr>
            <td class="head" style="padding: 5px 2px;"><?php __('内線電話'); ?></td>
            <td>:</td>
            <td><?php echo $User['User']['local_phone']; ?></td>
        </tr>
        <tr>
            <td class="head" style="padding: 5px 2px;"><?php __('予約した数'); ?></td>
            <td>:</td>
            <td><?php echo count($User['Request']); ?></td>
        </tr>
    </table>
</div>
<script type="text/javascript">
function gotoEditUser(){
	location.href="./edit";
}
function gotoChangePassword(){
	location.href="./change_password";
}
</script>